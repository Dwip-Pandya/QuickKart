<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RazorpayPaymentController extends Controller
{
    public function showRazorpayForm($order_id)
    {
        $order = DB::table('tbl_orders')->where('order_id', "=", $order_id)->first();

        if (!$order) {
            abort(404, 'Order not found.');
        }

        $amount = $order->total_amount;
        return view('payment', compact('order_id', 'amount'));
    }

    public function createOrder(Request $request)
    {
        try {
            // Hard-code the API keys for testing
            $api = new Api('rzp_test_cF1Zbsgks1AQbM', '454ad4f5af4adfda4da6');

            // Convert amount to integer paise
            $amountInPaise = (int)($request->amount * 100);

            $orderData = [
                'receipt'         => 'rcpt_' . time(), // Simplified receipt
                'amount'          => $amountInPaise,
                'currency'        => 'INR',
                'payment_capture' => 1
            ];

            $razorpayOrder = $api->order->create($orderData);

            return response()->json([
                'id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
                'order_ref' => $request->order_id
            ]);
        } catch (\Exception $e) {
            Log::error('Razorpay Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verify(Request $request)
    {
        try {
            $api = new Api('rzp_test_cF1Zbsgks1AQbM', '454ad4f5af4adfda4da6');

            $attributes = [
                'razorpay_order_id' => $request->order_id,
                'razorpay_payment_id' => $request->payment_id,
                'razorpay_signature' => $request->signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Update order status
            DB::table('tbl_orders')
                ->where('order_id', $request->order_ref)
                ->update(['payment_status' => 'Paid']);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Verification Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
