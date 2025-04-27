<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Review;
use App\Models\User;


class ProductDetailsController extends Controller
{
    public function show($productId)
    {
        $product = ProductDetails::where('product_id', $productId)->first();

        if (!$product) {
            abort(404, 'Product not found');
        }

        $reviews = Review::where('product_id', $productId)->get();

        $averageRating = round($reviews->avg('product_rating'), 1) ?? 0;
        $reviewsCount = $reviews->count();

        // ✅ Fetch the top review with user
        $topReview = Review::with('user')
            ->where('product_id', $productId)
            ->orderByDesc('product_rating')
            ->orderByDesc('created_at')
            ->first();

        return view('single', compact('product', 'averageRating', 'reviewsCount', 'topReview'));
    }
}
