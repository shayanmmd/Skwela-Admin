<?php

use Dashboard\Http\Controllers\DashboardController;

Route::get('/', DashboardController::class . '@home')->name('home-page');
