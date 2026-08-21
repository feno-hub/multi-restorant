<?php

use App\Http\Controllers\Client\ActivitiesController;
use App\Http\Controllers\Client\ClientCartController;
use App\Http\Controllers\Client\dashboardController;
use App\Http\Controllers\Client\FavoritesController;
use App\Http\Controllers\Client\OrderController;
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

// Route::controller(ClientCartController::class) 
//     ->prefix('client/pannier/')
//     ->middleware(['user'])
//     ->name('client.panier.')
//     ->group(function () {

//         Route::get('pages', 'index')
//             ->name('index');

// });


Route::controller(ProfilController::class)
    ->prefix('client/profil')
    ->middleware(['user'])
    ->name('client.profil.')
    ->group(function () {

        Route::get('index', 'index')
            ->name('index');

        Route::get('modifier', 'edit')
            ->name('edit');
    });

Route::controller(OrdersController::class)
    ->middleware(['user'])
    ->prefix('client/commandes')
    ->name('client.orders.')
    ->group(function () {

        Route::get('liste', 'index')
            ->name('index');
    });

Route::middleware('auth')
    ->prefix('client')
    ->name('client.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | PANIER
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/panier',
            [ClientCartController::class, 'index']
        )->name('cart.index');


        Route::post(
            '/panier/ajouter/{plat}',
            [ClientCartController::class, 'add']
        )->name('cart.add');


        Route::patch(
            '/panier/article/{item}',
            [ClientCartController::class, 'update']
        )->name('cart.update');


        Route::delete(
            '/panier/article/{item}',
            [ClientCartController::class, 'remove']
        )->name('cart.remove');


        Route::delete(
            '/panier',
            [ClientCartController::class, 'clear']
        )->name('cart.clear');


        /*
        |--------------------------------------------------------------------------
        | COMMANDE
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/commande/validation',
            [OrderController::class, 'checkout']
        )->name('orders.checkout');


        Route::post(
            '/commande',
            [OrderController::class, 'store']
        )->name('orders.store');


        Route::get(
            '/commande/{order}',
            [OrderController::class, 'show']
        )->name('orders.show');
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
