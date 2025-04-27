<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Session::get('uid');

        if (!$userId) {
            return redirect()->back()->with('error', 'Please login to request a product.');
        }

        DB::table('tbl_product_requests')->insert([
            'user_id' => $userId,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'requested_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Your product request has been submitted!');
    }
}   
