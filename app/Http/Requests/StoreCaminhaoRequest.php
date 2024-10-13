<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCaminhaoRequest extends FormRequest
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
            'placa_caminhao' => 'required|string|max:8|unique:caminhoes',
            'modelo_caminhao' => 'required|string|max:50',
            'cor_caminhao' => 'required|string|max:50',
            'motorista_id' => 'required|exists:motoristas,id',
        ];
    }
    public function messages()
    {
        return [
            'placa_caminhao.required' => 'A placa do caminhão é obrigatória.',
            'placa_caminhao.string' => 'A placa do caminhão deve ser uma string.',
            'placa_caminhao.max' => 'A placa do caminhão não pode exceder 8 caracteres.',
            'placa_caminhao.unique' => 'Já existe um caminhão com essa placa.',
            'modelo_caminhao.required' => 'O modelo do caminhão é obrigatório.',
            'modelo_caminhao.string' => 'O modelo do caminhão deve ser uma string.',
            'modelo_caminhao.max' => 'O modelo do caminhão não pode exceder 50 caracteres.',
            'cor_caminhao.required' => 'A cor do caminhão é obrigatória.',
            'cor_caminhao.string' => 'A cor do caminhão deve ser uma string.',
            'cor_caminhao.max' => 'A cor do caminhão não pode exceder 50 caracteres.',
            'motorista_id.required' => 'O motorista associado ao caminhão é obrigatório.',
            'motorista_id.exists' => 'O motorista associado ao caminhão deve existir.',
        ];
    }
}
