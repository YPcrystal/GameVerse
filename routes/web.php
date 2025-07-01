<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\IklanController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// admin routes
use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IklanController as AdminIklanController;

// user routes
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserGameController;
use App\Http\Controllers\User\UserReviewController;
use App\Http\Controllers\User\UserIklanController;
use App\Http\Controllers\User\UserProfileController; //klo user memiliki banyak profile

// Rute untuk halaman beranda dan home
Route::get('/', function () {
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
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminAdminController::class, 'index'])->name('dashboard');
    Route::resource('games', AdminGameController::class);
    Route::resource('iklans', AdminIklanController::class);
    Route::resource('reviews', AdminReviewController::class);
    Route::resource('users', AdminUserController::class);
    // Tambahkan rute admin lainnya di sini
});

// Untuk user biasa
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('games', UserGameController::class);
    Route::resource('iklans', UserIklanController::class);
    Route::resource('reviews', UserReviewController::class);
    Route::resource('profiles', UserProfileController::class); // Jika user memiliki banyak profile
});

Route::get('iklans/{iklan}/payment', [UserIklanController::class, 'payment'])->name('user.iklans.payment');

// Untuk user yang sudah login

// Rute untuk profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
});

require _DIR_.'/auth.php';

// Rute untuk Forum Diskusi (jika Anda menggunakan package forum)
// Sesuaikan dengan package forum yang Anda gunakan
// Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
// Route::get('/forum/{slug}', [ForumController::class, 'show'])->name('forum.show');