<?php

namespace App\Http\Controllers\Admin; // Tambahkan ini

use App\Http\Controllers\Controller; // Tambahkan ini
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $platform = $request->platform;
        $genre = $request->genre;
        $sortBy = $request->input('sort_by', 'rating_rata_rata');
        $sortOrder = $request->input('sort_order', 'desc');

        $games = Game::when($platform, function ($query, $platform) {
            return $query->where('platform', $platform);
        })
            ->when($genre, function ($query, $genre) {
                return $query->where('genre', $genre);
            })
            ->with('recommendations', 'reviews')
            ->get();

        $games->each(function ($game) {
            $game->rating_rata_rata = $game->averageCriticScore();
        });

        // Sorting
        $games = $games->sortBy($sortBy, SORT_REGULAR, $sortOrder === 'desc');

        // Hitung rekomendasi
        $recommendations = $this->calculateRecommendations();

        // Statistik
        $popularGenres = Game::select('genre', DB::raw('count(*) as total'))
            ->groupBy('genre')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $popularPlatforms = Game::select('platform', DB::raw('count(*) as total'))
            ->groupBy('platform')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('games.index', compact('games', 'recommendations', 'popularGenres', 'popularPlatforms'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data game
        $request->validate([
            'judul' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'gambar_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $game = new Game();
        $game->judul = $request->judul;
        $game->platform = $request->platform;
        $game->genre = $request->genre;
        $game->tanggal_rilis = $request->tanggal_rilis;

        if ($request->hasFile('gambar_cover')) {
            $imageName = time() . '.' . $request->gambar_cover->extension();
            $request->gambar_cover->move(public_path('images'), $imageName);
            $game->gambar_cover = $imageName;
        }

        $game->save();

        // Hitung ulang rekomendasi
        $recommendations = $this->calculateRecommendations();

        return redirect()->route('games.index', compact('recommendations'))->with('success', 'Game berhasil ditambahkan!');
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
        // Validasi dan update data game
        $request->validate([
            'judul' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'gambar_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $game->judul = $request->judul;
        $game->platform = $request->platform;
        $game->genre = $request->genre;
        $game->tanggal_rilis = $request->tanggal_rilis;

        if ($request->hasFile('gambar_cover')) {
            // Hapus gambar lama
            if ($game->gambar_cover) {
                Storage::delete('public/images/' . $game->gambar_cover);
            }

            $imageName = time() . '.' . $request->gambar_cover->extension();
            $request->gambar_cover->move(public_path('images'), $imageName);
            $game->gambar_cover = $imageName;
        }

        $game->save();

        // Hitung ulang rekomendasi
        $recommendations = $this->calculateRecommendations();

        return redirect()->route('games.index', compact('recommendations'))->with('success', 'Game berhasil diupdate!');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $sortBy = $request->input('sort_by', 'rating_rata_rata');
        $sortOrder = $request->input('sort_order', 'desc');

        if ($keyword) {
            $games = Game::where('judul', 'like', "%$keyword%")
                ->orWhere('platform', 'like', "%$keyword%")
                ->orWhere('genre', 'like', "%$keyword%")
                ->get();
        } else {
            $games = Game::all();
        }

        $games->each(function ($game) {
            $game->rating_rata_rata = $game->averageCriticScore();
        });

        // Sorting
        $games = $games->sortBy($sortBy, SORT_REGULAR, $sortOrder === 'desc');

        // Hitung ulang rekomendasi
        $recommendations = $this->calculateRecommendations();

        // Statistik
        $popularGenres = Game::select('genre', DB::raw('count(*) as total'))
            ->groupBy('genre')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $popularPlatforms = Game::select('platform', DB::raw('count(*) as total'))
            ->groupBy('platform')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('games.index', compact('games', 'recommendations', 'popularGenres', 'popularPlatforms'));
    }

    public function destroy(Game $game)
    {
        // Hapus gambar
        if ($game->gambar_cover) {
            Storage::delete('public/images/' . $game->gambar_cover);
        }

        $game->delete();

        // Hitung ulang rekomendasi
        $recommendations = $this->calculateRecommendations();

        return redirect()->route('games.index', compact('recommendations'))->with('success', 'Game berhasil dihapus!');
    }

    private function calculateRecommendations()
    {
        // 1. Game dengan rating tertinggi
        $highestRatedGames = Review::join('games', 'reviews.game_id', '=', 'games.id')
            ->select('games.judul', DB::raw('AVG(reviews.rating) as average_rating'))
            ->groupBy('games.id')
            ->orderByDesc('average_rating')
            ->get();

        $highestRatedGame = $highestRatedGames->isNotEmpty() ? $highestRatedGames->first() : null;

        // 2. Game terbaik (kombinasi rating dan jumlah review)
        $bestGames = Review::join('games', 'reviews.game_id', '=', 'games.id')
            ->select('games.judul', DB::raw('AVG(reviews.rating) as average_rating'), DB::raw('COUNT(reviews.id) as review_count'))
            ->groupBy('games.id')
            ->orderByDesc('average_rating')
            ->orderByDesc('review_count')
            ->get();

        $bestGame = $bestGames->isNotEmpty() ? $bestGames->first() : null;

        // Tangani game dengan rating dan jumlah review yang sama
        if ($highestRatedGame && $bestGame && $highestRatedGame->judul === $bestGame->judul) {
            // Jika game dengan rating tertinggi dan game terbaik sama, ambil game lain
            $otherGames = $bestGames->filter(function ($game) use ($highestRatedGame) {
                return $game->judul !== $highestRatedGame->judul;
            });

            if ($otherGames->isNotEmpty()) {
                $bestGame = $otherGames->first();
            }
            return [
                'highestRatedGame' => $highestRatedGame,
                'bestGame' => $bestGame,
            ];
        }

        return [];
    }
}