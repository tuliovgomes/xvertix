<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/followers', [FollowController::class, 'index'] )->name('followers.index');
    Route::post('/followers/trash/{follow}', [FollowController::class, 'destroy'] )->name('followers.trash');
    Route::post('follow/{user}', [FollowController::class, 'store'])->name('follow.store');
});

require __DIR__.'/auth.php';
