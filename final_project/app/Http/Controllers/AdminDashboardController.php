<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard', [
            'totalProducts' => DB::table('tbl_products')->count(),
            'totalCategories' => DB::table('tbl_category')->count(),
            'totalSubcategories' => DB::table('tbl_subcategory')->count(),
            'totalOrders' => DB::table('tbl_orders')->count(),
            'totalUsers' => DB::table('tbl_user')->count(),
            'totalRequests' => DB::table('tbl_product_requests')->count(),
            'totalReviews' => DB::table('reviews')->count(),
        ]);
    }
}
