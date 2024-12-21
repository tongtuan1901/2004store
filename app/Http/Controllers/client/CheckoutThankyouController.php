<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Models\AdminOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutThankyouController extends Controller
{
    public function index(Request $request)
    {
        // Get order ID from query string
        $orderId = $request->query('order_id');

        // Query the database for order information
        $order = AdminOrder::with(['orderItems.product', 'orderItems.variation.size', 'orderItems.variation.color', 'orderItems.variation.image'])
            ->findOrFail($orderId);
        $user = User::findOrFail($order->user_id);

        // Set shipping fee
        $shippingFee = 40000;

        // Calculate final total
        $finalTotal = $order->total;

        // Apply discount if exists
        $discountValue = $order->discount_value ?? 0;
        $finalTotal = max(0, $order->total - $order->discount_value);

        // Get user's wallet balance
        $walletBalance = $user->balance;

        // Initialize amount paid variables
        $amountPaidByWallet = 0;
        $amountPaidByOnline = 0;

        // Handle different payment methods
        switch ($order->payment_method) {
            case 'wallet':
                $amountPaidByWallet = $finalTotal;
                // $finalTotal = 0; // Set to 0 if paid by wallet
                break;

            case 'momo':
            case 'vnpay':
                $amountPaidByOnline = $finalTotal;
                // $finalTotal = 0; // Set to 0 if paid by MOMO or VNPAY
                break;

            default:
                // For other payment methods (e.g., COD), keep the finalTotal as is
                break;
        }

        return view('Client.ClientCheckout.Checkoutthankyou', compact(
            'order',
            'shippingFee',
            'finalTotal',
            'user',
            'walletBalance',
            'amountPaidByWallet',
            'amountPaidByOnline'
        ));
    }
}