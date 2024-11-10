<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class MuaNgayController extends Controller
{
    public function quickBuy($id)
    {

        $product = AdminProducts::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price_sale" => $product->price_sale,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('checkout');
    }
    public function quickBuyFromDetail(Request $request, $id)
{
    $product = AdminProducts::findOrFail($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    }
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "price_sale" => $product->price_sale,
            "quantity" => 1
        ];
    }
    session()->put('cart', $cart);
    return redirect()->route('checkout');
}

}
