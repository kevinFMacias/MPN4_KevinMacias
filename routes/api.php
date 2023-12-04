<?php

use App\Http\Controllers\DocentesController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\MatriculasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/docente')->group(function () {
    Route::get('/', [DocentesController::class, 'index']);
    Route::get('/{id}', [DocentesController::class, 'show']);
    Route::post('/', [DocentesController::class, 'store']);
    Route::put('/{id}', [DocentesController::class, 'update']);
    Route::delete('/{id}', [DocentesController::class, 'destroy']);
});

Route::prefix('/alumno')->group(function () {
    Route::get('/', [AlumnosController::class, 'index']);
    Route::get('/{id}', [AlumnosController::class, 'show']);
    Route::post('/', [AlumnosController::class, 'store']);
    Route::put('/{id}', [AlumnosController::class, 'update']);
    Route::delete('/{id}', [AlumnosController::class, 'destroy']);
});

Route::prefix('/materia')->group(function () {
    Route::get('/', [MateriasController::class, 'index']);
    Route::get('/{id}', [MateriasController::class, 'show']);
    Route::post('/', [MateriasController::class, 'store']);
    Route::put('/{id}', [MateriasController::class, 'update']);
    Route::delete('/{id}', [MateriasController::class, 'destroy']);
});

Route::prefix('/matricula')->group(function () {
    Route::get('/', [MatriculasController::class, 'index']);
    Route::get('/{id}', [MatriculasController::class, 'show']);
    Route::post('/', [MatriculasController::class, 'store']);
    Route::put('/{id}', [MatriculasController::class, 'update']);
    Route::delete('/{id}', [MatriculasController::class, 'destroy']);
});

Route::prefix('/asistencia')->group(function () {
    Route::get('/', [AsistenciasController::class, 'index']);
    Route::get('/{id}', [AsistenciasController::class, 'show']);
    Route::post('/', [AsistenciasController::class, 'store']);
    Route::put('/{id}', [AsistenciasController::class, 'update']);
    Route::delete('/{id}', [AsistenciasController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
