<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = Session::get('uid');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'You must be logged in to access checkout.');
        }

        // Fetch Cart Items with Product Details
        $cartItems = DB::table('tbl_cart')
            ->join('tbl_products', 'tbl_cart.product_id', '=', 'tbl_products.product_id')
            ->select('tbl_cart.*', 'tbl_products.product_name', 'tbl_products.price')
            ->where('tbl_cart.user_id', $userId)
            ->get();

        // If Cart is Empty, Redirect Back
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate Grand Total
        $grandTotal = 0;
        foreach ($cartItems as $cartItem) {
            $grandTotal += $cartItem->price * $cartItem->quantity;
        }

        return view('checkout', compact('cartItems', 'grandTotal'));
    }


    public function placeOrder(Request $request)
    {


        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string|max:10',
            'payment_method' => 'required|string',
        ]);

        $userId = Session::get('uid');
        if (!$userId) {
            return redirect()->back()->with('error', 'You must be logged in to place an order.');
        }

        $cartItems = DB::table('tbl_cart')
            ->join('tbl_products', 'tbl_cart.product_id', '=', 'tbl_products.product_id')
            ->select('tbl_cart.*', 'tbl_products.product_name', 'tbl_products.price')
            ->where('tbl_cart.user_id', $userId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $grandTotal = 0;
        foreach ($cartItems as $cartItem) {
            $grandTotal += $cartItem->price * $cartItem->quantity;
        }

        $paymentMethod = $request->payment_method === 'cod' ? 'Cash on Delivery' : 'online';

        $order_id = DB::table('tbl_orders')->insertGetId([
            'user_id' => $userId,
            'total_amount' => $grandTotal,
            'shipping_address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'payment_method' => $paymentMethod,
            'order_status' => 'pending',
            'order_date' => now(),
        ]);


        foreach ($cartItems as $cartItem) {
            DB::table('tbl_order_items')->insert([
                'order_id' => $order_id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
            ]);
        }

        DB::table('tbl_cart')->where('user_id', $userId)->delete();

        if ($request->payment_method === 'cod') {
            return redirect()->route('checkout.thankyou', ['order_id' => $order_id])->with('success', 'Order placed successfully!');
        } else {
            return redirect()->route('razorpay.payment', ['order_id' => $order_id]);
        }
    }

    public function thankYou(Request $request)
    {
        $order_id = $request->query('order_id');

        if (!$order_id) {
            return redirect()->route('home')->with('error', 'Invalid access to thank you page.');
        }

        $order = DB::table('tbl_orders')->where('order_id', $order_id)->first();

        return view('thankyou', compact('order'));
    }


    public function paymentPage($order_id)
    {
        return view('payment', ['order_id' => $order_id]);
    }
}
