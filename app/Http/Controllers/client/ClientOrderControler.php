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
    public function cancel($id,Request $request)
    {
        $order = AdminOrder::findOrFail($id);
        if ($order->payment_method == 'wallet') {
            $user = User::findOrFail($order->user_id);
            $user->balance += $order->total; // Hoàn tiền vào ví
            $user->save();
        }
    
        $order->status = 'Hủy';
        $order->cancellation_reason = $request->cancellation_reason;
        $order->save();
    
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công và số tiền đã được hoàn vào ví.');

    }
    
    public function canceledOrders($id)
    {
        $order = AdminOrder::findOrFail($id);
        $canceledOrders = AdminOrder::where('status', 'Hủy')
                                ->with('orderItems.product', 'orderItems.variation') // Eager load các liên kết cần thiết
                                ->get();
    
        // Truyền dữ liệu vào view
        return view('Admin.orders.listDonHangHuy', compact('canceledOrders'));
    }
    
    public function show($userId, $orderId)
{
    $shippingFee = 40000;

    // Lấy thông tin người dùng và đơn hàng
    $userOrder = User::findOrFail($userId);
    $userOrder->load([
        'orders' => function ($query) use ($orderId) {
            $query->where('id', $orderId)->where('status', '!=', 'Hủy');
        },
        'addresses',
        'orders.orderItems.variation.size',
        'orders.orderItems.variation.color',
    ]);


    // Kiểm tra null cho $userOrder và đơn hàng
    if (!$userOrder || $userOrder->orders->isEmpty()) {
        return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
    }

    // Lấy đơn hàng cụ thể
    $order = $userOrder->orders->first();
    $order->updateStatusTimes();
    $order->save();

    // Truyền thông tin bước hiện tại và dữ liệu khác sang view
    return view('Client.ClientOrders.show', compact('userOrder', 'shippingFee', 'order'));
}

    
}
