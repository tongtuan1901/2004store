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
        $userOrder =  User::with('orders','addresses')->get();
        return view('Client.ClientOrders.index',compact('userOrder'));
    }
    public function cancelOrder($id)
    {
        $order = AdminOrder::findOrFail($id);
        $order->status = 'Đã Hủy'; 
        $order->save();
        return back();
    }
}
