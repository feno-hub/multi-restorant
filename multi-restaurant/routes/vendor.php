<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\ReservationInfoController;
use App\Http\Controllers\Vendor\VendorMenuController;
use App\Http\Controllers\Vendor\VendorOrdersController;
use App\Http\Controllers\Vendor\VendorPlatController;
use App\Http\Controllers\Vendor\VendorStockController;
use Illuminate\Support\Facades\Route;

Route::get('/vendeur/tableau-bord', [DashboardController::class, 'dashboard'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendor.dashboard');

Route::controller(VendorMenuController::class)
    ->name('vendeur.menu.')
    ->prefix('vendeur/menu/')
    ->middleware(['vendeur', 'subscription.active'])
    ->group(function () {

        Route::get('list', 'list')
            ->name('list');

        Route::get('ajout', 'create')
            ->name('create');

        Route::post('ajout/store', 'store')
            ->name('store');

        Route::get('détail/{id}', 'show')
            ->name('show');

        Route::get('modifier/{id}', 'edit')
            ->name('edit');
});

Route::get('/vendeur/commandes', [VendorOrdersController::class, 'index'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendeur.orders');

Route::patch('/vendeur/{id}/commandes/accepter', [VendorOrdersController::class, 'accepter'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendeur.orders.accepter');

Route::patch('/vendeur/{id}/commandes/refuser', [VendorOrdersController::class, 'refuser'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendeur.orders.refuser');

Route::get('/vendeur/commandes/détail/{id}', [VendorOrdersController::class, 'show'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendeur.orders.show');

Route::delete('/vendeur/commandes/{id}/supprimer', [VendorOrdersController::class, 'delete'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendeur.orders.delete');

Route::controller(VendorPlatController::class)
    ->name('vendeur.plat.')
    ->prefix('vendeur/plat/')
    ->middleware(['vendeur', 'subscription.active'])
    ->group(function () {
        
        Route::get('nouveau', 'create')
            ->name('insert')
            ->prefix('nouveau');

        Route::post('nouveau/store', 'store')
            ->name('insert.store');

});

Route::controller(VendorStockController::class)
    ->prefix('vendeur/')
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendor.stock')
    ->group(function () {

        Route::get('stock', 'index')
            ->name('index')
            ->prefix('stock');

});

Route::controller(ReservationInfoController::class)
    ->prefix('vendeur/')
    ->middleware(['vendeur'])
    ->name('vendor.reservation.info.')
    ->group(function () {

        Route::get('creer/information-reservation', 'reservationInfo')
            ->name('create');

        Route::post('creer/information-reservation', 'store')
            ->name('store');

});