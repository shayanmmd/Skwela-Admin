<?php

use Permissions\Http\Controllers\RoleController;

Route::middleware(['auth', 'web'])->prefix('/roles')->group(function () {

    Route::get('/', [RoleController::class, 'index'])->name('role-permission-page');
    Route::post('/add', [RoleController::class, 'add'])->name('add-role');
    Route::get('/delete', [RoleController::class, 'delete'])->name('delete-role');
});
