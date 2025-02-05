<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game; 
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, $gameId)
    {
        // Pastikan game dengan ID yang diberikan ada
        $game = Game::findOrFail($gameId);

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