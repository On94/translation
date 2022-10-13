<?php

namespace App\Domain\GoogleTranslate;

use Illuminate\Contracts\Container\BindingResolutionException;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Stichoza\GoogleTranslate\Tokens\TokenProviderInterface;

class GoogleTranslateExtend extends GoogleTranslate
{
    /**
     * @var GoogleTranslateResponse|mixed|null
     */
    protected ?GoogleTranslateResponse $googleTranslateResponse = null;

    /**
     * @param string $target
     * @param string|null $source
     * @param array|null $options
     * @param TokenProviderInterface|null $tokenProvider
     * @throws BindingResolutionException
     */
    public function __construct(string $target = 'en', string $source = null, array $options = null, TokenProviderInterface $tokenProvider = null)
    {
        parent::__construct($target, $source, $options, $tokenProvider);

        $this->googleTranslateResponse = app()->make(GoogleTranslateResponse::class);
    }

    /**
     * @param string $string
     * @return string
     * @throws \ErrorException
     * @throws \Throwable
     */
    public function translate(string $string) : string
    {
        throw_if($this->googleTranslateResponse instanceof GoogleTranslateResponse, 'Please use translateText method!');

        return parent::translate($string);
    }

    /**
     * @param string $string
     * @return GoogleTranslateResponse
     * @throws GoogleTranslateAPIException
     */
    public function translateText(string $string): GoogleTranslateResponse
    {
        try {
            $text = parent::translate($string);
        } catch (\Throwable $throwable) {
            $this->googleTranslateResponse->error = "Couldn't translate the text!";
            throw new GoogleTranslateAPIException($this->googleTranslateResponse->error);
        }

        $this->googleTranslateResponse->success = true;
        $this->googleTranslateResponse->translation = $text;

        return $this->googleTranslateResponse;
    }
}
