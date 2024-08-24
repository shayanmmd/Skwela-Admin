<?php

use Dashboard\Http\Controllers\DashboardController;

Route::get('/', DashboardController::class . '@home')->name('home-page');
Route::get('/navlinks', DashboardController::class . '@navlinks')->name('navlinks-page');
