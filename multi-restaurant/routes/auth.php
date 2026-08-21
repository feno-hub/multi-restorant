<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/connexion', [LoginController::class, 'login'])
    ->name('login');


Route::post('/connexion', [LoginController::class, 'store'])
    ->name('login.store');

Route::post('/deconnexion', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/inscription', [RegisterController::class, 'register'])
    ->name('register');

Route::post('/inscription', [RegisterController::class, 'store'])
    ->name('register.store');

