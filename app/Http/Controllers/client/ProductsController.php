<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(string $id)
    {
        $productDetail = AdminProducts::with(['category', 'brand', 'images', 'variations.size', 'variations.color'])
            ->findOrFail($id);
            $listBienThe = AdminProducts::with(['variations', 'colors', 'sizes'])->findOrFail($id);
// dd($productDetail);
        return view('Client.ClientProducts.ClientDetailProduct', compact('productDetail','listBienThe'));
    }


    public function quickBuyWithVariants(Request $request, $id)
{
    $request->validate([
        'size' => 'required',
        'color' => 'required',
    ]);
    $product = ProductsController::with('variations')->findOrFail($id);

    // Lấy thông tin biến thể phù hợp
    $variant = $product->variations->where('size', $request->size)->where('color', $request->color)->first();

    if (!$variant) {
        return redirect()->back()->with('error', 'Biến thể không hợp lệ.');
    }

    // Lấy giỏ hàng từ session (hoặc tạo giỏ hàng mới nếu chưa có)
    $cart = session()->get('cart', []);

    // Thêm sản phẩm vào giỏ hàng với biến thể đã chọn
    $cart[$id] = [
        "name" => $product->name,
        "price" => $product->price,
        "price_sale" => $product->price_sale,
        "quantity" => 1,
        "size" => $request->size,
        "color" => $request->color
    ];

    // Cập nhật giỏ hàng trong session
    session()->put('cart', $cart);

    // Chuyển hướng đến trang checkout
    return redirect()->route('checkout');
}

}
