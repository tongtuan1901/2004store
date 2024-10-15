<?php

namespace App\Http\Controllers;

use App\Models\AdminOrder; 
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    
    public function index()
    {
        $orders = AdminOrder::all(); 
        return view('Admin.orders.index', compact('orders'));
    }

    
    public function create()
    {
        return view('Admin.orders.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        AdminOrder::create($request->all());
        return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được tạo.');
    }

   
    public function edit(AdminOrder $adminOrder)
    {
        return view('Admin.orders.edit', compact('adminOrder'));
    }

    
    public function update(Request $request, AdminOrder $adminOrder)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $adminOrder->update($request->all());
        return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được cập nhật.');
    }

    
    public function destroy(AdminOrder $adminOrder)
    {
        $adminOrder->delete();
        return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được xóa.');
    }
}
