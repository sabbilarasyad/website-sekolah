<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Menampilkan daftar review & rating rata-rata
    public function index()
    {
        $reviews = Review::with('user')->latest()->get();
        $averageRating = Review::avg('rating');

        return view('reviews.index', compact('reviews', 'averageRating'));
    }

    // Menyimpan rating & review
    public function store(StoreReviewRequest $request)
    {
        Review::updateOrCreate(
            ['user_id' => Auth::id()], // Mencegah duplicate review jika dibatasi 1 review per user
            [
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );

        return redirect()->route('reviews.index')
            ->with('success', 'Terima kasih atas ulasan dan rating yang Anda berikan.');
    }
}