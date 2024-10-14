<?php

namespace App\Services;

use App\Models\Transportadora;
use Illuminate\Support\Facades\Log;

class TransportadoraService
{
    public function all()
    {
        return Transportadora::all();
    }

    public function create(array $data)
    {
        Log::info('cadastrando: ' . json_encode($data));
        $data['status_transportadora'] = 1;
        return Transportadora::create($data);
    }

    public function find($id)
    {
        return Transportadora::findOrFail($id);
    }

    public function update(Transportadora $transportadora, array $data)
    {
        $transportadora->update($data);
        return $transportadora;
    }

    public function delete(Transportadora $transportadora)
    {
        $transportadora->delete();
    }

    public function removerEmMassa(array $ids)
    {
        return Transportadora::destroy($ids);
    }
}
