<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman beranda dan home
Route::get('/', [PublicController::class, 'index'])->name('public.dashboard');
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

// Rute untuk dashboard user dan admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
        Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::patch('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

        Route::get('/admin/games', [AdminController::class, 'games'])->name('admin.games');
        Route::get('/admin/games/create', [AdminController::class, 'createGame'])->name('admin.games.create');
        Route::post('/admin/games', [AdminController::class, 'storeGame'])->name('admin.games.store');
        Route::get('/admin/games/{game}/edit', [AdminController::class, 'editGame'])->name('admin.games.edit');
        Route::patch('/admin/games/{game}', [AdminController::class, 'updateGame'])->name('admin.games.update');
        Route::delete('/admin/games/{game}', [AdminController::class, 'destroyGame'])->name('admin.games.destroy');

        Route::get('/admin/reviews', [AdminController::class, 'reviews'])->name('admin.reviews');
        Route::delete('/admin/reviews/{review}', [AdminController::class, 'destroyReview'])->name('admin.reviews.destroy');
    });
});

// Rute untuk profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rute untuk Forum Diskusi (jika Anda menggunakan package forum)
// Sesuaikan dengan package forum yang Anda gunakan
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{slug}', [ForumController::class, 'show'])->name('forum.show');