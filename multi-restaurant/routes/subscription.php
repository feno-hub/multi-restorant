<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])
    ->group(function () {

        Route::get(
            '/subscription',
            [SubscriptionController::class, 'index']
        )->name('subscription.index');


        Route::post(
            '/subscription/{plan}/subscribe',
            [SubscriptionController::class, 'subscribe']
        )->name('subscription.subscribe');


        Route::get(
            '/subscription/history',
            [SubscriptionController::class, 'history']
        )->name('subscription.history');

    });