<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Models\AdminOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutThankyouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
<<<<<<< HEAD
{
    // Lấy ID đơn hàng từ query string
    $orderId = $request->query('order_id');
    
    // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng
    $order = AdminOrder::with(['orderItems.product', 'orderItems.variation.size', 'orderItems.variation.color', 'orderItems.variation.image'])
                        ->findOrFail($orderId);

    $user = User::findOrFail($order->user_id);

    // Tính toán lại phí vận chuyển và tổng cộng
    $shippingFee = 40000; // Phí vận chuyển cố định
    $finalTotal = $order->total; // Tổng đơn hàng đã có

    // Nếu có mã giảm giá, tính lại tổng
    $discountValue = $order->discount_value ?? 0; // Lấy giá trị giảm giá từ đơn hàng, nếu có
    $finalTotal = max(0, $finalTotal - $discountValue) + $shippingFee;

    return view('Client.ClientCheckout.Checkoutthankyou', compact('order', 'shippingFee', 'finalTotal', 'user'));
}
=======
    {
        // Lấy ID đơn hàng từ query string
        $orderId = $request->query('order_id');
        
        // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng
        $order = AdminOrder::with(['orderItems.product', 'orderItems.variation.size', 'orderItems.variation.color', 'orderItems.variation.image'])
                            ->findOrFail($orderId);
        $user = User::findOrFail($order->user_id);
        
        // Tính toán lại phí vận chuyển và tổng cộng
        $shippingFee = 40000;
        $finalTotal = $order->total + $shippingFee;
        
        // Lấy số dư ví của người dùng
        $walletBalance = $user->balance;
    
        // Tính toán số tiền còn lại sau khi trừ đi số tiền từ ví và tiền ship
        $amountPaidByWallet = 0;
        if ($order->payment_method == 'wallet') {
            $amountPaidByWallet = $finalTotal;
            $finalTotal = 0; // Tổng cộng sẽ là 0 nếu thanh toán toàn bộ bằng ví
        }
    
        return view('Client.ClientCheckout.Checkoutthankyou', compact('order', 'shippingFee', 'finalTotal', 'user', 'walletBalance', 'amountPaidByWallet'));
    }
    
>>>>>>> 6c25769062e94fbc1fda2211c6476ae1dbe54452

}
