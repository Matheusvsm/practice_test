<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaminhaoRequest;
use App\Http\Requests\UpdateCaminhaoRequest;
use App\Services\CaminhaoService;

class CaminhaoController extends Controller
{
    protected $service;

    public function __construct(CaminhaoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function store(StoreCaminhaoRequest $request)
    {
        $caminhao = $this->service->create($request->validated());

        return response()->json($caminhao, 201);
    }

    public function show($id)
    {
        $caminhao = $this->service->find($id);

        return response()->json($caminhao);
    }

    public function update(UpdateCaminhaoRequest $request, $id)
    {
        $caminhao = $this->service->find($id);
        $caminhao = $this->service->update($caminhao, $request->validated());

        return response()->json($caminhao);
    }

    public function destroy($id)
    {
        $caminhao = $this->service->find($id);
        $this->service->delete($caminhao);

        return response()->json(null, 204);
    }
}
