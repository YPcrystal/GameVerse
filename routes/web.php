<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Route::resource('/products', ProductController::class);
// Route::resource('/posts', PostController::class);
// Route::resource('/reporters', ReporterController::class);
// Route::resource('/comments', CommentController::class);
// Route::resource('/siswas', SiswaController::class);
// Route::resource('/nilais', NilaiController::class);

// Rute untuk GameController dengan fitur tambahan
Route::get('/games/search', [GameController::class, 'search'])->name('games.search');
Route::resource('games', GameController::class)->except(['search']);

// Nested routes for reviews within games with middleware group
Route::prefix('games/{game}')->middleware(['auth'])->group(function () {
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rute untuk Forum Diskusi (jika Anda menggunakan package forum)
// Sesuaikan dengan package forum yang Anda gunakan
Route::get('/forum', 'ForumController@index')->name('forum.index');
Route::get('/forum/{slug}', 'ForumController@show')->name('forum.show');