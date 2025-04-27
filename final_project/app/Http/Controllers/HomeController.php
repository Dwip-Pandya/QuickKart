<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Review;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        // Top of the Month (Highest rated product)
        $topProduct = ProductDetails::with('reviews')
            ->get()
            ->sortByDesc(function ($product) {
                return $product->reviews->avg('product_rating') ?? 0;
            })
            ->first();

        // Highlighted Products (3 random IDs between 1-296)
        $randomIDs = [];
        while (count($randomIDs) < 3) {
            $rand = rand(1, 296);
            if (!in_array($rand, $randomIDs)) {
                $randomIDs[] = $rand;
            }
        }

        $highlightedProducts = ProductDetails::whereIn('product_id', $randomIDs)->get();

        return view('welcome', [
            'topProduct' => $topProduct,
            'highlightedProducts' => $highlightedProducts,
        ]);
    }
}
