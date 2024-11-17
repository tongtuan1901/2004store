<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\User;
use App\Models\AdminOrder;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\OderItem;
use App\Models\ProductVariation;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to view checkout.');
        }
    
        $email = auth()->user()->email;
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses;
        
        if (session()->has('buyNow')) {
            $cart = [session()->get('buyNow')];
            return view('Client.ClientCheckout.Checkout', compact('cart', 'email', 'addresses'))
                   ->with('clearBuyNow', true); // Add flag to clear session
        }
        
        $cart = Cart::where('user_id', $userId)
            ->with(['product', 'variation.size', 'variation.color'])
            ->get();
            
        return view('Client.ClientCheckout.Checkout', compact('cart', 'email', 'addresses'));
    }

    public function store(Request $request)
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to place an order.');
        }

        // Get cart items based on whether it's a "buy now" or regular cart purchase
        if (session()->has('buyNow')) {
            $cartItems = [session()->get('buyNow')];
            $totalPrice = $cartItems[0]['price'] * $cartItems[0]['quantity'];
        } else {
            $cartItems = Cart::where('user_id', $userId)
                ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
                ->get();
            
            $totalPrice = $cartItems->sum(function($item) {
                return ($item->variation->price ?? $item->product->price) * $item->quantity;
            });
        }

        $shippingFee = 40000;
        $finalTotal = $totalPrice + $shippingFee;

        // Validate and get address
        $addressId = $request->input('address_id');
        $address = Address::where('user_id', $userId)->findOrFail($addressId);
        
        if (!$address) {
            return redirect()->back()->with('error', 'No address found for the user.');
        }

        // Create order
        $order = new AdminOrder();
        $order->user_id = $userId;
        $order->email = auth()->user()->email;
        $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
        $order->street = $address->street;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->house_address = $address->house_address;
        $order->address_id = $address->id;
        $order->name = $address->name;
        $order->phone = $address->phone_number;
        $order->total = $finalTotal;
        $order->status = 'Chờ xử lý';
        $order->name_client = $address->name;
        $order->phone_number = $address->phone_number;
        $order->payment_method = $request->paymentMethod;

        // Handle wallet payment
        if ($request->paymentMethod == 'wallet') {
            $user = auth()->user();
            if ($user->balance < $finalTotal) {
                return redirect()->back()->with('error', 'Số dư trong ví không đủ');
            }
            $user->balance -= $finalTotal;
            $user->save();
        }

        $order->save();

        // Create order items
        foreach ($cartItems as $item) {
            $productId = $item instanceof Cart ? $item->product_id : $item['product_id'];
            $variationId = $item instanceof Cart ? $item->variation_id : $item['variation_id'];
            
            if (!$productId || !AdminProducts::find($productId) || !$variationId || !ProductVariation::find($variationId)) {
                return redirect()->back()->with('error', 'Invalid product or variation ID.');
            }

            $imagePath = $item instanceof Cart 
                ? ($item->variation->image->image_path ?? '') 
                : ($item['image'] ?? '');

            OderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'variation_id' => $variationId,
                'quantity' => $item instanceof Cart ? $item->quantity : $item['quantity'],
                'price' => $item instanceof Cart 
                    ? ($item->variation->price ?? $item->product->price) 
                    : $item['price'],
                'image' => $imagePath,
            ]);
        }

        // Clear cart/session
        if (session()->has('buyNow')) {
            session()->forget('buyNow');
        } else {
            Cart::where('user_id', $userId)->delete();
        }

        // Send confirmation email
        Mail::to($order->email)->send(new OrderConfirmationMail($order));

        return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
            ->with('success', 'Your order has been placed successfully!');
    }
}
