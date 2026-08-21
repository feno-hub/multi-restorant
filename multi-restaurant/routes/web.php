<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/acceuil');
});

require __DIR__.'/auth.php';
require __DIR__.'/pages.php';
require __DIR__.'/admin.php';
require __DIR__.'/vendor.php';
require __DIR__.'/client.php';
require __DIR__.'/subscription.php';
