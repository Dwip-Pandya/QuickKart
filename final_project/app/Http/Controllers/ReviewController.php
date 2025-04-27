<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ProductDetails;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'review_title' => 'required|string',
            'review_text' => 'required|string',
            'product_rating' => 'required|numeric|min:0|max:5',
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'review_title' => $request->review_title,
            'review_text' => $request->review_text,
            'product_rating' => $request->product_rating,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
    public function myReviews()
    {
        $userId = session('uid');

        $reviews = Review::where('user_id', $userId)
            ->with('product')
            ->orderByDesc('created_at')
            ->get();

        return view('myreviews', compact('reviews'));
    }
    public function productReviews($product_id)
    {
        $product = ProductDetails::with('reviews.user')->findOrFail($product_id);

        return view('reviews', compact('product'));
    }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
