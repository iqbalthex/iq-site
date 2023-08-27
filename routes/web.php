<?php

use App\Http\Controllers\ {
  OperatorController,
  TeacherController,
};
use Illuminate\Support\Facades\Route;

Route::controller(OperatorController::class)->prefix('/operator')->name('operator.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(TeacherController::class)->prefix('/teacher')->name('teacher.')->group(function () {
    Route::get('/', 'index')->name('index');
    // Route::get('/formative/{subject?}', 'formative')->name('formative');
    // Route::get('/sumative/{subject?}', 'sumative')->name('sumative');
});

Route::get('/profile/edit', function () {
    return 'profile';
})->name('profile.edit');

require_once 'auth.php';
