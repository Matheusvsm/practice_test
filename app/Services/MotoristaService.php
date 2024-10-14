<?php

namespace App\Services;

use App\Models\Motorista;
use Illuminate\Support\Facades\Log;
use Exception;

class MotoristaService
{
    public function all()
    {
        try {
            Log::info('Buscando todos os motoristas.');
            return Motorista::all();
        } catch (Exception $e) {
            Log::error('Erro ao buscar todos os motoristas: ' . $e->getMessage());
            throw new Exception('Erro ao buscar motoristas.');
        }
    }

    public function create(array $data)
    {
        Log::info('Criando novo motorista.', json_encode($data));
        return Motorista::create($data);
    }

    public function find($id)
    {
        try {
            Log::info('Buscando motorista pelo ID.', ['id' => $id]);
            return Motorista::findOrFail($id);
        } catch (Exception $e) {
            Log::error('Erro ao buscar motorista com ID: ' . $id . ' - ' . $e->getMessage());
            throw new Exception('Erro ao buscar motorista.');
        }
    }

    public function update(Motorista $motorista, array $data)
    {
        try {
            Log::info('Atualizando motorista.', ['motorista_id' => $motorista->id, 'data' => $data]);
            $motorista->update($data);
            return $motorista;
        } catch (Exception $e) {
            Log::error('Erro ao atualizar motorista: ' . $motorista->id . ' - ' . $e->getMessage(), ['data' => $data]);
            throw new Exception('Erro ao atualizar motorista.');
        }
    }

    public function delete(Motorista $motorista)
    {
        try {
            Log::info('Deletando motorista.', ['motorista_id' => $motorista->id]);
            $motorista->delete();
        } catch (Exception $e) {
            Log::error('Erro ao deletar motorista: ' . $motorista->id . ' - ' . $e->getMessage());
            throw new Exception('Erro ao deletar motorista.');
        }
    }
}
