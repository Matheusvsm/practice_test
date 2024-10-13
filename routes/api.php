<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransportadoraController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\CaminhaoController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('transportadoras', TransportadoraController::class);
    Route::apiResource('motoristas', MotoristaController::class);
    Route::apiResource('caminhoes', CaminhaoController::class);

    Route::delete('/transportadoras/remover', [TransportadoraController::class, 'removerEmMassa'])->name('transportadoras.removerEmMassa');
});