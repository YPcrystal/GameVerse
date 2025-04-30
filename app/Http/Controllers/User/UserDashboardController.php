<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Hitung total review dan iklan
        $totalReviews = $user->reviews()->count();
        $totalAds = $user->iklans()->count();

        // Ambil aktivitas terbaru
        // $recentActivities = $user->activities()->latest()->take(5)->get();

        return view('user.dashboard', compact('totalReviews', 'totalAds'));
    }
}