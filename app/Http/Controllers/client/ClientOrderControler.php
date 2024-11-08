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
        $userOrder = User::with([
            'orders' => function ($query) {
                $query->where('status', '!=', 'Hủy');
            },
            'addresses',
            'orders.orderItems.variation.size',
            'orders.orderItems.variation.color'
        ])->get();
    
        return view('Client.ClientOrders.index',compact('userOrder'));
    }
    public function cancel($id)
{
    $order = AdminOrder::findOrFail($id);
    $order->status = 'Hủy';
    $order->save();

    return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
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


}
