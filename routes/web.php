<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', [AppController::class, 'index'])->name('dashboard');

    // Viajes
    Route::resource('/trips', TripController::class);
    Route::post('set-trip-driver/{trip}', [TripController::class, 'setDriver'])->name('set-trip-driver');
    Route::post('add-trip-passenger/{trip}', [TripController::class, 'addPassenger'])->name('add-trip-passenger');
    Route::delete('remove-passenger/{tripPassenger}', [TripController::class, 'removePassenger'])->name('remove-passenger');

    // Pasajeros
    Route::resource('/passengers', PassengerController::class);
});

require __DIR__.'/auth.php';
