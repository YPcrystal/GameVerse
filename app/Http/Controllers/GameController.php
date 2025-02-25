<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

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
                ->with('recommendations', 'reviews') // Eager load recommendations dan reviews
                ->get();

        // Hitung rating rata-rata untuk setiap game (lebih efisien)
        $games->each(function ($game) {
            $game->rating_rata_rata = $game->averageCriticScore();
        });

        return view('games.index', compact('games')); // Tidak perlu mengirim $recommendations jika sudah di eager load
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:games,judul',
            'platform' => 'required',
            'genre' => 'required',
            'tanggal_rilis' => 'required|date',
            'developer' => 'required',
            'publisher' => 'required',
            'deskripsi_singkat' => 'required',
            'gambar_cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'trailer' => 'required|url',
        ]);

        $game = new Game;
        $game->fill($request->all());

        if ($request->hasFile('gambar_cover')) {
            $path = $request->file('gambar_cover')->store('images/covers', 'public');
            $game->gambar_cover = '/storage/' . $path;
        }

        $game->save();

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'judul' => 'required|unique:games,judul,' . $game->id,
            'platform' => 'required',
            'genre' => 'required',
            'tanggal_rilis' => 'required|date',
            'developer' => 'required',
            'publisher' => 'required',
            'deskripsi_singkat' => 'required',
            'gambar_cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'trailer' => 'required|url',
        ]);

        $game->fill($request->all());

        if ($request->hasFile('gambar_cover')) {
            // Hapus gambar lama jika ada
            if ($game->gambar_cover) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $game->gambar_cover));
            }

            $path = $request->file('gambar_cover')->store('images/covers', 'public');
            $game->gambar_cover = '/storage/' . $path;
        }

        $game->save();


        return redirect()->route('games.index')->with('success', 'Game berhasil diupdate!');
    }

    public function destroy(Game $game)
    {
        if ($game->gambar_cover) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $game->gambar_cover));
        }

        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game berhasil dihapus!');
    }
}