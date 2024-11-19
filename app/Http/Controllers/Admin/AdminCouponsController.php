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

    foreach ($coupons as $coupon) {
        if ($coupon->product) {

            $originalPrice = $coupon->product->price;
            $coupon->original_price = $originalPrice;

            if ($coupon->type === 'fixed') {
                $discountedPrice = max($originalPrice - $coupon->value, 0);
            } elseif ($coupon->type === 'percentage') {
                $discountedPrice = max($originalPrice - ($originalPrice * $coupon->value / 100), 0);
            } else {
                $discountedPrice = $originalPrice;
            }

            $coupon->discounted_price = $discountedPrice;
        }
    }

    return view('Admin.Coupons.index', compact('coupons'));
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

        return view('Admin.Coupons.create', compact('categories', 'products'));
    }

    public function store(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'code' => 'required|string|max:255',
        'type' => 'required|string',
        'value' => 'required|numeric',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date|after:starts_at',
        'category_id' => 'required|exists:categories,id', // Validate category_id
        'product_id' => 'required|exists:products,id',
    ]);

    // Tạo mã giảm giá mới
    AdminCoupons::create([
        'code' => $request->code,
        'type' => $request->type,
        'value' => $request->value,
        'starts_at' => $request->starts_at,
        'expires_at' => $request->expires_at,
        'category_id' => $request->category_id, // Lưu category_id
        'product_id' => $request->product_id,
    ]);

    return redirect()->route('admin-coupons.index')->with('success', 'Thêm mã giảm giá thành công.');
}


public function edit($id, Request $request)
{
    $admin_coupon = AdminCoupons::findOrFail($id);
    $categories = Category::all();
    $products = AdminProducts::where('category_id', $admin_coupon->category_id)->get();
    $products = AdminProducts::all();

    // Nếu có category_id từ request, lấy sản phẩm theo category_id đó
    if ($request->has('category_id')) {
        $products = AdminProducts::where('category_id', $request->category_id)->get();
        $admin_coupon->category_id = $request->category_id; // Cập nhật category_id
    }

    return view('Admin.coupons.edit', compact('admin_coupon', 'categories', 'products'));
}


    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'code' => 'required|string|max:255',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date|after:starts_at',
        ]);

        // Tìm coupon để cập nhật
        $admin_coupon = AdminCoupons::findOrFail($id);

        // Cập nhật dữ liệu coupon
        $admin_coupon->category_id = $request->category_id;
        $admin_coupon->product_id = $request->product_id;
        $admin_coupon->code = $request->code;
        $admin_coupon->type = $request->type;
        $admin_coupon->value = $request->value;
        $admin_coupon->starts_at = $request->starts_at;
        $admin_coupon->expires_at = $request->expires_at;

        // Lưu thay đổi vào cơ sở dữ liệu
        $admin_coupon->save();

        // Thông báo thành công
        return redirect()->route('admin-coupons.index')->with('success', 'Cập nhật mã giảm giá thành công!');
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
