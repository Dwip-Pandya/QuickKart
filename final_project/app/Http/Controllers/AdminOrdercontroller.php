<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('tbl_orders')->get();
        return view('admin.order.index', compact('orders'));
    }
}
