<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Review;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Recommendation;

class GameController extends Controller
{
    // index, create, store, show, edit, update, destroy
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
                ->with('recommendations')
                ->get();

        $recommendations = Recommendation::all();

        // Hitung rating rata-rata untuk setiap game
        foreach ($games as $game) {
            $game->rating_rata_rata = $game->averageCriticScore();
        }


        return view('games.index', compact('games', 'recommendations'));
    }

    // Menampilkan form untuk membuat game baru
    public function create()
    {
        return view('games.create');
    }

    // Menyimpan game baru ke database
    public function store(Request $request)
    {
        // ... (validasi)

        $game = new Game;
        $game->fill($request->all());

        if ($request->hasFile('gambar_cover')) {
            $path = $request->file('gambar_cover')->store('images/covers', 'public');
            $game->gambar_cover = '/storage/' . $path;
        }

        $game->save();

        // Hitung dan update rating rata-rata setelah game disimpan
        $game->rating_rata_rata = $game->averageCriticScore();
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    // Menampilkan detail game
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    // Menampilkan form untuk mengedit game
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    // Menyimpan perubahan game ke database
    public function update(Request $request, Game $game)
    {
        // ... (validasi)

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

        // Hitung dan update rating rata-rata setelah game diupdate
        $game->rating_rata_rata = $game->averageCriticScore();
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game berhasil diupdate!');
    }

    public function destroy(Game $game)
    {
        // Hapus gambar cover jika ada
        if ($game->gambar_cover) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $game->gambar_cover));
        }

        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game berhasil dihapus!');
    }
}