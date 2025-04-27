<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    // Display the cart
    public function index()
    {
        if (!Session::has('uid')) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items.');
        }

        $userId = Session::get('uid');

        if (!$userId) {
            dd('Session User ID is missing!');
        }

        // Fetch cart items with product details
        $cartItems = DB::table('tbl_cart')
            ->join('tbl_products', 'tbl_cart.product_id', '=', 'tbl_products.product_id')
            ->where('tbl_cart.user_id', $userId)
            ->select(
                'tbl_cart.*',
                'tbl_products.product_name',
                'tbl_products.price',
                'tbl_products.image1',
                DB::raw('tbl_cart.quantity * tbl_products.price as item_total')
            )
            ->get();

        // Calculate order summary
        $subtotal = $cartItems->sum('item_total');
        $shipping = 0; // Flat shipping fee (adjust if needed)
        $discount = 0; // Apply discount logic if necessary
        $grandTotal = max(0, $subtotal + $shipping - $discount);

        return view('cart', compact('cartItems', 'subtotal', 'shipping', 'discount', 'grandTotal'));
    }

    // Add product to cart
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product->category_id) {
            dd('Category ID is missing', $product);
        }
        if (!Session::has('uid')) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to cart.');
        }

        $request->validate([
            'product_id' => 'required|integer|exists:tbl_products,product_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Session::get('uid');
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Check if product is already in the cart
        $cartItem = DB::table('tbl_cart')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // Update quantity
            DB::table('tbl_cart')
                ->where('cart_id', $cartItem->cart_id)
                ->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            // Insert new item
            DB::table('tbl_cart')->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('cart.index', ['category_id' => $product->category_id ?? 1]);
    }

    // Update cart item quantity
    public function updateCart(Request $request, $cartId)
    {
        if (!Session::has('uid')) {
            return redirect()->route('login')->with('error', 'You must be logged in to update your cart.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Session::get('uid');
        $quantity = $request->quantity;

        DB::table('tbl_cart')
            ->where('cart_id', $cartId)
            ->where('user_id', $userId)
            ->update(['quantity' => $quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    // Remove item from cart
    public function removeFromCart($cartId)
    {
        if (!Session::has('uid')) {
            return redirect()->route('login')->with('error', 'You must be logged in to remove items.');
        }

        $userId = Session::get('uid');

        DB::table('tbl_cart')
            ->where('cart_id', $cartId)
            ->where('user_id', $userId)
            ->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
    }
}
