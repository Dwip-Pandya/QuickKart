<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRequestController extends Controller
{
    public function index()
    {
        // Fetch all product requests from the database
        $productRequests = DB::table('tbl_product_requests')->get();

        // Return the view with product requests data
        return view('admin.request.index', compact('productRequests'));
    }
}
