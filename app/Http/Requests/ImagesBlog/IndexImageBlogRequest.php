<?php

namespace App\Http\Requests\ImagesBlog;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class IndexImageBlogRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'blog_id' => ['string', 'required', 'exists:blogs,id'],
        ];
    }

    /**
     * Manejo de errores de validación.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ],
            422
        ));
    }
}
