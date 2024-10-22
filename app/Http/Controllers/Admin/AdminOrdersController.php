<?php

namespace App\Http\Controllers\Admin;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\AdminProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOrdersController extends Controller
{

    public function index()
    {
        $orders = AdminOrder::all();
        return view('Admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $products = AdminProducts::all();
        return view('admin.orders.create', compact('products'));
    }

    public function generatePDF($id)
    {
        $order = AdminOrder::with('products')->findOrFail($id);
        $pdf = PDF::loadView('admin.orders.pdf', compact('order'));
        return $pdf->download('order_' . $order->id . '.pdf');
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'status' => 'required|string|max:50',
        'products' => 'required|array',
        'products.*' => 'exists:products,id',
        'quantities' => 'required|array',
        'quantities.*' => 'integer|min:1',
    ]);

    $order = AdminOrder::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'total' => 0,
        'status' => $validated['status'],
    ]);


    $total = 0;
    foreach ($validated['products'] as $index => $productId) {
        $product = AdminProducts::find($productId);
        $quantity = $validated['quantities'][$index];
        $order->products()->attach($productId, ['quantity' => $quantity]);
        $total += $product->price * $quantity;
    }
    $order->update(['total' => $total]);

    return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được tạo thành công!');
}


    public function show($id)
    {
        $order = AdminOrder::with('products')->findOrFail($id);
        foreach ($order->products as $product) {
            echo Storage::url($product->image_path);
        }
        return view('admin.orders.show', compact('order'));
    }




    public function edit($id)
{
    $order = AdminOrder::with('products')->findOrFail($id);
    $products = AdminProducts::all();
    return view('admin.orders.edit', compact('order', 'products'));
}

public function update(Request $request, $id)
{
    // Fetch the order first
    $order = AdminOrder::findOrFail($id);

    if ($request->has('status')) {
        $validated = $request->validate([
            'status' => 'required|string|max:50',
        ]);
        $order->update(['status' => $validated['status']]);
        return redirect()->route('admin-orders.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật!');
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'total' => 'required|numeric',
        'status' => 'required|string|max:50',
        'products' => 'required|array',
        'products.*' => 'exists:products,id',
        'quantities' => 'required|array',
        'quantities.*' => 'integer|min:1',
    ]);

    $order->update($validated);
    $order->products()->detach();
    foreach ($validated['products'] as $index => $productId) {
        $order->products()->attach($productId, ['quantity' => $validated['quantities'][$index]]);
    }
    return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
}
<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
}
