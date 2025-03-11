<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Review;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Mengelola pengguna
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Mengelola game
    public function games()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function createGame()
    {
        return view('admin.games.create');
    }

    public function storeGame(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Game::create($request->all());

        return redirect()->route('admin.games')->with('success', 'Game created successfully.');
    }

    public function editGame(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function updateGame(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $game->update($request->all());

        return redirect()->route('admin.games')->with('success', 'Game updated successfully.');
    }

    public function destroyGame(Game $game)
    {
        $game->delete();
        return redirect()->route('admin.games')->with('success', 'Game deleted successfully.');
    }

    // Mengelola review
    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroyReview(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews')->with('success', 'Review deleted successfully.');
    }
}