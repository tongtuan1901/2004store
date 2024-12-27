<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        .section { margin-bottom: 20px; }
        .section h3 { margin-bottom: 10px; color: #333; }
        .summary, .customer-info, .shipping-info { margin-top: 10px; }
        .summary table, .customer-info table, .shipping-info table { width: 100%; border-collapse: collapse; }
        .summary th, .summary td, .customer-info th, .customer-info td, .shipping-info th, .shipping-info td {
            padding: 8px; border: 1px solid #ddd; text-align: left;
        }
        .product-image { width: 50px; height: 50px; object-fit: cover; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cảm ơn bạn đã đặt hàng tại 2004Store!</h2>

        <!-- Mã đơn hàng và tổng cộng -->
        <div class="section">
            <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
            <p><strong>Tổng cộng:</strong> {{ number_format($order->total, 0, ',', '.') }}₫</p>
            @if(in_array($order->payment_method, ['vnpay', 'momo', 'wallet']))
        <span class="text-green-600 ml-2">(Đã thanh toán)</span>
    @endif
        </div>

        <!-- Thông tin chi tiết sản phẩm -->
        <div class="section summary">
            <h3>Chi tiết đơn hàng</h3>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Phân loại</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <!-- <th>Ảnh</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->variation->color->color ?? '' }} / {{ $item->variation->size->size ?? '' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                        <!-- <td>
                            @if ($item->variation->image)
                                <img src="{{ asset('storage/'.$item->variation->image->path) }}" alt="{{ $item->product->name }}" class="product-image">
                            @else
                                <p>Không có ảnh</p>
                            @endif
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Thông tin người mua -->
        <div class="section customer-info">
            <h3>Thông tin mua hàng</h3>
            @php
    $user = Auth::user();
@endphp
            <table>
                <tr><th>Họ tên:</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email:</th><td>{{ $user->email }}</td></tr>
                <tr><th>Số điện thoại:</th><td>{{ $user->phone_number }}</td></tr>
            </table>
        </div>

        <!-- Thông tin người nhận -->
        <div class="section shipping-info">
            <h3>Thông tin người nhận</h3>
            <table>
                <tr><th>Họ tên:</th><td>{{ $order->name }}</td></tr>
                <tr><th>Số điện thoại:</th><td>{{ $order->phone }}</td></tr>
                <tr><th>Địa chỉ:</th><td>{{ $order->house_address }}, {{ $order->street }}, {{ $order->city }}, {{ $order->state }}</td></tr>
            </table>
        </div>

        <!-- Phương thức thanh toán và vận chuyển -->
        <div class="section">
            <h3>Phương thức thanh toán</h3>
            <p>
                @switch($order->payment_method)
                    @case('momo')
                        Thanh toán qua MoMo
                        @break
                    @case('vnpay')
                        Thanh toán qua VNPAY
                        @break
                    @case('wallet')
                        Thanh toán qua Ví 
                        @break
                    @default
                        Thanh toán khi nhận hàng (COD)
                @endswitch
            </p>

            <h3>Phương thức vận chuyển</h3>
            <p>Giao hàng tận nơi</p>
        </div>
    </div>
</body>
</html>
