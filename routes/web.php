<?php

use App\Http\Controllers\ {
  DashboardController,
  // FormativeController,
  // SumativeController,
};
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/formative-score/{subject}'. [FormativeController::class, 'index'])->name('formative.score');
// Route::get('/sumative-score/{subject}'. [SumativeController::class, 'index'])->name('sumative.score');

Route::get('/profile/edit', function () {
    return 'profile';
})->name('profile.edit');

require_once 'auth.php';
