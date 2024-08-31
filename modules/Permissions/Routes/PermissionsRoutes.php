<?php

use Permissions\Http\Controllers\PermissionsController;

Route::middleware(['auth', 'web'])->group(function () {

    Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions-page');
    Route::post('/add-role', [PermissionsController::class, 'addRole'])->name('add-role');
    Route::post('/add-permission', [PermissionsController::class, 'addPermission'])->name('add-permission');
    Route::get('/get-permissions', [PermissionsController::class, 'getPermissions'])->name('get-permissions');
});
