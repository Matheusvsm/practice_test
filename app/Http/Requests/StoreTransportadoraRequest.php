<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransportadoraRequest extends FormRequest
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
            'nome_transportadora' => 'required|string|max:100',
            'cnpj_transportadora' => 'required|string|size:14|unique:transportadoras',
            'status_transportadora' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'nome_transportadora.required' => 'O nome da transportadora é obrigatório.',
            'nome_transportadora.string' => 'O nome da transportadora deve ser uma string.',
            'nome_transportadora.max' => 'O nome da transportadora não pode exceder 100 caracteres.',
            'cnpj_transportadora.required' => 'O CNPJ da transportadora é obrigatório.',
            'cnpj_transportadora.size' => 'O CNPJ deve ter 14 caracteres.',
            'cnpj_transportadora.unique' => 'Já existe uma transportadora com esse CNPJ.',
            'status_transportadora.required' => 'O status da transportadora é obrigatório.',
            'status_transportadora.integer' => 'O status da transportadora deve ser um número inteiro.',
        ];
    }
}
