<?php


use User\Http\Controllers\Auth\AuthenticatedSessionController;
use User\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use User\Http\Controllers\Profile\ProfileController;

Route::middleware(['guest', 'web'])->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth', 'web'])->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile-page');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile-update');
});
