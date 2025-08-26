<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clientes/{cliente}/equipos', function(App\Models\Cliente $cliente) {
    return response()->json($cliente->equipos);
});

// Solo admin puede manejar clientes y equipos
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('equipos', EquipoController::class);
});

// Técnicos y admin pueden manejar órdenes
Route::middleware(['auth', 'role:admin,tecnico'])->group(function () {
    Route::resource('ordenes', OrdenController::class);
    Route::get('/ordenes/{orden}/pdf', [OrdenController::class, 'pdf'])->name('ordenes.pdf');
});


// Recepción puede registrar órdenes pero no borrarlas
Route::middleware(['auth', 'role:recepcion'])->group(function () {
    Route::get('/recepcion', function() {
        return view('recepcion.index');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('usuarios', UserController::class);
});

require __DIR__.'/auth.php';
