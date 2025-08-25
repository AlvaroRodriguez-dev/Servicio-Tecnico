<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\OrdenController;
use App\Models\Equipo;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('ordenes', OrdenController::class);

Route::get('/clientes/{cliente}/equipos', function(App\Models\Cliente $cliente) {
    return response()->json($cliente->equipos);
});

Route::get('/ordenes/{orden}/pdf', [OrdenController::class, 'pdf'])->name('ordenes.pdf');
