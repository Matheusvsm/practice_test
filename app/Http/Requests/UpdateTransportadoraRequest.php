<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransportadoraRequest extends FormRequest
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
            'nome_transportadora' => 'sometimes|required|string|max:100',
            'cnpj_transportadora' => 'sometimes|required|string|size:14|unique:transportadoras,cnpj_transportadora,' . $this->route('transportadora')->id,
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
        ];
    }
}
