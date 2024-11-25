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
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(AdminOrder $order)
    {
        // Lấy tổng tiền đã giảm giá từ đơn hàng
        $amount = $order->total + $order->shipping_fee - $order->discount_value;

        // Cấu hình MoMo
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo cho đơn hàng #" . $order->id;
        $orderId = time() . "-" . uniqid();
        $redirectUrl = route('client-thankyou.index', ['order_id' => $order->id]);
        $ipnUrl = route('client-checkout.index');

        $requestId = time();
        $requestType = "payWithATM";

        // Xây dựng chuỗi rawHash cho chữ ký
        $rawHash = "accessKey=" . $accessKey .
            "&amount=" . $amount .
            "&extraData=" . "" .
            "&ipnUrl=" . $ipnUrl .
            "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo .
            "&partnerCode=" . $partnerCode .
            "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId .
            "&requestType=" . $requestType;

        // Tạo chữ ký bằng hash HMAC SHA256
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // Dữ liệu gửi đi trong yêu cầu
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => '',
            'requestType' => $requestType,
            'signature' => $signature
        );

        // Gửi yêu cầu đến MoMo
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        // Kiểm tra nếu 'payUrl' có tồn tại trong phản hồi từ MoMo
        if (isset($jsonResult['payUrl'])) {
            // Lưu thông tin vào session
            session(['momo_payment_info' => $jsonResult]);

            return redirect()->to($jsonResult['payUrl']);
        } else {
            // Nếu không có payUrl, trả về thông báo lỗi
            return redirect()->route('client-checkout')->with('error', 'Lỗi khi kết nối với MoMo. Vui lòng thử lại.');
        }
    }

    public function vnpay_payment(AdminOrder $order)
    {
        // Cấu hình VNPAY
        $vnp_TmnCode = "NINXYELP"; // Mã Terminal của VNPAY
        $vnp_HashSecret = "AIETPJHOVHILFFJPZHPGRDQSRWULXSRH"; // Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // URL cổng thanh toán VNPAY
        $vnp_Returnurl = route('client-thankyou.index', ['order_id' => $order->id]); // URL trả về sau thanh toán

        // Lấy thông tin đơn hàng
        $vnp_TxnRef = $order->id;
        $vnp_OrderInfo = "Thanh toán đơn hàng #" . $order->id;
        $vnp_OrderType = "billpayment";
        $vnp_Amount = ($order->total + $order->shipping_fee - $order->discount_value) * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = request()->ip();

        // Tham số thanh toán
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        // Tạo URL và chuỗi ký hiệu
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect()->to($vnp_Url); // Chuyển hướng người dùng đến VNPAY
    }
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
    //             if ($discount && $discount->isValid()) {
    //                 session(['discount_code' => $discountCode, 'discount_value' => $discountValue]);
    //                 // dd(session('discount_code'), session('discount_value'));

    //             }else {
    //                 return redirect()->back()->with('error', 'Invalid or expired discount code.');
    //             }


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
    //     $discountCode = $request->input('discount_code', null);
    //     $discountValue = $request->input('discount_value', 0);

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
    //     $discountCode = session('discount_code') ?: $discountCode;
    //     $discountValue = session('discount_value') ?: $discountValue;

    //     $order->discount_code = $discountCode;
    //     $order->discount_value = $discountValue;

    //     // dd($discountCode, $discountValue);
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

            // Kiểm tra mã giảm giá có tồn tại
            if (!$discount) {
                return redirect()->back()->with('error', 'Mã giảm giá không tồn tại.');
            }

            // Kiểm tra điều kiện hợp lệ của mã giảm giá
            if (!$discount->isValid($totalPrice)) {
                return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ hoặc không đáp ứng giá trị tối thiểu.');
            }

            // Tính giá trị giảm giá
            $discountId = $discount->id;
            if ($discount->type === 'percent') {
                $discountValue = $totalPrice * ($discount->value / 100);
            } elseif ($discount->type === 'fixed') {
                $discountValue = $discount->value;
            }

            // Giá trị giảm không vượt quá tổng giá trị đơn hàng
            $discountValue = min($discountValue, $totalPrice);

            // Tăng số lượt sử dụng mã giảm giá
            $discount->increment('usage_count');

            // Lưu mã giảm giá vào session
            session([
                'discount_code' => $discountCode,
                'discount_value' => $discountValue
            ]);

            return redirect()->back()->with('success', 'Áp dụng mã giảm giá thành công!');
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

        if ($request->paymentMethod == 'wallet') {
            $user = auth()->user();
            if ($user->balance < $finalTotal) {
                return redirect()->back()->with('error', 'Số dư trong ví không đủ');
            }
            $user->balance -= $finalTotal;
            $user->save();
        }

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
        if ($request->paymentMethod == 'momo') {
            return $this->momo_payment($order);
        } elseif ($request->paymentMethod == 'vnpay') {
            return $this->vnpay_payment($order);
        }

        Mail::to($order->email)->send(new OrderConfirmationMail($order));

        return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
            ->with('success', 'Your order has been placed successfully!');
    }

    public function removeDiscount()
    {
        // Xóa mã giảm giá và giá trị giảm giá khỏi session
        // session()->forget(['discount_code', 'discount_value', 'final_total']);
        session()->forget(['discount_code', 'discount_value', 'final_total']);

        // Trả về trang checkout với thông báo đã xóa mã giảm giá
        return redirect()->back()->with('success', 'Mã giảm giá đã được xoá.');
    }
}
