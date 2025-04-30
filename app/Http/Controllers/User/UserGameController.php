<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGameController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan daftar game
        return view('user.games.index');
    }

    public function show($id)
    {
        // Logika untuk menampilkan detail game
        return view('user.games.show', compact('id'));
    }
}