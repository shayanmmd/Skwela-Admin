<?php

use Dashboard\Http\Controllers\DashboardController;

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home-page');
});
