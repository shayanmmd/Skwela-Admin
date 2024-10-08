<?php

use Blogs\Http\Controllers\BlogController;

Route::middleware(['web', 'auth'])->group(function () {
    
    Route::get('/create-blog', [BlogController::class, 'create'])->name('create-blog');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store-blog');
});
