<?php

use Navlinks\Http\Controllers\NavlinksController;

Route::middleware(['auth', 'web'])->group(function () {

    Route::get('/navlinks', [NavlinksController::class, 'index'])->name('navlinks-page');
    Route::get('/navlinks-delete', [NavlinksController::class, 'delete'])->name('navlinks-delete');
    Route::post('/navlinks-add', [NavlinksController::class, 'add'])->name('navlinks-add');
    Route::post('/navlinks-edit', [NavlinksController::class, 'edit'])->name('navlinks-edit');
    Route::get('/navlinks-edit-show', [NavlinksController::class, 'editShow'])->name('navlinks-edit-show');
});
