<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class UserGameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('user.games.index', compact('games'));
    }

    public function show(Game $game)
    {
        return view('user.games.show', compact('game'));
    }
}