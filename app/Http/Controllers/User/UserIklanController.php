<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class UserIklanController extends Controller
{
    public function index()
    {
        // Ambil semua iklan milik pengguna yang sedang login
        $iklans = Iklan::where('user_id', Auth::id())->with('game')->get();

        return view('user.iklans.index', compact('iklans'));
    }

    public function create()
    {
        // Ambil semua game untuk ditampilkan di form
        $games = Game::all();

        return view('user.iklans.create', compact('games'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'durasi' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Simpan iklan baru dengan user_id dari pengguna yang sedang login
        Iklan::create([
            'user_id' => Auth::id(),
            'game_id' => $request->game_id,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        return redirect()->route('iklans.index')->with('success', 'Iklan berhasil ditambahkan!');
    }

    public function show(Iklan $iklan)
    {
        // Pastikan iklan milik pengguna yang sedang login
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('user.iklans.show', compact('iklan'));
    }

    public function edit(Iklan $iklan)
    {
        // Pastikan iklan milik pengguna yang sedang login
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Ambil semua game untuk ditampilkan di form
        $games = Game::all();

        return view('user.iklans.edit', compact('iklan', 'games'));
    }

    public function update(Request $request, Iklan $iklan)
    {
        // Pastikan iklan milik pengguna yang sedang login
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'durasi' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Update iklan
        $iklan->update([
            'game_id' => $request->game_id,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        return redirect()->route('iklans.index')->with('success', 'Iklan berhasil diperbarui!');
    }

    public function destroy(Iklan $iklan)
    {
        // Pastikan iklan milik pengguna yang sedang login
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus iklan
        $iklan->delete();

        return redirect()->route('iklans.index')->with('success', 'Iklan berhasil dihapus!');
    }
}