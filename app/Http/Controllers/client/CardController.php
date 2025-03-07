<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{

    
    public function getCartCount()
    {
        if (auth()->check()) {
            // Count unique products instead of sum of quantities
            return Cart::where('user_id', auth()->id())->count();
        }
        return 0;
    }
  
    public function add(Request $request)
    {
        $action = $request->input('action');
        $productId = $request->input('product_id');
        $sizeId = $request->input('size');
        $colorId = $request->input('color');
        $quantity = $request->input('quantity', 1);
        $userId = auth()->id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $product = AdminProducts::where('id', $productId)->first();

        // Kiểm tra nếu sản phẩm không tồn tại hoặc đã bị xóa
        if (!$product || $product->deleted) {
            return redirect()->back()->with('error', 'Sản phẩm này không tồn tại hoặc đã bị xóa.');
        }
        $variation = $product->variations()
            ->where('size_id', $sizeId)
            ->where('color_id', $colorId)
            ->first();

        if (!$variation) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm không hợp lệ.');
        }

        // Kiểm tra số lượng trong giỏ hàng hiện tại
        $existingCartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('variation_id', $variation->id)
            ->first();

        $currentCartQuantity = $existingCartItem ? $existingCartItem->quantity : 0;
        $newTotalQuantity = $currentCartQuantity + $quantity;

        // Kiểm tra nếu tổng số lượng vượt quá số lượng trong kho
        if ($newTotalQuantity > $variation->quantity) {
            return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng có sẵn trong kho.');
        }

        if ($action === 'buyNow') {
            $cartItem = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'size' => $sizeId,
                'color' => $colorId,
                'image' => $variation->image->image_path ?? 'default/path/to/image.jpg',
                'name' => $product->name,
                'price' => $variation->price ?? $product->price,
                'variation_id' => $variation->id
            ];

            session()->put('buyNow', $cartItem);
            return redirect()->route('client-checkout.index');
        } else {
            $existingCartItem = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->where('variation_id', $variation->id)
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'variation_id' => $variation->id,
                    'quantity' => $quantity
                ]);
            }

            // Thay đổi ở đây: Trả về trang trước đó với thông báo thành công
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        }
    }

    public function index()
    {
        $userId = auth()->id();

        if (!$userId) {

            return redirect()->route('client-login.index')->with('error', 'Please log in to view your cart.');

        }

        session()->forget('buyNow');

        $cart = Cart::where('user_id', $userId)
                    ->with(['product', 'variation.size', 'variation.color'])
                    ->get()
                    ->filter(function ($item) {
                        return $item->product && $item->product->exists && !$item->product->deleted;
                    });
        return view('client.clientcard.card', compact('cart'));
    }

    public function remove($id)
    {
        $userId = auth()->id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thực hiện thao tác này.');
        }

        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
        }

        return redirect()->route('cart.index')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $userId = auth()->id();

        if (!$userId) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thực hiện thao tác này.');
        }

        $cartItem = Cart::where('id', $id)
                       ->where('user_id', $userId)
                       ->with('variation')
                       ->first();
        
        if (!$cartItem) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
        }
        

        $action = $request->input('action');
        $currentQuantity = $cartItem->quantity;

        if ($action === 'increase') {
            $newQuantity = $currentQuantity + 1;
            if ($newQuantity > $cartItem->variation->quantity) {
                return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng có sẵn.');
            }
            $cartItem->quantity = $newQuantity;
        } elseif ($action === 'decrease' && $currentQuantity > 1) {
            $cartItem->quantity = $currentQuantity - 1;
        }

        $cartItem->save();

        return redirect()->back()->with('success', 'Đã cập nhật số lượng sản phẩm.');
    }
}
