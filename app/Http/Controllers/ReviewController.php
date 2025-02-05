<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($gameId)
    {
        $game = Game::findOrFail($gameId);
        return view('reviews.create', compact('game'));
    }

    public function store(Request $request, $gameId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:255',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'game_id' => $gameId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('games.show', $gameId)->with('success', 'Review submitted successfully!');
    }
}