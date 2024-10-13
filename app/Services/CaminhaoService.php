<?php

namespace App\Services;

use App\Models\Caminhao;

class CaminhaoService
{
    public function all()
    {
        return Caminhao::with('motorista')->get();
    }

    public function create(array $data)
    {
        return Caminhao::create($data);
    }

    public function find($id)
    {
        return Caminhao::with('motorista')->findOrFail($id);
    }

    public function update(Caminhao $caminhao, array $data)
    {
        $caminhao->update($data);
        return $caminhao;
    }

    public function delete(Caminhao $caminhao)
    {
        $caminhao->delete();
    }
}
