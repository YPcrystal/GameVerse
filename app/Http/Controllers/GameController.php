<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; // Import model Game

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
        return view('games.create'); // Menampilkan form untuk menambah game baru
    }

    public function store(Request $request) //menyimpan data
{
    $request->validate([
        'judul' => 'required',
        'platform' => 'required',
        'genre' => 'required',
        'tanggal_rilis' => 'required|date',
        'developer' => 'required',
        'publisher' => 'required',
        'deskripsi_singkat' => 'required',
        'gambar_cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        'trailer' => 'required|url', // Validasi untuk URL trailer
    ]);

    $game = new Game;
    $game->judul = $request->judul;
    $game->platform = $request->platform;
    $game->genre = $request->genre;
    $game->tanggal_rilis = $request->tanggal_rilis;
    $game->developer = $request->developer;
    $game->publisher = $request->publisher;
    $game->deskripsi_singkat = $request->deskripsi_singkat;

    // Simpan gambar cover
    if ($request->hasFile('gambar_cover')) {
        $image = $request->file('gambar_cover');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/covers'); // Folder untuk menyimpan gambar
        $image->move($destinationPath, $name);
        $game->gambar_cover = '/images/covers/'.$name; // Simpan path gambar di database
    }

    $game->trailer = $request->trailer;
    $game->save();

    return redirect('/games')->with('success', 'Game berhasil ditambahkan!');
}

    public function show($id) //show
    {
        $game = Game::find($id); // Mengambil data game berdasarkan id
        return view('games.show', compact('game')); // Menampilkan detail game di view 'games.show'
    }

    public function edit($id)
    {
        $game = Game::find($id); // Mengambil data game berdasarkan id
        return view('games.edit', compact('game')); // Menampilkan form untuk mengedit game
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
        'gambar_cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar (opsional)
        'trailer' => 'required|url', // Validasi untuk URL trailer
    ]);

    $game = Game::find($id);
    $game->judul = $request->judul;
    $game->platform = $request->platform;
    $game->genre = $request->genre;
    $game->tanggal_rilis = $request->tanggal_rilis;
    $game->developer = $request->developer;
    $game->publisher = $request->publisher;
    $game->deskripsi_singkat = $request->deskripsi_singkat;

    // Update gambar cover jika ada yang baru
    if ($request->hasFile('gambar_cover')) {
        $image = $request->file('gambar_cover');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/covers');
        $image->move($destinationPath, $name);
        $game->gambar_cover = '/images/covers/'.$name;
    }

    $game->trailer = $request->trailer;
    $game->save();

    return redirect('/games')->with('success', 'Game berhasil diupdate!');
 }

    public function destroy($id)
    {
        $game = Game::find($id); // Mengambil data game berdasarkan id
        $game->delete(); // Menghapus data game dari database
        return redirect('/games')->with('success', 'Game berhasil dihapus!');
    }

}