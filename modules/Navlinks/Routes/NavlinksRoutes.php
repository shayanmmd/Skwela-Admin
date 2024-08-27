<?php

use Navlinks\Http\Controllers\NavlinksController;

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/navlinks', NavlinksController::class . '@showNavlinksView')->name('navlinks-page');
    Route::post('/navlinks-delete', NavlinksController::class . '@delete')->name('navlinks-delete');
    Route::post('/navlinks-add', NavlinksController::class . '@add')->name('navlinks-add');
    Route::post('/navlinks-edit', NavlinksController::class . '@edit')->name('navlinks-edit');
    Route::get('/navlinks-edit-show', NavlinksController::class . '@editShow')->name('navlinks-edit-show');
});
