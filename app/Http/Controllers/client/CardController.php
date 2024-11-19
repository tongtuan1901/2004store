<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $action = $request->input('action');

        if($action === 'addToCart'){
        $productId = $request->input('product_id');
        $sizeId = $request->input('size');
        $colorId = $request->input('color');
        $quantity = $request->input('quantity', 1); // Default quantity is 1
        $userId = auth()->id(); // Ensure the user is authenticated
        // dd($request->input('color'));
        // \Log::info('Selected Product ID: ' . $productId);
        // \Log::info('Selected Color: ' . $colorId);
        // \Log::info('Selected Size: ' . $sizeId);
        // dd($request);

        $productId = $request->input('product_id');
        $sizeId = $request->input('size');
        $colorId = $request->input('color');
        $quantity = $request->input('quantity', 1);
        $userId = auth()->id();
    

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
    

        // Validate product and variation

        $product = AdminProducts::findOrFail($productId);
        $variation = $product->variations()
            ->where('size_id', $sizeId)
            ->where('color_id', $colorId)
            ->first();
    
        if (!$variation) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm không hợp lệ.');
        }

        $cartItem = Cart::where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->where('size', $sizeId)
                        ->where('color', $colorId)
                        ->first();
    
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'session_id' => session()->getId(),

    
        if ($action === 'buyNow') {
            // Create cart item for buy now
            $cartItem = [

                'product_id' => $productId,
                'quantity' => $quantity,
                'size' => $sizeId,
                'color' => $colorId,
                'image' => $variation->image->image_path ?? 'default/path/to/image.jpg',
                'name' => $product->name,

                'price' => $product->price_sale,
                'original_price' => $product->price,
                'variation_id' => $variation->id, // Đảm bảo rằng bạn lưu variation_id
            ]);
            
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
        }elseif($action === 'buyNow'){
        $productId = $request->input('product_id');
        $sizeId = $request->input('size');
        $colorId = $request->input('color');
        $quantity = $request->input('quantity', 1);
        $product = AdminProducts::findOrFail($productId);
        $variation = $product->variations()
            ->where('size_id', $sizeId)
            ->where('color_id', $colorId)
            ->first();

        if (!$variation) {
            return redirect()->route('cart.index')->with('error', '');
        }

        $cart = [
            'product_id' => $productId,
            'name' => $product->name,
            'quantity' => $quantity,
            'size' => $sizeId,
            'color' => $colorId,
            'price' => $product->price_sale,
            'image' => $variation->image->image_path ?? 'default/path/to/image.jpg',
            'variation_id' => $variation->id,
        ];
        $userId = auth()->id();
        $email = auth()->user()->email;
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses;
        session()->put('buyNow', $cart);
        dd($cart, $addresses, $email, $user);
        // dd($cart);
        return view('Client.ClientCheckout.Checkout',compact('cart','email', 'addresses'));
    }

                'price' => $variation->price ?? $product->price,
                'variation_id' => $variation->id
            ];
    
            // Store in session and redirect to checkout
            session()->put('buyNow', $cartItem);
            return redirect()->route('client-checkout.index');
        } else {
            // Add to cart
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
    
            return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        }

    }
    
    

    /**
     * Display the user's cart items.
     */
    public function index()
    {
        $userId = auth()->id();
        
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }
    
        // Clear buyNow session when viewing cart
        session()->forget('buyNow');
        
        $cart = Cart::where('user_id', $userId)
                    ->with(['product', 'variation.size', 'variation.color'])
                    ->get();
        return view('client.clientcard.card', compact('cart'));
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(Request $request, $id)
    {
        $userId = auth()->id();
    
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to modify your cart.');
        }
    
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();
    
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
        }
    
        return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
    }
    

    // Other resource methods (create, store, show, edit, update, destroy) can be implemented as needed
}
