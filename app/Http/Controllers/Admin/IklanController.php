<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Tambahkan ini
use Illuminate\Http\Request;
use App\Models\Iklan;
use App\Models\Game;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class IklanController extends Controller
{
    public function index(): View
    {
        $iklans = Iklan::with('game')->get();
        return view('admin.iklans.index', compact('iklans'));
    }

    public function create(): View
    {
        $games = Game::all();
        return view('iklans.create', compact('games'));
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
        'game_id' => 'required|exists:games,id',
        'durasi' => 'required|integer',
        'harga' => 'required|integer',
        'status' => 'required|in:aktif,nonaktif',
    ]);

    Iklan::create($request->all());

    return redirect()->route('iklans.index')->with('success', 'Iklan berhasil ditambahkan!');
}

    public function show(Iklan $iklan): View
    {
        return view('iklans.show', compact('iklan'));
    }

    public function edit(Iklan $iklan): View
    {
        $games = Game::all();
        return view('iklans.edit', compact('iklan', 'games'));
    }

    public function update(Request $request, Iklan $iklan): RedirectResponse
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'durasi' => 'required|integer',
            'harga' => 'required|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $iklan->update($request->all());

        return redirect()->route('iklans.index')->with('success', 'Iklan berhasil diupdate!');
    }

    public function destroy(Iklan $iklan): RedirectResponse
    {
        $iklan->delete();

        return redirect()->route('iklans.index')->with('success', 'Iklan berhasil dihapus!');
    }
}