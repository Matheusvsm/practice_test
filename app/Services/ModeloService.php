<?php

namespace App\Services;

use App\Models\Modelo;

class ModeloService
{
    public function all()
    {
        return Modelo::with('modelo')->get();
    }

    public function create(array $data)
    {
        return Modelo::create($data);
    }

    public function find($id)
    {
        return Modelo::with('modelo')->findOrFail($id);
    }

    public function update(Modelo $modelo, array $data)
    {
        $modelo->update($data);
        return $modelo;
    }

    public function delete(Modelo $modelo)
    {
        $modelo->delete();
    }
}
