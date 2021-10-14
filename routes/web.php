<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');
Route::redirect('register', 'login');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){

    // Dashboard

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin', [DashboardController::class, 'admin'])->name('admin-dashboard');
    Route::get('driver', [DashboardController::class, 'driver'])->name('driver-dashboard');

    // Viajes
    Route::resource('/trips', TripController::class);
    Route::post('set-trip-driver/{trip}', [TripController::class, 'setDriver'])->name('set-trip-driver');
    Route::post('add-trip-passenger/{trip}', [TripController::class, 'addPassenger'])->name('add-trip-passenger');
    Route::delete('remove-passenger/{tripPassenger}', [TripController::class, 'removePassenger'])->name('remove-passenger');
    Route::post('export-to-pdf/{trip}', [TripController::class, 'exportToPdf'])->name('export-to-pdf');

    // Grupos
    Route::resource('/groups', GroupController::class);
    Route::post('export-group-to-pdf/{group}', [GroupController::class, 'exportToPdf'])->name('export-group-to-pdf');

    // Pasajeros
    Route::resource('/passengers', PassengerController::class);

    // Conductores
    Route::resource('/drivers', DriverController::class);

    // Vehiculos
    Route::resource('/vehicles', VehicleController::class);

    // Usuarios
    Route::resource('/users', UserController::class);

});
require __DIR__.'/auth.php';
