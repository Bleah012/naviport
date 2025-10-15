<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\ShipmentController;

Route::get('/shipments', [ShipmentController::class, 'index'])->name('shipments.index');
Route::get('/crews', [CrewController::class, 'index'])->name('crews.index');
Route::get('/ships', [ShipController::class, 'index'])->name('ships.index');
Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/', function () {
    return view('welcome');
});
