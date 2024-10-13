<?php

namespace App\Services;

use App\Models\Transportadora;

class TransportadoraService
{
    public function all()
    {
        return Transportadora::all();
    }

    public function create(array $data)
    {
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
