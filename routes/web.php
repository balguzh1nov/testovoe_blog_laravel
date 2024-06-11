<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('dashboard', [PostController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

// Routes for admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('posts', PostController::class);
});

// Routes for moderator
Route::middleware(['auth', 'role:moderator'])->group(function () {
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

