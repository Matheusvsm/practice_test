<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransportadoraRequest;
use App\Http\Requests\UpdateTransportadoraRequest;
use App\Http\Requests\MassDestroyTransportadoraRequest;
use App\Services\TransportadoraService;

class TransportadoraController extends Controller
{
    protected $service;

    public function __construct(TransportadoraService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function store(StoreTransportadoraRequest $request)
    {
        $transportadora = $this->service->create($request->validated());

        return response()->json($transportadora, 201);
    }

    public function show($id)
    {
        $transportadora = $this->service->find($id);

        return response()->json($transportadora);
    }

    public function update(UpdateTransportadoraRequest $request, $id)
    {
        $transportadora = $this->service->find($id);
        $transportadora = $this->service->update($transportadora, $request->validated());

        return response()->json($transportadora);
    }

    public function destroy($id)
    {
        $transportadora = $this->service->find($id);
        $this->service->delete($transportadora);

        return response()->json(null, 204);
    }

    public function removerEmMassa(MassDestroyTransportadoraRequest $request)
    {
        $this->service->removerEmMassa($request->ids);

        return redirect()->route('transportadoras.index')->with('success', 'Transportadoras removidas com sucesso!');
    }
}
