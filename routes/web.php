<?php

use App\Http\Controllers\ {
  CategoryController,
  LearnController,
  PostController,
  TutorialController,
};
use Illuminate\Support\Facades\Route;
use Inertia\ { Inertia, Response };

Route::get('/home', function (): Response {
    return Inertia::render('Home', [
        'title' => 'Home',
    ]);
})->name('home');

// Route::controller(CategoryController::class)->prefix('/categories')->name('categories.')->group(function () {
    // Route::get('/', 'index')->name('index');
// });

Route::resource('posts', PostController::class)->only('index', 'show');
Route::resource('learns', LearnController::class)->only('index', 'show');
Route::resource('tutorials', TutorialController::class)->only('index', 'show');
