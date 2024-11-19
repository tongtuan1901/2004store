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
use App\Models\Discount;
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

//     public function store(Request $request)
// {
//     $userId = auth()->id();
//     if (!$userId) {
//         return redirect()->route('login')->with('error', 'Please log in to continue.');
//     }

//     // Lấy giỏ hàng của người dùng
//     $cart = Cart::where('user_id', $userId)
//         ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
//         ->get();

//     if ($cart->isEmpty()) {
//         return redirect()->back()->with('error', 'Your cart is empty.');
//     }

//     // Tính tổng giá trị giỏ hàng
//     $totalPrice = $cart->sum(function ($item) {
//         $price = $item->variation->price ?? $item->product->price;
//         return $price * $item->quantity;
//     });

//     // Phí vận chuyển cố định
//     $shippingFee = 40000;

//     // Kiểm tra xem có yêu cầu áp dụng mã giảm giá không
//     if ($request->has('discount_code')) {
//         $discountCode = $request->input('discount_code');
//         $discountValue = 0;

//         $discount = Discount::where('code', $discountCode)->first();
//         if ($discount && $discount->isValid()) {
//             if ($discount->type === 'percent') {
//                 $discountValue = $totalPrice * ($discount->value / 100);
//             } elseif ($discount->type === 'fixed') {
//                 $discountValue = $discount->value;
//             }

//             $discountValue = min($discountValue, $totalPrice);

//             // Lưu mã giảm giá và giá trị giảm giá vào session
//             session(['discount_code' => $discountCode, 'discount_value' => $discountValue]);

//             // Trả về thông tin tổng giá mới
//             $finalTotal = max(0, $totalPrice - $discountValue) + $shippingFee;

//             return redirect()->back()->with([
//                 'success' => 'Discount applied successfully!',
//                 'final_total' => $finalTotal,
//                 'discount_code' => $discountCode,
//                 'discount_value' => $discountValue,
//             ]);
//         } else {
//             return redirect()->back()->with('error', 'Invalid or expired discount code.');
//         }
//     }

//     // Nếu không có mã giảm giá, tiếp tục xử lý tạo đơn hàng
//     $discountCode = session('discount_code', null);
//     $discountValue = session('discount_value', 0);
//     $finalTotal = max(0, $totalPrice - $discountValue) + $shippingFee;

//     // Tạo đơn hàng mới
//     $order = new AdminOrder();
//     $order->user_id = $userId;
//     $order->email = auth()->user()->email;
//     $order->total = $finalTotal;
//     $order->status = 'Chờ xử lý';
//     $order->name_client = $request->name_client ?: auth()->user()->name;
//     $order->phone_number = $request->phone_number ?: auth()->user()->phone_number;
//     $order->payment_method = $request->paymentMethod;
//     $order->discount_code = $discountCode;
//     $order->discount_value = $discountValue;

//     if ($request->paymentMethod == 'wallet') {
//         $user = auth()->user();
//         if ($user->balance < $finalTotal) {
//             return redirect()->back()->with('error', 'Số dư trong ví không đủ.');
//         }
//         $user->balance -= $finalTotal;
//         $user->save();
//     }

//     // Xử lý địa chỉ giao hàng
//     $addressId = $request->input('address_id');
//     $address = Address::where('user_id', $userId)->find($addressId);

//     if ($address) {
//         $order->address_id = $address->id;
//         $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
//         $order->street = $address->street;
//         $order->city = $address->city;
//         $order->state = $address->state;
//         $order->house_address = $address->house_address;
//         $order->name = $address->name;
//         $order->phone = $address->phone_number;
//     } else {
//         return redirect()->back()->with('error', 'No valid address found.');
//     }

//     // Lưu đơn hàng vào cơ sở dữ liệu
//     $order->save();

//     session()->forget('discount_code');
//     session()->forget('discount_value');

//     // Lưu các mục đơn hàng (Order Items)
//     foreach ($cart as $item) {
//         OderItem::create([
//             'order_id' => $order->id,
//             'product_id' => $item->product_id,
//             'variation_id' => $item->variation_id,
//             'quantity' => $item->quantity,
//             'price' => $item->variation->price ?? $item->product->price,
//             'image' => $item->variation->image->image_path ?? '',
//         ]);
//     }

//     // Xóa giỏ hàng và gửi email xác nhận đơn hàng
//     Cart::where('user_id', $userId)->delete();
//     Mail::to($order->email)->send(new OrderConfirmationMail($order));

//     return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
//         ->with('success', 'Your order has been placed successfully!');
// }

public function store(Request $request)
{
    $userId = auth()->id();
    if (!$userId) {
        return redirect()->route('login')->with('error', 'Please log in to continue.');
    }

    // Lấy giỏ hàng của người dùng
    $cart = Cart::where('user_id', $userId)
        ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
        ->get();

    if ($cart->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    // Tính tổng giá trị giỏ hàng
    $totalPrice = $cart->sum(function ($item) {
        $price = $item->variation->price ?? $item->product->price;
        return $price * $item->quantity;
    });

    // Phí vận chuyển cố định
    $shippingFee = 40000;

    // Kiểm tra xem có yêu cầu áp dụng mã giảm giá không
    if ($request->has('discount_code')) {
        $discountCode = $request->input('discount_code');
        $discountValue = 0;

        // Lấy thông tin mã giảm giá từ database
        $discount = Discount::where('code', $discountCode)->first();
        if ($discount && $discount->isValid()) {
            // Tính giá trị giảm giá dựa trên loại mã giảm giá
            if ($discount->type === 'percent') {
                $discountValue = $totalPrice * ($discount->value / 100);
            } elseif ($discount->type === 'fixed') {
                $discountValue = $discount->value;
            }

            // Giới hạn giá trị giảm giá không vượt quá tổng giá trị giỏ hàng
            $discountValue = min($discountValue, $totalPrice);

            // Lưu mã giảm giá và giá trị giảm giá vào session
            session(['discount_code' => $discountCode, 'discount_value' => $discountValue]);

            // Trả về thông tin tổng giá mới sau khi áp dụng mã giảm giá
            $finalTotal = max(0, $totalPrice - $discountValue) + $shippingFee;

            return redirect()->back()->with([
                'success' => 'Discount applied successfully!',
                'final_total' => $finalTotal,
                'discount_code' => $discountCode,
                'discount_value' => $discountValue,
            ]);
        } else {
            return redirect()->back()->with('error', 'Invalid or expired discount code.');
        }
    }

    // Nếu không có mã giảm giá, lấy giá trị mặc định từ session
    $discountCode = session('discount_code', null);
    $discountValue = session('discount_value', 0);
    $finalTotal = max(0, $totalPrice - $discountValue) + $shippingFee;

    // Tạo đơn hàng mới
    $order = new AdminOrder();
    $order->user_id = $userId;
    $order->email = auth()->user()->email;
    $order->total = $finalTotal;
    $order->status = 'Chờ xử lý';
    $order->name_client = $request->name_client ?: auth()->user()->name;
    $order->phone_number = $request->phone_number ?: auth()->user()->phone_number;
    $order->payment_method = $request->paymentMethod;
    $order->discount_code = $discountCode;
    $order->discount_value = $discountValue;

    // Kiểm tra và trừ số dư ví nếu thanh toán qua ví
    if ($request->paymentMethod == 'wallet') {
        $user = auth()->user();
        if ($user->balance < $finalTotal) {
            return redirect()->back()->with('error', 'Số dư trong ví không đủ.');
        }
        $user->balance -= $finalTotal;
        $user->save();
    }

    // Xử lý địa chỉ giao hàng
    $addressId = $request->input('address_id');
    $address = Address::where('user_id', $userId)->find($addressId);

    if ($address) {
        $order->address_id = $address->id;
        $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
        $order->street = $address->street;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->house_address = $address->house_address;
        $order->name = $address->name;
        $order->phone = $address->phone_number;
    } else {
        return redirect()->back()->with('error', 'No valid address found.');
    }

    // Lưu đơn hàng vào cơ sở dữ liệu
    $order->save();

    // Xóa mã giảm giá trong session sau khi tạo đơn hàng
    session()->forget('discount_code');
    session()->forget('discount_value');

    // Lưu các mục đơn hàng (Order Items)
    foreach ($cart as $item) {
        OderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'variation_id' => $item->variation_id,
            'quantity' => $item->quantity,
            'price' => $item->variation->price ?? $item->product->price,
            'image' => $item->variation->image->image_path ?? '',
        ]);
    }

    // Xóa giỏ hàng và gửi email xác nhận đơn hàng
    Cart::where('user_id', $userId)->delete();
    Mail::to($order->email)->send(new OrderConfirmationMail($order));

    return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
        ->with('success', 'Your order has been placed successfully!');
}

    public function removeDiscount()
    {
        // Xoá mã giảm giá và giá trị giảm giá khỏi session
        session()->forget(['discount_code', 'discount_value']);

        // Trả về trang checkout với thông báo đã xoá mã giảm giá
        return redirect()->back()->with('success', 'Mã giảm giá đã được xoá.');
    }
}