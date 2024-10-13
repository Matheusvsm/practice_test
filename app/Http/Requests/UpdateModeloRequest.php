<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModeloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
         'nome_modelo' => 'sometimes|required|string|max:50',
        ];
    }
    public function messages()
    {
        return [
            'nome_modelo.required' => 'O nome do modelo é obrigatório.',
            'nome_modelo.string' => 'O nome do modelo deve ser uma string.',
            'nome_modelo.max' => 'O nome do modelo não pode exceder 50 caracteres.',
        ];
    }
}
