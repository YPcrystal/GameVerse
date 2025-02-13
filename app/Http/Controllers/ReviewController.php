<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Game $game): View
    {
        return view('reviews.create', compact('game'));
    }

    public function store(Request $request, Game $game): RedirectResponse
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:255',
        ]);

        Review::create([
            'game_id' => $game->id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('games.show', $game->id)->with('success', 'Review submitted successfully!');
    }
}