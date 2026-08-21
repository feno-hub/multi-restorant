<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\VendorMenuController;
use App\Http\Controllers\Vendor\VendorOrdersController;
use App\Http\Controllers\Vendor\VendorPlatController;
use Illuminate\Support\Facades\Route;

Route::get('/vendeur/tableau-bord', [DashboardController::class, 'dashboard'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendor.dashboard');

Route::controller(VendorMenuController::class)
    ->name('vendeur.menu.')
    ->prefix('vendeur/menu/')
    ->middleware(['vendeur', 'subscription.active'])
    ->group(function () {

        Route::get('ajout', 'create')
            ->name('create');

        Route::post('ajout/store', 'store')
            ->name('store');

        Route::get('modifier', 'edit')
            ->name('edit');
});

Route::get('/vendeur/commandes', [VendorOrdersController::class, 'index'])
    ->middleware(['vendeur', 'subscription.active'])
    ->name('vendeur.orders');

Route::controller(VendorPlatController::class)
    ->name('vendeur.plat.')
    ->prefix('vendeur/plat/')
    ->middleware(['vendeur', 'subscription.active'])
    ->group(function () {
        
        Route::get('nouveau', 'index')
            ->name('insert')
            ->prefix('nouveau');

});