<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing');

 Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('postings', \App\Http\Controllers\Admin\JobPostingController::class)->parameters(['postings' => 'posting']);
    });

    Route::middleware(['role:hr_officer'])->prefix('hr')->name('hr.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Hr\DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware(['role:supervisor'])->prefix('supervisor')->name('supervisor.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Supervisor\DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware(['role:intern'])->prefix('intern')->name('intern.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Intern\DashboardController::class, 'index'])->name('dashboard');
    });

 });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
