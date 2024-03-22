<?php

use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [usuarioController::class, 'index']);

Route::get('/usuario', [usuarioController::class, 'index']);
Route::post('/usuario', [usuarioController::class, 'store']);
Route::put('/usuario/{id}', [usuarioController::class, 'update']);
Route::delete('/usuario', [UsuarioController::class, 'destroy']);

