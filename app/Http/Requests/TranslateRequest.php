<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class TranslateRequest extends FormRequest
{
    use  FailedValidation;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'lang' => 'string|nullable',
            'text' => 'string|required|max:1024'
        ];
    }

}
