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

    // public function store(Request $request)
    // {
    //     // Check if the user is logged in
    //     $userId = auth()->id();
    //     if (!$userId) {
    //         return redirect()->route('login')->with('error', 'Please log in to place an order.');
    //     }
    
    //     // Get the user's cart
    //     $cart = Cart::where('user_id', $userId)
    //                 ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
    //                 ->get();
    
    //     // Calculate the total value of the cart
    //     $totalPrice = 0;
    //     foreach ($cart as $item) {
    //         $price = $item->variation->price ?? $item->product->price;
    //         $totalPrice += $price * $item->quantity;
    //     }
    
    //     // Fixed shipping fee
    //     $shippingFee = 40000;
    //     $finalTotal = $totalPrice + $shippingFee;
    
    //     // Create a new order
    //     $order = new AdminOrder();
    //     $order->user_id = $userId;
    //     $order->email = auth()->user()->email;
    
    //     // Use the selected address from the request
    //     $addressId = $request->input('address_id');
    //     $address = Address::where('user_id', $userId)->findOrFail($addressId);
    
    //     if ($address) {
    //         $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
    //         $order->street = $address->street;
    //         $order->city = $address->city;
    //         $order->state = $address->state;
    //         $order->house_address = $address->house_address;
    //         $order->address_id = $address->id;
    //         $order->name = $address->name; // Lưu tên người nhận từ địa chỉ
    //         $order->phone = $address->phone_number; // Lưu số điện thoại từ địa chỉ
    //     } else {
    //         // Handle case where address is not available
    //         return redirect()->back()->with('error', 'No address found for the user.');
    //     }
    
    //     // Get the name client from the request or use the user's name from their account
    //     $nameClient = $request->name_client ?: auth()->user()->name; // Use the user's name if not provided in the request
    
    //     // Get the phone number from the request or fallback to the user's phone number from the saved address
    //     $phoneNumber = $request->phone_number ?: $address->phone_number ?: auth()->user()->phone_number; // Use the address phone or user phone if not provided
    
    //     if (!$phoneNumber) {
    //         // If phone number is still not found, redirect back with an error
    //         return redirect()->back()->with('error', 'No phone number found for the user.');
    //     }
    
    //     // Fill order with other fields from the request
    //     $order->total = $finalTotal;
    //     $order->status = 'Chờ xử lý'; // Default order status
    //     $order->name_client = $nameClient; // Customer's name
    //     $order->phone_number = $phoneNumber;
    //     $order->payment_method = $request->paymentMethod; // Lưu phương thức thanh toán
    //     $order->save();
    
    //     // Save order items
    //     foreach ($cart as $item) {
    //         $productId = $item->product_id;  // Đảm bảo lấy đúng product_id
    //         $variationId = $item->variation_id;
    
    //         // Kiểm tra thêm để đảm bảo product_id có giá trị hợp lệ
    //         if (!$productId || !AdminProducts::find($productId) || !$variationId || !ProductVariation::find($variationId)) {
    //             return redirect()->back()->with('error', 'Invalid product or variation ID in cart.');
    //         }
    //         $imagePath = $item->variation->image->image_path ?? '';
    //         OderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $productId,
    //             'variation_id' => $variationId,  
    //             'quantity' => $item->quantity,
    //             'price' => $item->variation->price ?? $item->product->price,
    //             'image' => $imagePath,
    //         ]);
    //     }
    
    //     // Clear the user's cart after the order
    //     Cart::where('user_id', $userId)->delete();
    //     Mail::to($order->email)->send(new OrderConfirmationMail($order));
    //     // Redirect to the success page
    //     return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
    //                  ->with('success', 'Your order has been placed successfully!');
    // }






//     public function store(Request $request)
// {
//     $userId = auth()->id();
//     if (!$userId) {
//         return redirect()->route('login')->with('error', 'Please log in to place an order.');
//     }

//     // Lấy giỏ hàng của người dùng
//     $cart = Cart::where('user_id', $userId)
//                 ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
//                 ->get();

//     // Tính tổng giá trị giỏ hàng
//     $totalPrice = 0;
//     foreach ($cart as $item) {
//         $price = $item->variation->price ?? $item->product->price;
//         $totalPrice += $price * $item->quantity;
//     }

//     // Phí vận chuyển cố định
//     $shippingFee = 40000;

//     // Áp dụng mã giảm giá nếu có
//     $discountCode = $request->input('discount_code');
//     $discountValue = 0;

//     if ($discountCode) {
//         $discount = Discount::where('code', $discountCode)->first();

//         if ($discount && $discount->isValid()) {
//             // Tính giá trị giảm giá dựa trên loại mã giảm giá
//             if ($discount->type === 'percentage') {
//                 $discountValue = $totalPrice * ($discount->value / 100);
//             } elseif ($discount->type === 'fixed') {
//                 $discountValue = $discount->value;
//             }

//             // Đảm bảo giảm giá không vượt quá tổng giỏ hàng
//             $discountValue = min($discountValue, $totalPrice);
//         } else {
//             return redirect()->back()->with('error', 'Invalid or expired discount code.');
//         }
//     }

//     // Tính tổng tiền sau khi giảm giá và thêm phí vận chuyển
//     $finalTotal = max(0, $totalPrice - $discountValue) + $shippingFee;

//     $order = new AdminOrder();

//     $order->user_id = $userId;
//     $order->email = auth()->user()->email;
//     $order->total = $finalTotal;
//     $order->status = 'Chờ xử lý';
//     $order->name_client = $request->name_client ?: auth()->user()->name;
//     $order->phone_number = $request->phone_number ?: auth()->user()->phone_number;
//     $order->payment_method = $request->paymentMethod;
//     $order->discount_code = $discountCode; // Lưu mã giảm giá đã áp dụng
//     $order->discount_value = $discountValue; // Lưu giá trị giảm

//     // Sử dụng địa chỉ được chọn từ yêu cầu
//     $addressId = $request->input('address_id');
//     $address = Address::where('user_id', $userId)->findOrFail($addressId);

//     if ($address) {
//         $order->address_id = $address->id; // Gán giá trị address_id
//         $order->address = $address->street . ', ' . $address->city . ', ' . $address->state . ' ' . $address->house_address;
//         $order->street = $address->street;
//         $order->city = $address->city;
//         $order->state = $address->state;
//         $order->house_address = $address->house_address;
//         $order->name = $address->name; // Lưu tên người nhận từ địa chỉ
//         $order->phone = $address->phone_number; // Lưu số điện thoại từ địa chỉ
//     } else {
//         // Xử lý trường hợp không tìm thấy địa chỉ
//         return redirect()->back()->with('error', 'No address found for the user.');
//     }

//     $order->save();


//     // Lưu các mục đơn hàng
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
//                      ->with('success', 'Your order has been placed successfully!');
//     // Sau khi lưu đơn hàng trong hàm store


// }

public function store(Request $request)
{
    // Kiểm tra người dùng đã đăng nhập chưa
    $userId = auth()->id();
    if (!$userId) {
        return redirect()->route('login')->with('error', 'Please log in to place an order.');
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

    // Áp dụng mã giảm giá nếu có
    // Kiểm tra mã giảm giá hợp lệ
$discountCode = $request->input('discount_code');
$discountValue = 0;
$discountId = null;

if ($discountCode) {
    $discount = Discount::where('code', $discountCode)->first();

    if ($discount && $discount->isValid()) {
        $discountId = $discount->id; 
        if ($discount->type === 'percent') {
            $discountValue = $totalPrice * ($discount->value / 100);
        } elseif ($discount->type === 'fixed') {
            $discountValue = $discount->value;
        }
        $discountValue = min($discountValue, $totalPrice);
        session(['discount_code' => $discountCode, 'discount_value' => $discountValue]);
    } else {
        return redirect()->back()->with('error', 'Invalid or expired discount code.');
    }
}

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
$order->discount_code = session('discount_code', $discountCode); 
$order->discount_value = session('discount_value', $discountValue); 

if ($discountId) {
    $order->discount_id = $discountId; // Lưu ID của discount vào trường discount_id
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

// dd($request->session());die;
// Lưu đơn hàng vào cơ sở dữ liệu
$order->save();

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