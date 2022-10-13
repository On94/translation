<?php

namespace App\Http\Controllers;

use App\Domain\GoogleTranslate\GoogleTranslateFacade;
use App\Http\Requests\TranslateRequest;
use Illuminate\Support\Collection;

class TranslateController extends Controller
{
    /**
     * @param TranslateRequest $request
     * @return Collection
     */
    public function translate(TranslateRequest $request):Collection
    {
        return collect(GoogleTranslateFacade::translateText($request->text, $request->lang));
    }
}
