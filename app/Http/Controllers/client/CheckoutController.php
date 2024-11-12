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
        // Lấy tổng tiền từ đơn hàng
        $amount = $order->total;

        // Cấu hình MoMo
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo cho đơn hàng #" . $order->id;
        $orderId = time() . "-" . uniqid();
        $redirectUrl = route('client-thankyou.index', ['order_id' => $order->id]);
        $ipnUrl = route('client-checkout');

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
        $vnp_Amount = $order->total * 100; // Đơn vị: đồng
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng.');
        }

        // Lấy giỏ hàng của người dùng
        $cart = Cart::where('user_id', $userId)
            ->with(['product', 'variation.size', 'variation.color', 'variation.image'])
            ->get();

        // Tính tổng giá trị giỏ hàng
        $totalPrice = 0;
        foreach ($cart as $item) {
            $price = $item->variation->price ?? $item->product->price;
            $totalPrice += $price * $item->quantity;
        }

        // Phí vận chuyển cố định
        $shippingFee = 40000;
        $finalTotal = $totalPrice + $shippingFee;

        // Tạo đơn hàng mới
        $order = new AdminOrder();
        $order->user_id = $userId;
        $order->email = auth()->user()->email;

        // Lấy địa chỉ người dùng từ request
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
            return redirect()->back()->with('error', 'Không tìm thấy địa chỉ người dùng.');
        }

        // Lấy tên khách hàng và số điện thoại
        $nameClient = $request->name_client ?: auth()->user()->name;
        $phoneNumber = $request->phone_number ?: $address->phone_number ?: auth()->user()->phone_number;
        if (!$phoneNumber) {
            return redirect()->back()->with('error', 'Không tìm thấy số điện thoại người dùng.');
        }

        // Lưu thông tin đơn hàng
        $order->total = $finalTotal;
        $order->status = 'Chờ xử lý';
        $order->name_client = $nameClient;
        $order->phone_number = $phoneNumber;
        $order->payment_method = $request->paymentMethod; // Lưu phương thức thanh toán
    
        // Check if payment method is wallet
        if ($request->paymentMethod == 'wallet') {
            $user = auth()->user();
            if ($user->balance < $finalTotal) {
                return redirect()->back()->with('error', 'Số dư trong ví không đủ');
            }
            // Deduct the amount from user's wallet
            $user->balance -= $finalTotal;
            $user->save();
        }
    
        $order->save();

        // Lưu các sản phẩm trong đơn hàng
        foreach ($cart as $item) {
            $productId = $item->product_id;
            $variationId = $item->variation_id;
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

        // Nếu phương thức thanh toán là MoMo, chuyển hướng tới cổng thanh toán MoMo
        if ($request->paymentMethod == 'momo') {
            return $this->momo_payment($order); // Gọi phương thức momo_payment
        } elseif ($request->paymentMethod == 'vnpay') {
            return $this->vnpay_payment($order); // Gọi phương thức vnpay_payment
        }


        // Nếu thanh toán bằng phương thức khác (chuyển khoản), gửi email và chuyển hướng tới trang cảm ơn
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
        return redirect()->route('client-thankyou.index', ['order_id' => $order->id])
            ->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }
    
}
