<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_date' => 'required|date',
            'title' => 'required|string|max:255',
            'source' => 'required|string|max:255',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswas.index')
                         ->with('success', 'Siswa created successfully.');
    }
}