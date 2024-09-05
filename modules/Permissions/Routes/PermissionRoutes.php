<?php

use Permissions\Http\Controllers\PermissionsController;

Route::middleware(['auth', 'web'])->prefix('/permissions')->group(function () {

    Route::get('/', [PermissionsController::class, 'index'])->name('get-permissions');
    Route::post('/add', [PermissionsController::class, 'add'])->name('add-permission');
});
