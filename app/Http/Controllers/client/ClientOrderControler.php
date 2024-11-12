<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\User;
use Illuminate\Http\Request;

class ClientOrderControler extends Controller
{
    public function listOrder($userId)
    {
        $userOrder = User::where('id', $userId) // Lọc theo $userId
            ->with([
                'orders' => function ($query) {
                    $query->where('status', '!=', 'Hủy'); // Lọc các đơn hàng không bị hủy
                },
                'addresses',
                'orders.orderItems.variation.size',
                'orders.orderItems.variation.color'
            ])
            ->first(); // Lấy dữ liệu của người dùng cụ thể
        
        return view('Client.ClientOrders.index', compact('userOrder'));
    }
    public function cancel($id)
    {
        $order = AdminOrder::findOrFail($id);
    
        // Kiểm tra nếu phương thức thanh toán là ví
        if ($order->payment_method == 'wallet') {
            $user = User::findOrFail($order->user_id);
            $user->balance += $order->total; // Hoàn tiền vào ví
            $user->save();
        }
    
        $order->status = 'Hủy';
        $order->save();
    
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công và số tiền đã được hoàn vào ví.');
    }
    
    public function show($id)
    {
        $order = AdminOrder::with([
            'orderItems.variation.size',
            'orderItems.variation.color',
            'user',
            'address'
        ])->findOrFail($id);

        return view('Client.ClientOrders.show', compact('order'));
    }
    public function canceledOrders($id)
    {
        // Lấy tất cả các đơn hàng có trạng thái "Hủy"
        $order = AdminOrder::findOrFail($id);
        $canceledOrders = AdminOrder::where('status', 'Hủy')
                                ->with('orderItems.product', 'orderItems.variation') // Eager load các liên kết cần thiết
                                ->get();
    
        // Truyền dữ liệu vào view
        return view('Admin.orders.listDonHangHuy', compact('canceledOrders'));
    }


}
