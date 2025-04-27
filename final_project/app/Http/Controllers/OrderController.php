<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function viewOrder($order_id)
    {
        if (!Session::has('uid')) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items.');
        }

        $userId = Session::get('uid');

        if (!$userId) {
            dd('Session User ID is missing!');
        }

        // Fetch order details
        $orderDetails = DB::table('tbl_orders')
            ->where('order_id', $order_id)
            ->where('user_id', $userId)
            ->first();

        if (!$orderDetails) {
            return redirect()->route('my_orders');
        }

        // Fetch user details
        $userDetails = DB::table('tbl_user')
            ->where('user_id', $userId)
            ->first();

        // Fetch order items with product details
        $orderItems = DB::table('tbl_order_items as oi')
            ->join('tbl_products as p', 'oi.product_id', '=', 'p.product_id')
            ->where('oi.order_id', $order_id)
            ->select('oi.*', 'p.product_name', 'p.description', 'p.price', 'p.image1')
            ->get();

        // Calculate subtotal and other charges
        $subtotal = $orderItems->sum(fn($item) => $item->price * $item->quantity);
        $shipping = 0.0;
        $discount = 0.0;
        $taxRate = 0.0;
        $tax = $subtotal * $taxRate;
        $grandTotal = $subtotal + $shipping - $discount + $tax;

        // Order status tracking
        $statusClasses = [
            'Pending' => 'pending',
            'Processing' => 'processing',
            'Shipped' => 'shipped',
            'Out for Delivery' => 'out-for-delivery',
            'Delivered' => 'delivered',
            'Cancelled' => 'cancelled'
        ];

        $progressPercentages = [
            'Pending' => 0,
            'Processing' => 25,
            'Shipped' => 50,
            'Out for Delivery' => 75,
            'Delivered' => 100,
            'Cancelled' => 0
        ];

        $status = $orderDetails->order_status;
        $statusClass = $statusClasses[$status] ?? 'pending';
        $progressPercentage = $progressPercentages[$status] ?? 0;

        // Format order date and delivery date
        $orderDate = date('F j, Y', strtotime($orderDetails->order_date));
        $deliveryDate = date('F j, Y', strtotime($orderDetails->order_date . ' +7 days'));

        // Generate Order Number
        $orderNumber = 'QK' . str_pad($order_id, 6, '0', STR_PAD_LEFT);

        return view('vieworder', compact(
            'orderDetails',
            'userDetails',
            'orderItems',
            'subtotal',
            'shipping',
            'discount',
            'tax',
            'grandTotal',
            'status',
            'statusClass',
            'progressPercentage',
            'orderDate',
            'deliveryDate',
            'orderNumber'
        ));
    }
    public function myOrders()
    {
        if (!Session::has('uid')) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }

        $userId = Session::get('uid');

        $orders = DB::table('tbl_orders')
            ->where('user_id', $userId)
            ->orderBy('order_date', 'asc')
            ->get();

        return view('myorders', compact('orders'));
    }
}
