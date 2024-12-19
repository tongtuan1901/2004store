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
        if (in_array($order->payment_method, ['wallet', 'vnpay','momo'])) {
            $user = User::findOrFail($order->user_id);
            $user->balance += $order->total; // Hoàn tiền vào ví
            $user->save();
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
    

    
    public function show($userId, $orderId)
{
    $shippingFee = 40000;

    // Lấy thông tin người dùng và đơn hàng
    $userOrder = User::findOrFail($userId);
    $userOrder->load([
        'orders' => function ($query) use ($orderId) {
            $query->where('id', $orderId)->where('status', '!=', '');
        },
        'addresses',
        'orders.orderItems.variation.size',
        'orders.orderItems.variation.color',
    ]);


    $order = $userOrder->orders->first();
    $order->updateStatusTimes();
    $order->save();

    // Truyền thông tin bước hiện tại và dữ liệu khác sang view
    return view('Client.ClientOrders.show', compact('userOrder', 'shippingFee', 'order'));
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
