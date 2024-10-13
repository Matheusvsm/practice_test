<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModeloRequest;
use App\Http\Requests\UpdateModeloRequest;
use App\Services\ModeloService;

class ModeloController extends Controller
{
    protected $service;

    public function __construct(ModeloService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function store(StoreModeloRequest $request)
    {
        $modelo = $this->service->create($request->validated());

        return response()->json($modelo, 201);
    }

    public function show($id)
    {
        $modelo = $this->service->find($id);

        return response()->json($modelo);
    }

    public function update(UpdateModeloRequest $request, $id)
    {
        $modelo = $this->service->find($id);
        $modelo = $this->service->update($modelo, $request->validated());

        return response()->json($modelo);
    }

    public function destroy($id)
    {
        $modelo = $this->service->find($id);
        $this->service->delete($modelo);

        return response()->json(null, 204);
    }
}
