<?php

use Contact\Http\Controllers\ContactController;

Route::middleware(['web', 'auth'])->prefix('/contact')->group(function () {

    Route::get('/', [ContactController::class, 'index'])->name('contact-page');
});
