<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', [AppController::class, 'index'])->name('dashboard');
    Route::resource('/trips', TripController::class);
    Route::post('set-trip-driver/{trip}', [TripController::class, 'setDriver'])->name('set-trip-driver');
    Route::post('add-trip-passenger/{trip}', [TripController::class, 'addPassenger'])->name('add-trip-passenger');
    Route::delete('remove-passenger/{tripPassenger}', [TripController::class, 'removePassenger'])->name('remove-passenger');
});

require __DIR__.'/auth.php';
