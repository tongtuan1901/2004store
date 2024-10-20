<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\AdminCoupons;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Http\Controllers\Controller;

class AdminCouponsController extends Controller
{
    public function index()
    {
        $coupons = AdminCoupons::with(['category', 'product'])->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.coupons.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50',
            'type' => 'required|string|in:fixed,percentage',
            'value' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'product_id' => 'nullable|exists:products,id',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:starts_at',
        ]);

        AdminCoupons::create($request->all());
        return redirect()->route('admin-coupons.index')->with('success', 'Mã giảm giá đã được tạo thành công!');
    }

    public function edit(AdminCoupons $admin_coupon)
    {
        $categories = Category::all();
        $products = AdminProducts::where('category_id', $admin_coupon->category_id)->get();
        return view('admin.coupons.edit', compact('admin_coupon', 'categories', 'products'));
    }

    public function update(Request $request, AdminCoupons $admin_coupon)
    {
        $request->validate([
            'code' => 'required|string|max:50',
            'type' => 'required|string|in:fixed,percentage',
            'value' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'product_id' => 'nullable|exists:products,id',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:starts_at',
        ]);

        $admin_coupon->update($request->all());

        return redirect()->route('admin-coupons.index')->with('success', 'Mã giảm giá đã được cập nhật thành công!');
    }

    public function destroy(AdminCoupons $admin_coupon)
    {
        // Xóa mềm
        $admin_coupon->delete();
        return redirect()->route('admin-coupons.index')->with('success', 'Mã giảm giá đã được xóa thành công!');
    }

    public function getProductsByCategory($categoryId)
    {
        $products = AdminProducts::where('category_id', $categoryId)->get();
        return response()->json($products);
    }
}


