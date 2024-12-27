<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Models\Discount;
use App\Models\AdminOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientOrderControler extends Controller
{
    public function listOrder($userId)
    {
        $userOrder = User::where('id', $userId) 
            ->with([
                'orders' => function ($query) {
                    $query->where('status', '!=', 'Hủy')
                    ->orderBy('created_at', 'desc'); 
                },
                'addresses',
                'orders.orderItems.variation.size',
                'orders.orderItems.variation.color'
            ])
            ->first();
        
        return view('Client.ClientOrders.index', compact('userOrder'));
    }
    public function cancel($id,Request $request)
    {
        $order = AdminOrder::findOrFail($id);
        
        if ($order->status != 'Chờ xử lý') {
            return back()->withErrors('Đơn hàng không thể hủy vì đã chuyển sang trạng thái khác.');
        }
        
        if (in_array($order->payment_method, ['wallet', 'vnpay', 'momo'])) {
            $user = User::findOrFail($order->user_id);
            $refundAmount = $order->total;
          
            $user->balance += $refundAmount;
            $user->save();
        }
         // Hoàn lại số lượng biến thể của sản phẩm
    foreach ($order->orderItems as $item) {
        $variation = $item->variation;
        if ($variation) {
            $variation->quantity += $item->quantity; // Cộng lại số lượng đã đặt vào biến thể
            $variation->save();
        }
    }
      // Hoàn lại lượt sử dụng mã giảm giá
      if ($order->discount_code) {
        $discount = Discount::where('code', $order->discount_code)->first();
        if ($discount) {
            $discount->decrement('usage_count'); // Giảm số lượt sử dụng của mã giảm giá
            // Nếu mã giảm giá còn lượt sử dụng, có thể làm thêm xử lý
        }
    }
    
        $order->status = 'Hủy';
        $order->cancellation_reason = $request->cancellation_reason;
        $order->save();
    
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công và số tiền đã được hoàn vào ví.');

    }
    
    public function cancelOrder(Request $request, $orderId)
    {
        $order = AdminOrder::findOrFail($orderId);
    
        // Kiểm tra trạng thái đơn hàng
        if ($order->status != 'Chờ xử lý') {
            return back()->withErrors('Đơn hàng không thể hủy vì đã chuyển sang trạng thái khác.');
        }
    
        // Xử lý hủy đơn hàng
        $order->update([
            'status' => 'Đã hủy',
            'cancellation_reason' => $request->cancellation_reason,
        ]);
    
        return back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }
    public function confirmOrder(Request $request, $orderId){
        $order = AdminOrder::findOrFail($orderId);
    
        $order->update([
            'status' => 'Hoàn thành',
            'completed_time' => now(),
        ]);
    
        return back()->with('success', 'Xác nhận thành công.');
    }
    

    
    public function show($userId, $orderId) {
        // Set shipping fee constant
        $shippingFee = 40000;
    
        // Find the user with related order data
        $userOrder = User::with([
            'orders' => function ($query) use ($orderId) {
                $query->where('id', $orderId);
            },
            'orders.orderItems' => function ($query) {
                $query->with([
                    'product',
                    'variation.size',
                    'variation.color',
                    'variation.image'
                ]);
            }
        ])->findOrFail($userId);
    
        // Get the specific order
        $order = $userOrder->orders->first();
        
        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }
    
        // Update order status timestamps if needed
        $order->updateStatusTimes();
        $order->save();
    
        // Calculate totals from order items
        $subtotal = $order->orderItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
    
        $finalTotal = ($subtotal + $shippingFee) - ($order->discount_value ?? 0);
    
        // Pass data to view
        return view('Client.ClientOrders.show', compact(
            'userOrder',
            'order',
            'shippingFee',
            'subtotal',
            'finalTotal'
        ));
    }
public function listHuy($userId)
    {
        $userOrder = User::where('id', $userId) // Lọc theo $userId
            ->with([
                'orders'=> function ($query) {
                    $query->where('status', '=', 'Hủy'); // Lọc các đơn hàng không bị hủy
                },
                'addresses',
                'orders.orderItems.variation.size',
                'orders.orderItems.variation.color'
            ])
            ->first(); // Lấy dữ liệu của người dùng cụ thể
        
        return view('Client.ClientOrders.listHuy', compact('userOrder'));
    }
    
}
