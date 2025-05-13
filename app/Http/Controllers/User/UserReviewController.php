<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    public function index()
    {
        // Ambil semua review milik pengguna yang sedang login
        $reviews = Review::where('user_id', Auth::id())->with('game')->get();
        // Ambil semua game untuk ditampilkan di form
        $games = Game::all();

        return view('user.reviews.index', compact('reviews', 'games'));
    }

    public function create()
    {
        // Ambil semua game untuk ditampilkan di form
        $games = Game::all();

        return view('user.reviews.create', compact('games'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Simpan review baru
        Review::create([
            'user_id' => Auth::id(),
            'game_id' => $request->game_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil ditambahkan!');
    }

    public function show(Review $review)
    {
        // Pastikan review milik pengguna yang sedang login
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('user.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        // Pastikan review milik pengguna yang sedang login
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Ambil semua game untuk ditampilkan di form
        $games = Game::all();

        return view('user.reviews.edit', compact('review', 'games'));
    }

    public function update(Request $request, Review $review)
    {
        // Pastikan review milik pengguna yang sedang login
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Update review
        $review->update([
            'game_id' => $request->game_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil diperbarui!');
    }

    public function destroy(Review $review)
    {
        // Pastikan review milik pengguna yang sedang login
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus review
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus!');
    }
}