<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NoticesController;
use App\Http\Controllers\Admin\RestoController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(["admin"])
    ->name('admin.dashboard');


    // RESTORAUNTS

Route::get('/admin/restaurant', [RestoController::class, 'index'])
    ->middleware(['admin'])
    ->name('admin.restaurant');

Route::get('/admin/restaurant/{id}/detail', [RestoController::class, 'show'])
    ->middleware(['admin'])
    ->name('admin.restaurant.show');

Route::patch('/admin/{id}/accepter', [RestoController::class, 'accepter'])
    ->middleware(['admin'])
    ->name('admin.resto.accepter');

Route::patch('/admin/{id}/refuser', [RestoController::class, 'refuser'])
    ->middleware(['admin'])
    ->name('admin.resto.refuser');

    // NOTICES

Route::get('/admin/avies', [NoticesController::class, 'index'])
    ->middleware(['admin'])
    ->name('admin.notices');

    // USERS

Route::get('/admin/utilisateur', [UserController::class, 'list'])
    ->middleware(['admin'])
    ->name('admin.user');


// SUBSCRIPTION

Route::get('admin/abonnement', [SubscriptionController::class, 'index'])
    ->middleware(['admin'])
    ->name('admin.subscription');

Route::get('admin/abonnement/ajout', [SubscriptionController::class, 'create'])
    ->middleware(['admin'])
    ->name('admin.subscription.create');

Route::post('admin/abonnement', [SubscriptionController::class, 'store'])
    ->middleware(['admin'])
    ->name('admin.subscription.store');

Route::get('admin/abonnement/modifier/{subscriptionPlan}', [SubscriptionController::class, 'edit'])
    ->middleware(['admin'])
    ->name('admin.subscription.edit');

Route::put('admin/abonnement/modifier', [SubscriptionController::class, 'update'])
    ->middleware(['admin'])
    ->name('admin.subscription.update');

Route::delete('admin/abonnement', [SubscriptionController::class, 'destroy'])
    ->middleware(['admin'])
    ->name('admin.subscription.destroy');