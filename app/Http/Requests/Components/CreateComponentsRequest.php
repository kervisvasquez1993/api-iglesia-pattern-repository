<?php

namespace App\Http\Requests\Components;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class CreateComponentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:50'],
            'config' => ['nullable', 'array'], // Ahora es opcional

            // Validaciones para 'title_rules' dentro de 'config' (si se envía)
            'config.title_rules' => ['nullable', 'array'],
            'config.title_rules.*' => ['string', 'in:required,max:100'],

            // Validaciones para 'description_rules'
            'config.description_rules' => ['nullable', 'array'],
            'config.description_rules.*' => ['string', 'in:nullable,max:255'],

            // Validaciones para el botón (si se envía)
            'config.button' => ['nullable', 'array'],
            'config.button.label' => ['nullable', 'string', 'max:50'],
            'config.button.url' => ['nullable', 'string', 'url'],
            'config.button.type' => ['nullable', 'string', 'in:primary,secondary,danger'],
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

    /**
     * Manejo de autorización fallida.
     */
    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'message' => 'You are not authorized to perform this action.',
        ], 403));
    }
}
