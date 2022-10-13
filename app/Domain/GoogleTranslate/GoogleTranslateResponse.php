<?php

namespace App\Domain\GoogleTranslate;

class GoogleTranslateResponse
{
    public ?string $translation;
    public ?string $error;
    public bool $success = false;
}
