<?php

use Courses\Http\Controllers\CourseController;

Route::middleware(['web', 'auth'])->prefix('/courses')->group(function () {

    Route::get('/', [CourseController::class, 'index'])->name('courses-page');
});
