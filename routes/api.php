<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {
    // rutas para clientes
    Route::get('/cliente/select', [ClienteController::class, 'select']);
    Route::post('/cliente/store', [ClienteController::class, 'store']);
    Route::put('/cliente/update/{id}', [ClienteController::class, 'update']);
    Route::delete('/cliente/delete/{id}', [ClienteController::class, 'delete']);
    Route::get('/cliente/find/{id}', [ClienteController::class, 'find']);
    Route::get('/cliente/find2/{id}', [ClienteController::class, 'find2']);
    // rutas para paises
    Route::get('/pais/select', [PaisController::class, 'select']);
});



// gestionar usuarios
Route::post('/usuario/register', [UserController::class, 'register']);
Route::post('/usuario/login', [UserController::class, 'login']);
