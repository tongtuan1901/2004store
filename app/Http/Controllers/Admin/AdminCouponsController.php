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
        // Lấy tất cả mã giảm giá cùng với thông tin danh mục và sản phẩm liên quan
        $coupons = AdminCoupons::with(['category', 'product'])->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create(Request $request)
    {
        // Lấy tất cả các danh mục
        $categories = Category::all();
        $products = [];
    
        // Kiểm tra nếu có category_id được chọn thì lấy danh sách sản phẩm theo danh mục
        if ($request->has('category_id')) {
            $products = AdminProducts::where('category_id', $request->category_id)->get();
        }
    
        return view('admin.coupons.create', compact('categories', 'products'));
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
        // Lấy danh mục và sản phẩm hiện có để hiển thị trong form chỉnh sửa
        $categories = Category::all();
        $products = AdminProducts::where('category_id', $admin_coupon->category_id)->get();
        return view('admin.coupons.edit', compact('admin_coupon', 'categories', 'products'));
    }

    public function update(Request $request, AdminCoupons $admin_coupon)
    {
        // Validate dữ liệu cập nhật
        $request->validate([
            'code' => 'required|string|max:50',
            'type' => 'required|string|in:fixed,percentage',
            'value' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'product_id' => 'nullable|exists:products,id',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:starts_at',
        ]);

        // Cập nhật mã giảm giá
        $admin_coupon->update($request->all());

        return redirect()->route('admin-coupons.index')->with('success', 'Mã giảm giá đã được cập nhật thành công!');
    }

    public function destroy(AdminCoupons $admin_coupon)
    {
        // Xóa mềm mã giảm giá
        $admin_coupon->delete();
        return redirect()->route('admin-coupons.index')->with('success', 'Mã giảm giá đã được xóa thành công!');
    }

    public function getProductsByCategory($categoryId)
    {
        // Lấy danh sách sản phẩm theo category_id
        $products = AdminProducts::where('category_id', $categoryId)->get();
        return response()->json($products);
    }
}
