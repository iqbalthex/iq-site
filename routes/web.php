<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ {
  LearnController,
  PostController,
  TutorialController,
};
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

Route::get('/home', function (): Response {
    return Inertia::render('Home', [
        'title' => 'Home',
    ]);
})->name('home');

Route::controller(TutorialController::class)->prefix('/tutorial')->name('tutorial.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{post}', 'show')->name('show');
});

Route::controller(LearnController::class)->prefix('/learn')->name('learn.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{post}', 'show')->name('show');
});

Route::resource('tutorial', TutorialController::class)->only('index', 'show');
Route::resource('posts', PostController::class);

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/
