<?php

use App\Http\Controllers\ComentController;
use App\Http\Controllers\ConditionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FonctionalityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\SubscriptionController;
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

        Route::get('detaille', 'show')
        ->name('show');

        Route::get('categories/{name}', 'category')
        ->name('category');

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

        Route::get('detaille/reserver/table/{resto}', 'reservation')
            ->name('reservation');

        Route::post('detaille/reserver/table/{resto}', 'storeReservation')
            ->name('reservation.store');

    });

Route::get('confidentialité', [PrivacyController::class, 'index'])
    ->name('privacy');

Route::get('mentions-legal', [LegalController::class, 'index'])
    ->name('legal');

Route::get('conditions-generale', [ConditionsController::class, 'index'])
    ->name('conditions');

Route::get('comment-ça-marche', [FonctionalityController::class, 'index'])
    ->name('fonctionality');
