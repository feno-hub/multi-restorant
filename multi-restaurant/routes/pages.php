<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientCartController;
use App\Http\Controllers\ConditionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FonctionalityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestoController;
use Illuminate\Support\Facades\Route;

Route::get('/acceuil', [HomeController::class, 'index'])
    ->name('home');

Route::controller(ContactController::class)
    ->name("contact.")
    ->prefix("contact")
    ->group(function () {
        
        Route::get('/index', 'index')
            ->name('index');

        Route::post('/store', 'store')
            ->name('store');

});

Route::controller(MenuController::class)
    ->name('menu.')
    ->prefix('menu/')
    ->group(function () {
        
        Route::get('listes', 'index')
          ->name('index');

        Route::get('menu/recherche', 'search')
            ->name('search');

        Route::get('detaille/{id}', 'show')
            ->name('show');

        Route::post('like', 'likeStore')
            ->name('like');
    
    });

Route::controller(RestoController::class)
    ->name('resto.')
    ->prefix('restaurant/')
    ->group(function () {

        Route::get('liste', 'list')
            ->name('list');

        Route::get('search', 'search')
            ->name('search');

        Route::get('avies-clients/{id}', 'notice')
            ->name('notice');
        
        Route::post('avies-clients/store', 'store')
            ->middleware(['user'])  
            ->name('notice-sotre');

        Route::get('detaille/{id}', 'show')
            ->name('show');



    });

Route::get('confidentialité', [PrivacyController::class, 'index'])
    ->name('privacy');

Route::get('mentions-legal', [LegalController::class, 'index'])
    ->name('legal');

Route::get('conditions-generale', [ConditionsController::class, 'index'])
    ->name('conditions');

Route::get('comment-ça-marche', [FonctionalityController::class, 'index'])
    ->name('fonctionality');

Route::middleware('auth')
    ->prefix('client')
    ->name('client.')
    ->group(function () {

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

Route::middleware('auth')
    ->prefix('client')
    ->name('client.')
    ->group(function () {

        Route::get('/reservations', [ReservationController::class, 'index'])
            ->name('reservations.index');

        Route::get('/restaurant/{resto}/reservation', [ReservationController::class, 'create'])
            ->name('reservation.create');

        Route::post('/restaurant/{resto}/reservation', [ReservationController::class, 'store'])
            ->name('reservation.store');

        Route::get('/reservation/{reservation}', [ReservationController::class, 'show'])
            ->name('reservation.show');

});

Route::controller(FavoriteController::class)
    ->middleware('auth')
    ->prefix('client/')
    ->group(function () {

        Route::post('ajouter-favories', 'favoriteStore')
            ->name('favorite');
        
});