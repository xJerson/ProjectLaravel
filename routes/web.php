<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('vehicles.index');
});

// Ruta para DataTables AJAX
Route::get('/vehicles/data', [VehicleController::class, 'data'])->name('vehicles.data');

// Rutas del CRUD
Route::resource('vehicles', VehicleController::class);

// Dashboard redirect
Route::get('/dashboard', function () {
    return redirect()->route('vehicles.index');
})->name('dashboard');
