<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class MuaNgayController extends Controller
{
    public function muaNgay($id)
    {
        $product = AdminProducts::findOrFail($id);

        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng');
        }

        $cart = session()->get('cart', []);
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "price_sale" => $product->price_sale,
        ];

        session()->put('cart', $cart);

        // Điều hướng tới trang thanh toán hoặc giỏ hàng
        return redirect()->route('checkout')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
}
