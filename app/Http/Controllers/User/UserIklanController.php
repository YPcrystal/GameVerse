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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('iklans', 'public');
        $harga = $validated['durasi'] * 10000; // contoh harga per hari
        $status = 'pending';

        $iklan = Iklan::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'durasi' => $validated['durasi'],
            'image' => $imagePath,
            'harga' => $harga,
            'status' => $status,
        ]);

        return redirect()->route('user.iklans.payment', $iklan->id);
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
    if ($iklan->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }
    return view('user.iklans.edit', compact('iklan'));
}

    public function update(Request $request, Iklan $iklan)
    {
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input user
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hitung ulang harga berdasarkan durasi
        $harga = $validated['durasi'] * 10000;

        // Update data
        $iklan->judul = $validated['judul'];
        $iklan->deskripsi = $validated['deskripsi'];
        $iklan->durasi = $validated['durasi'];
        $iklan->harga = $harga;

        // Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('iklans', 'public');
            $iklan->image = $imagePath;
        }

        // Status tetap, tidak diubah user (kecuali ingin reset ke pending)
        // $iklan->status = $iklan->status;

        $iklan->save();

        return redirect()->route('user.iklans.index')->with('success', 'Iklan berhasil diperbarui!');
    }

    public function destroy(Iklan $iklan)
    {
        // Pastikan iklan milik pengguna yang sedang login
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus iklan
        $iklan->delete();

        return redirect()->route('user.iklans.index')->with('success', 'Iklan berhasil dihapus!');
    }
    public function payment(Iklan $iklan)
    {
        // Pastikan iklan milik pengguna yang sedang login
        if ($iklan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('user.iklans.payment', compact('iklan'));
    }

}