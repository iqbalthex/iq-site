<?php

use App\Http\Controllers\ {
  OperatorController,
  TeacherController,
};
use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => OperatorController::class,
    'prefix' => '/operator',
    'as' => 'operator.',
    'middleware' => [],
], function () {
    Route::get('/', 'index')->name('index');
});

Route::group([
    'controller' => TeacherController::class,
    'prefix' => '/teacher',
    'as' => 'teacher.',
    'middleware' => [],
], function () {
    Route::get('/', 'index')->name('index');
    // Route::get('/formative-score/{subject}', 'formative')->name('formative');
    // Route::get('/sumative-score/{subject}', 'sumative')->name('sumative');
});

Route::get('/profile/edit', function () {
    return 'profile';
})->name('profile.edit');

require_once 'auth.php';
