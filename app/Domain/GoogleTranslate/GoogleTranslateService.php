<?php

namespace App\Domain\GoogleTranslate;

use Stichoza\GoogleTranslate\GoogleTranslate;

class GoogleTranslateService
{
    /**
     * @var GoogleTranslate|GoogleTranslateExtend
     */
    private GoogleTranslateExtend $googleTranslate;

    public function __construct(GoogleTranslateExtend $googleTranslate)
    {
        $this->googleTranslate = $googleTranslate;
    }

    /**
     * @param string $text
     * @param string|null $lang
     * @return GoogleTranslateResponse
     * @throws GoogleTranslateAPIException
     */
    public function translateText(string $text, ?string $lang) : GoogleTranslateResponse
    {
        return $this->googleTranslate->setSource('en')->setTarget($lang ?? 'hy')->translateText($text);
    }

}
