<?php

namespace App\Domain\GoogleTranslate;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string|null translateText(string $text, ?string $lang)
 */
class GoogleTranslateFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Translate';
    }
}
