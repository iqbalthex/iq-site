<?php

use App\Http\Controllers\ {
  DashboardController,
};
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/profile/edit', function () {
    return 'profile';
})->name('profile.edit');

require_once 'auth.php';
