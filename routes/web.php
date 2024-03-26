<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::view('/', 'welcome')->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');


    Route::get('/chirps',[ChirpController::class, 'index'])
        ->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])
        ->name('chirps.store');

    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])
        ->name('chirps.edit');

    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])
        ->name('chirps.update');

    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])
        ->name('chirps.destroy');

});





