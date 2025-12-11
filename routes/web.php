<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidasPresupuestalesController;

use function Laravel\Prompts\clear;

Route::get('/', function () {
    return view('layouts.app2');
});

Route::resource('partidas_presupuestales', PartidasPresupuestalesController::class);










Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


