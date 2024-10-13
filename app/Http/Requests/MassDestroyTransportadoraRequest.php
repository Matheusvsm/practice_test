<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTransportadoraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'exists:transportadoras,id',
        ];
    }

    public function messages()
    {
        return [
            'ids.required' => 'É necessário selecionar pelo menos um item para remover.',
            'ids.array' => 'Os IDs devem ser fornecidos como um array.',
            'ids.*.exists' => 'Um ou mais IDs selecionados são inválidos.',
        ];
    }
}
