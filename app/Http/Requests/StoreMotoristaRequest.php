<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotoristaRequest extends FormRequest
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
            'nome_motorista' => 'required|string|max:100',
            'cpf_motorista' => 'required|string|size:11|unique:motoristas',
            'data_nascimento_motorista' => 'required|date',
            'email_motorista' => 'sometimes|nullable|email|max:100',
        ];
    }
    public function messages()
    {
        return [
            'nome_motorista.required' => 'O nome do motorista é obrigatório.',
            'nome_motorista.string' => 'O nome do motorista deve ser uma string.',
            'nome_motorista.max' => 'O nome do motorista não pode exceder 100 caracteres.',
            'cpf_motorista.required' => 'O CPF do motorista é obrigatório.',
            'cpf_motorista.size' => 'O CPF deve ter 11 caracteres.',
            'cpf_motorista.unique' => 'Já existe um motorista com esse CPF.',
            'data_nascimento_motorista.required' => 'A data de nascimento do motorista é obrigatória.',
            'data_nascimento_motorista.date' => 'A data de nascimento deve ser uma data válida.',
            'email_motorista.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email_motorista.max' => 'O e-mail não pode exceder 100 caracteres.',
        ];
    }
}
