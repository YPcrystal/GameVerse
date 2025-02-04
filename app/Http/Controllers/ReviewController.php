<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $gameId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:255',
        ]);

        $game = Game::findOrFail($gameId);
        Review::create([
            'user_id' => Auth::id(),
            'game_id' => $gameId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        

        return redirect()->route('games.show', $gameId)->with('success', 'Review submitted successfully!');
    }
}
