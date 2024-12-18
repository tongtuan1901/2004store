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

        // $cart = Cart::where('user_id', $userId)
        //     ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
        //     ->get();
        // if ($cart->isEmpty())
        // {
        //     return redirect()->back()->with('error', 'Gio hang rong.');
        // }

        // $totalPrice = $cart->sum(function ($item)
        // {
        //     $price = $item->variation->price ?? $item->product->price;
        //     return $price * $item->quantity;
        // });
        // Tính toán chi phí
        $cart = Cart::where('user_id', $userId)
            ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
            ->get();

        $email = auth()->user()->email;
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses;

        return view('Client.clientcheckout.checkOut', compact('cart', 'email', 'addresses'));
    }

    public function store(Request $request)
    {
        // Kiểm tra đăng nhập
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng.');
        }

        // Lấy thông tin giỏ hàng
        if (session()->has('buyNow')) {
            $cartItems = [session()->get('buyNow')];
            $totalPrice = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cartItems));
        } else {
            $cartItems = Cart::where('user_id', $userId)
                ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
                ->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Giỏ hàng trống');
            }

            $totalPrice = $cartItems->sum(function ($item) {
                return ($item->variation->price ?? $item->product->price) * $item->quantity;
            });
        }

        // Tính toán chi phí
        $shippingFee = 40000;
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
                'discount_value' => $discountValue,
            ]);

            // Kiểm tra giá trị session sau khi lưu
            if (session('discount_value') !== $discountValue) {
                return redirect()->back()->with('error', 'Không thể lưu giá trị giảm giá vào session.');
            }

            return redirect()->back()->with('success', 'Áp dụng mã giảm giá thành công!');
        }

        $finalTotal = max(0, $totalPrice - $discountValue) + $shippingFee;

        // Validate và lấy địa chỉ
        $addressId = $request->input('address_id');
        $address = Address::where('user_id', $userId)->findOrFail($addressId);

        if (!$address) {
            return redirect()->back()->with('error', 'Không tìm thấy địa chỉ.');
        }

        // Tạo đơn hàng mới
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
        $order->discount_code = session('discount_code', $discountCode);
        $order->discount_value = session('discount_value', $discountValue);

        // Lưu đơn hàng
        $order->save();

        session()->forget('discount_code');
        session()->forget('discount_value');

        if ($discountId) {
            $order->discount_id = $discountId; // Lưu ID của discount vào trường discount_id
        }

        // Tạo chi tiết đơn hàng và trừ số lượng sản phẩm
        foreach ($cartItems as $item) {
            $productId = $item instanceof Cart ? $item->product_id : $item['product_id'];
            $variationId = $item instanceof Cart ? $item->variation_id : $item['variation_id'];

            if (!$productId || !AdminProducts::find($productId) || !$variationId || !ProductVariation::find($variationId)) {
                return redirect()->back()->with('error', 'Sản phẩm không hợp lệ.');
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

            // Trừ số lượng sản phẩm trong kho
            $variation = ProductVariation::find($variationId);
            $variation->quantity -= $item instanceof Cart ? $item->quantity : $item['quantity'];
            $variation->save();
        }

        // Xử lý phương thức thanh toán
        if ($request->paymentMethod == 'wallet') {
            $user = auth()->user();
            if ($user->balance < $finalTotal) {
                $order->delete(); // Xóa đơn hàng nếu không đủ tiền
                return redirect()->back()->with('error', 'Số dư trong ví không đủ');
            }
            $user->balance -= $finalTotal;
            $user->save();
        }

        // Xóa giỏ hàng/session sau khi đặt hàng thành công
        if (session()->has('buyNow')) {
            session()->forget('buyNow');
        } else {
            Cart::where('user_id', $userId)->delete();
        }

        // Xử lý thanh toán online
        // if ($request->paymentMethod == 'momo') {
        //     return $this->momo_payment($order);
        // } elseif ($request->paymentMethod == 'vnpay') {
        //     return $this->vnpay_payment($order);
        // }

          // Xử lý thanh toán online
    if ($request->paymentMethod == 'momo') {
        // Gửi email xác nhận trước khi chuyển hướng
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
        return $this->momo_payment($order);
    } elseif ($request->paymentMethod == 'vnpay') {
        // Gửi email xác nhận trước khi chuyển hướng
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
        return $this->vnpay_payment($order);
    } elseif ($request->paymentMethod == 'wallet') {
        // Gửi email xác nhận cho thanh toán ví
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
    } else {
        // Gửi email xác nhận cho COD
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
    }

        // Chuyển hướng đến trang cảm ơn
        return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
            ->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
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
