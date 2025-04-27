<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = DB::table('reviews')
            ->join('tbl_products', 'reviews.product_id', '=', 'tbl_products.product_id')
            ->join('tbl_user', 'reviews.user_id', '=', 'tbl_user.user_id')
            ->select(
                'reviews.*',
                'tbl_products.product_name',
                'tbl_user.user_name'
            )
            ->paginate(10); // <-- Add pagination here

        return view('admin.review.index', compact('reviews'));
    }
}
