<?php

use App\Http\Controllers\Client\ActivitiesController;
use App\Http\Controllers\Client\dashboardController;
use App\Http\Controllers\Client\FavoritesController;
use App\Http\Controllers\Client\OrdersController;
use App\Http\Controllers\Client\ProfilController;
use App\Http\Controllers\client\RestoController;
use Illuminate\Support\Facades\Route;

Route::get('/client/tableau-board', [DashboardController::class, 'profil'])
    ->middleware(['user'])
    ->name('client.dashboard');

Route::get('/client/creation-restaurant', [RestoController::class, 'index'])
    ->middleware(['user'])
    ->name('client.createResto');

Route::controller(RestoController::class)
    ->prefix('client/restaurant/')
    ->middleware(['user'])
    ->name('client.')
    ->group(function () {

        Route::get('creation-restaurant', 'index')
            ->name('createresto');

        Route::post('store', 'store')
            ->name('store');

        Route::get('liste', 'restoList')
            ->name('resto.list');

        Route::get('détail/{id}', 'show')
            ->name('resto.show');

    });


Route::controller(ProfilController::class)
    ->prefix('client/profil/')
    ->middleware(['user'])
    ->name('client.profil.')
    ->group(function () {

        Route::get('index', 'index')
            ->name('index');

        Route::get('modifier', 'edit')
            ->name('edit');

        Route::put('update', 'update')
            ->name('update');
    });

Route::controller(OrdersController::class)
    ->middleware(['user'])
    ->prefix('client/commandes')
    ->name('client.orders.')
    ->group(function () {

        Route::get('liste', 'index')
            ->name('index');
    });



Route::controller(ActivitiesController::class)
    ->prefix('client/')
    ->middleware(['user'])
    ->name('client.')
    ->group(function () {

        Route::get('activité', 'index')
            ->name('activities');

});

Route::controller(FavoritesController::class)
    ->prefix('client/')
    ->middleware(['user'])
    ->name('client.')
    ->group(function () {

        Route::get('mes_favoris', 'index')
            ->name('favorites');

});
