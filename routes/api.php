<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PartidasPresupuestalesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de API para Aseguradoras
Route::apiResource('partidas_presupuestales', PartidasPresupuestalesController::class);