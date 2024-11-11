<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\User;
use App\Models\AdminOrder;
use App\Models\Address; // Import the correct Address model
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\OderItem;
use App\Models\ProductVariation;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }

        $cart = Cart::where('user_id', $userId)
            ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
            ->get();

        $email = auth()->user()->email;
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses;

        return view('Client.clientcheckout.checkOut', compact('cart', 'email', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user is logged in
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to place an order.');
        }

        // Get the user's cart
        $cart = Cart::where('user_id', $userId)
            ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
            ->get();

        // Calculate the total value of the cart
        $totalPrice = 0;
        foreach ($cart as $item) {
            $price = $item->variation->price ?? $item->product->price;
            $totalPrice += $price * $item->quantity;
        }

        // Fixed shipping fee
        $shippingFee = 40000;
        $finalTotal = $totalPrice + $shippingFee;

        // Create a new order
        $order = new AdminOrder();
        $order->user_id = $userId;
        $order->email = auth()->user()->email;

        // Use the selected address from the request
        $addressId = $request->input('address_id');
        $address = Address::where('user_id', $userId)->findOrFail($addressId);

        if ($address) {
            $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
            $order->street = $address->street;
            $order->city = $address->city;
            $order->state = $address->state;
            $order->house_address = $address->house_address;
            $order->address_id = $address->id;
            $order->name = $address->name; // Lưu tên người nhận từ địa chỉ
            $order->phone = $address->phone_number; // Lưu số điện thoại từ địa chỉ
        } else {
            // Handle case where address is not available
            return redirect()->back()->with('error', 'No address found for the user.');
        }

        // Get the name client from the request or use the user's name from their account
        $nameClient = $request->name_client ?: auth()->user()->name; // Use the user's name if not provided in the request

        // Get the phone number from the request or fallback to the user's phone number from the saved address
        $phoneNumber = $request->phone_number ?: $address->phone_number ?: auth()->user()->phone_number; // Use the address phone or user phone if not provided

        if (!$phoneNumber) {
            // If phone number is still not found, redirect back with an error
            return redirect()->back()->with('error', 'No phone number found for the user.');
        }

        // Fill order with other fields from the request
        $order->total = $finalTotal;
        $order->status = 'Chờ xử lý'; // Default order status
        $order->name_client = $nameClient; // Customer's name
        $order->phone_number = $phoneNumber;
        $order->payment_method = $request->paymentMethod; // Lưu phương thức thanh toán
        $order->save();

        // Save order items
        foreach ($cart as $item) {
            $productId = $item->product_id;  // Đảm bảo lấy đúng product_id
            $variationId = $item->variation_id;

            // Kiểm tra thêm để đảm bảo product_id có giá trị hợp lệ
            if (!$productId || !AdminProducts::find($productId) || !$variationId || !ProductVariation::find($variationId)) {
                return redirect()->back()->with('error', 'Invalid product or variation ID in cart.');
            }
            $imagePath = $item->variation->image->image_path ?? '';
            OderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'variation_id' => $variationId,
                'quantity' => $item->quantity,
                'price' => $item->variation->price ?? $item->product->price,
                'image' => $imagePath,
            ]);
        }

        // Clear the user's cart after the order
        Cart::where('user_id', $userId)->delete();
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
        // Redirect to the success page
        return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
            ->with('success', 'Your order has been placed successfully!');
    }

}
