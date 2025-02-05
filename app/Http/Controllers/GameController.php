<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(10); // Menampilkan 10 game per halaman
        return view('games.index', compact('games'));
        
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $games = Game::where('title', 'like', "%{$query}%")
                     ->orWhere('genre', 'like', "%{$query}%")
                     ->orWhere('description', 'like', "%{$query}%")
                     ->orWhere('platform', 'like', "%{$query}%")
                     ->get(['id', 'title', 'genre', 'description', 'platform']);
        return view('games.index', compact('games'));
    }

    public function storeReview(Request $request, $gameId)
    {
        $request->validate([
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
            'game_id' => $gameId,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('games.show', $gameId);
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'platform' => 'required|string|max:255',
        ]);

        Game::create($request->all());

        return redirect()->route('games.index')->with('success', 'Game created successfully!');
    }
}