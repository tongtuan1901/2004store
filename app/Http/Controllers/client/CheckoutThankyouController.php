<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Models\AdminOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutThankyouController extends Controller
{
    /**
     * Display the thank you page after successful order.
     */
    public function index(Request $request)
    {
        // Lấy ID đơn hàng từ query string
        $orderId = $request->query('order_id');

        // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng
        $order = AdminOrder::with(['orderItems.product', 'orderItems.variation.size', 'orderItems.variation.color', 'orderItems.variation.image'])
            ->findOrFail($orderId);
        $user = User::findOrFail($order->user_id);

        // Phí vận chuyển và tổng cộng
        $shippingFee = 40000;
        $finalTotal = $order->total;

        return view('Client.ClientCheckout.Checkoutthankyou', compact('order', 'shippingFee', 'finalTotal', 'user'));
    }
}
