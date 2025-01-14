<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() : View
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create() : View
    {
        return view('reviews.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        Review::create([
            // 'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('products.show', $request->product_id)->with('success', 'Data berhasil disimpan');
    }
}
