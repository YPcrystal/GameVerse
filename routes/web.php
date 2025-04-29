<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// admin routes
use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IklanController as AdminIklanController;

// Rute untuk halaman beranda dan home
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Rute untuk Iklan
Route::resource('iklans', IklanController::class);

// Rute untuk GameController dengan fitur tambahan
Route::get('/games/search', [GameController::class, 'search'])->name('games.search');
Route::resource('games', GameController::class)->except(['search']);

// Nested routes for reviews within games with middleware group
Route::prefix('games/{game}')->middleware(['auth'])->group(function () {
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

Route::get('/reviews', [GameController::class, 'show'])->name('reviews.index');

// Rute untuk dashboard admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminAdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('games', AdminGameController::class);
    Route::resource('iklans', AdminIklanController::class);
    Route::resource('reviews', AdminReviewController::class);
    Route::resource('users', AdminUserController::class);
    // Tambahkan rute admin lainnya di sini
});

// Untuk user biasa
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard'); // Pastikan file view ini ada
    })->name('dashboard');
});

// Untuk user yang sudah login

// Rute untuk profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rute untuk Forum Diskusi (jika Anda menggunakan package forum)
// Sesuaikan dengan package forum yang Anda gunakan
// Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
// Route::get('/forum/{slug}', [ForumController::class, 'show'])->name('forum.show');