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
use App\Models\AdminCoupons;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
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

    public function applyDiscount(Request $request)
    {
        $code = $request->input('discount_code');
        $coupon = AdminCoupons::where('code', $code)->first();

        if (!$coupon || $coupon->expires_at < now()) {
            return response()->json(['success' => false, 'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.']);
        }

        $totalPrice = 0;
        foreach (Cart::where('user_id', auth()->id())->get() as $item) {
            $price = $item->variation->price ?? $item->product->price;
            $totalPrice += $price * $item->quantity;
        }

        $discountAmount = 0;
        if ($coupon->type === 'fixed') {
            $discountAmount = $coupon->value;
        } elseif ($coupon->type === 'percentage') {
            $discountAmount = ($totalPrice * $coupon->value) / 100;
        }

        // Lưu giá trị giảm giá vào session
        session(['discountCode' => $code, 'discountAmount' => $discountAmount]);

        return response()->json(['success' => true, 'discountAmount' => $discountAmount]);
    }


    public function store(Request $request)
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to place an order.');
        }

        $cart = Cart::where('user_id', $userId)
            ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
            ->get();

        $totalPrice = 0;
        foreach ($cart as $item) {
            $price = $item->variation->price ?? $item->product->price;
            $totalPrice += $price * $item->quantity;
        }

        $shippingFee = 40000; // Phí vận chuyển
        $discountAmount = session('discountAmount', 0); // Lấy giá trị giảm giá từ session

        // Tính giá trị tổng sau khi áp dụng giảm giá
        $finalTotal = $totalPrice + $shippingFee - $discountAmount;

        // Tạo đơn hàng mới
        $order = new AdminOrder();
        $order->user_id = $userId;
        $order->email = auth()->user()->email;

        // Lấy địa chỉ giao hàng
        $addressId = $request->input('address_id');
        $address = Address::where('user_id', $userId)->findOrFail($addressId);

        if ($address) {
            $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
            $order->street = $address->street;
            $order->city = $address->city;
            $order->state = $address->state;
            $order->house_address = $address->house_address;
            $order->address_id = $address->id;
            $order->name = $address->name;
            $order->phone = $address->phone_number;
        } else {
            return redirect()->back()->with('error', 'No address found for the user.');
        }

        $nameClient = $request->name_client ?: auth()->user()->name;
        $phoneNumber = $request->phone_number ?: $address->phone_number ?: auth()->user()->phone_number;

        if (!$phoneNumber) {
            return redirect()->back()->with('error', 'No phone number found for the user.');
        }

        // Lưu giá trị discount_amount và tổng tiền vào đơn hàng
        $order->total = $totalPrice;
        $order->discount_amount = $discountAmount;
        $order->shipping_fee = $shippingFee;
        $order->final_total = $finalTotal; // Tổng cuối cùng sau giảm giá và phí vận chuyển
        $order->status = 'pending';
        $order->name_client = $nameClient;
        $order->phone_number = $phoneNumber;
        $order->payment_method = $request->paymentMethod;
        $order->save();

        // Lưu các sản phẩm vào bảng OderItem
        foreach ($cart as $item) {
            $productId = $item->product_id;
            $variationId = $item->variation_id;

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

        // Xóa giỏ hàng của người dùng
        Cart::where('user_id', $userId)->delete();

        // Gửi email xác nhận đơn hàng
        Mail::to($order->email)->send(new OrderConfirmationMail($order));

        // Xóa giá trị giảm giá trong session
        session()->forget('discountAmount');

        return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
            ->with('success', 'Your order has been placed successfully!');
    }
}
