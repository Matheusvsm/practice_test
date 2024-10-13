<?php

namespace App\Services;

use App\Models\Motorista;

class MotoristaService
{
    public function all()
    {
        return Motorista::all();
    }

    public function create(array $data)
    {
        return Motorista::create($data);
    }

    public function find($id)
    {
        return Motorista::findOrFail($id);
    }

    public function update(Motorista $motorista, array $data)
    {
        $motorista->update($data);
        return $motorista;
    }

    public function delete(Motorista $motorista)
    {
        $motorista->delete();
    }
}
