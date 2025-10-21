<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\CargoController;

Route::get('/', function () {
    return view('welcome');
});

// Custom Home Dashboard
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// Redirect /dashboard to /home
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes for dashboard modules
    Route::resource('ships', ShipController::class);
    Route::resource('shipments', ShipmentController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('crews', CrewController::class);
    Route::resource('ports', PortController::class);
    Route::resource('cargos', CargoController::class);
});

require __DIR__.'/auth.php';
