<?php

namespace App\Http\Requests\Sermones;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateSermonesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check(); // Modify this according to your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255|min:5',
            'descripcion' => 'required|string|min:10|max:1000',
            'url_youtube' => [
                'required',
                'url',
                'unique:sermones,url_youtube',
                'regex:/^https?:\/\/(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[a-zA-Z0-9_-]{11}/'
            ],
            'activo' => 'sometimes|boolean'
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es requerido.',
            'titulo.min' => 'El título debe tener al menos 5 caracteres.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'descripcion.required' => 'La descripción es requerida.',
            'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de 1000 caracteres.',
            'url_youtube.required' => 'La URL de YouTube es requerida.',
            'url_youtube.url' => 'Debe ser una URL válida.',
            'url_youtube.unique' => 'Esta URL de YouTube ya está registrada.',
            'url_youtube.regex' => 'Debe ser una URL válida de YouTube.',
            'activo.boolean' => 'El campo activo debe ser verdadero o falso.'
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ],
            422
        ));
    }

    /**
     * Handle a failed authorization attempt.
     */
    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'message' => 'You are not authorized to perform this action.',
        ], 403));
    }
}