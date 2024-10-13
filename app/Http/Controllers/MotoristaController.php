<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMotoristaRequest;
use App\Http\Requests\UpdateMotoristaRequest;
use App\Services\MotoristaService;
use Illuminate\Support\Facades\Log;

class MotoristaController extends Controller
{
    protected $service;

    public function __construct(MotoristaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function store(StoreMotoristaRequest $request)
    {
        try {
            dd($request);
            $motorista = $this->service->create($request->validated());
            dd();
            return response()->json($motorista, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {

            Log::error('Erro ao cadastrar motorista: ' . $e->getMessage());

            return response()->json(['error' => 'Ocorreu um erro ao cadastrar o motorista.'], 500);
        }
    }

    public function show($id)
    {
        $motorista = $this->service->find($id);

        return response()->json($motorista);
    }

    public function update(UpdateMotoristaRequest $request, $id)
    {
        $motorista = $this->service->find($id);
        $motorista = $this->service->update($motorista, $request->validated());

        return response()->json($motorista);
    }

    public function destroy($id)
    {
        $motorista = $this->service->find($id);
        $this->service->delete($motorista);

        return response()->json(null, 204);
    }
}
