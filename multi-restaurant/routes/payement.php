<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('client')
    ->name('client.')
    ->group(function () {

        Route::get('/commande/{order}/payer', [PaymentController::class, 'showOrderPayment'])
            ->name('payment.order');

        Route::post('/commande/{order}/payer', [PaymentController::class, 'payOrder'])
            ->name('payment.order.process');

        // Route::get('/reservation/{reservation}/payment', [PaymentController::class, 'showReservationPayment'])
        //     ->name('payment.reservation.process');

        Route::post('/reservation/{reservation}/payer', [PaymentController::class, 'payReservation'])
            ->name('payment.reservation');

        Route::get('/paiement/{payment}/succes', [PaymentController::class, 'success'])
            ->name('payment.success');
    });
