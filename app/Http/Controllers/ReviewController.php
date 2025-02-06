<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * create
     *
     * @param  mixed $gameId
     * @return View
     */
    public function create($gameId): View
    {
        $game = Game::findOrFail($gameId);
        return view('reviews.create', compact('game'));
    }

    /**
     * store
     *
     * @param  Request $request
     * @param  mixed $gameId
     * @return RedirectResponse
     */
    public function store(Request $request, $gameId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:255',
        ]);

        Review::create([
            'user_id' => $request->user_id,
            'game_id' => $gameId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('games.show', $gameId)->with('success', 'Review submitted successfully!');
    }
}