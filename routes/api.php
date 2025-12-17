<?php
require __DIR__ . '/auth.php';

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\TipoDonacionController;
use App\Http\Controllers\TipoEventoController;
use App\Models\TipoDonacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('donaciones', DonacionesController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('eventos', EventosController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tipoDonaciones', TipoDonacionController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tipoEvento', TipoEventoController::class);
});
