<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Abonnements
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | Afficher les plans
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/subscription',
            [SubscriptionController::class, 'index']
        )->name('subscription.index');


        /*
        |--------------------------------------------------------------------------
        | Souscrire
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/subscription/{plan}/subscribe',
            [SubscriptionController::class, 'subscribe']
        )->name('subscription.subscribe');


        /*
        |--------------------------------------------------------------------------
        | Historique
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/subscription/history',
            [SubscriptionController::class, 'history']
        )->name('subscription.history');

    });