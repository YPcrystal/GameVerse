<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Review;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $platform = $request->platform;
        $genre = $request->genre;

        $games = Game::when($platform, function ($query, $platform) {
                        return $query->where('platform', $platform);
                    })
                    ->when($genre, function ($query, $genre) {
                        return $query->where('genre', $genre);
                    })
                    ->get();

        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'platform' => 'required',
            'genre' => 'required',
            'tanggal_rilis' => 'required|date',
            'developer' => 'required',
            'publisher' => 'required',
            'deskripsi_singkat' => 'required',
            'gambar_cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trailer' => 'required|url',
        ]);

        $game = new Game;
        $game->judul = $request->judul;
        $game->platform = $request->platform;
        $game->genre = $request->genre;
        $game->tanggal_rilis = $request->tanggal_rilis;
        $game->developer = $request->developer;
        $game->publisher = $request->publisher;
        $game->deskripsi_singkat = $request->deskripsi_singkat;

        if ($request->hasFile('gambar_cover')) {
            $image = $request->file('gambar_cover');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/covers');
            $image->move($destinationPath, $name);
            $game->gambar_cover = '/images/covers/'.$name;
        }

        $game->trailer = $request->trailer;
        $game->save();

        return redirect('/games')->with('success', 'Game berhasil ditambahkan!');
    }

    public function show($id)
    {
        $game = Game::find($id);
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::find($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'platform' => 'required',
            'genre' => 'required',
            'tanggal_rilis' => 'required|date',
            'developer' => 'required',
            'publisher' => 'required',
            'deskripsi_singkat' => 'required',
            'gambar_cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional
            'trailer' => 'required|url',
        ]);

        $game = Game::find($id);
        $game->judul = $request->judul;
        $game->platform = $request->platform;
        $game->genre = $request->genre;
        $game->tanggal_rilis = $request->tanggal_rilis;
        $game->developer = $request->developer;
        $game->publisher = $request->publisher;
        $game->deskripsi_singkat = $request->deskripsi_singkat;

        if ($request->hasFile('gambar_cover')) {
            $image = $request->file('gambar_cover');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/covers');

            // Hapus gambar lama (jika ada)
            if ($game->gambar_cover && file_exists(public_path($game->gambar_cover))) {
                unlink(public_path($game->gambar_cover));
            }

            $image->move($destinationPath, $name);
            $game->gambar_cover = '/images/covers/'.$name;
        }

        $game->trailer = $request->trailer;
        $game->save();

        return redirect('/games')->with('success', 'Game berhasil diupdate!');
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();
        return redirect('/games')->with('success', 'Game berhasil dihapus!');
    }
}