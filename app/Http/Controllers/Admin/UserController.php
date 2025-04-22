<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class UserController extends Controller

{
    public function index()
    {
        $games = Game::all();
        $popularGenres = Game::select('genre', \DB::raw('COUNT(*) as total'))
            ->groupBy('genre')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();

        $popularPlatforms = Game::select('platform', \DB::raw('COUNT(*) as total'))
            ->groupBy('platform')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();

        return view('admin.games.index', compact('games', 'popularGenres', 'popularPlatforms'));
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }
}