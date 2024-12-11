<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.5;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .info-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }
        .info-box {
            flex: 1;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .info-box h2 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            text-align: center;
        }
        .details p {
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Chi tiết đơn hàng</h1>
            <p>Đơn hàng #{{ $order->id }} - Ngày đặt: {{ $order->created_at->format('d/m/Y') }}</p>
        </div>

        <!-- Thông tin người nhận và người đặt hàng -->
        <div class="info-container">
            <!-- Người nhận -->
            <div class="info-box">
                <h2>Thông tin người nhận</h2>
                <p><strong>Tên:</strong> {{ $order->name }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
            </div>
            <!-- Người đặt -->
            <div class="info-box">
                <h2>Thông tin người đặt hàng</h2>
                <p><strong>Tên:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->user->phone_number }}</p>
            </div>
        </div>

        <!-- Chi tiết sản phẩm -->
        <div class="section">
            <h2 class="section-title">Chi tiết sản phẩm</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Biến Thể</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                @if ($item->variation && $item->variation->image)
                                    <img src="{{ public_path('storage/' . $item->variation->image->image_path) }}" alt="Hình ảnh" width="50">
                                @else
                                    Không có hình ảnh
                                @endif
                            </td>
                            <td>
                                @if ($item->variation)
                                    Kích thước: {{ $item->variation->size->size ?? 'N/A' }},
                                    Màu sắc: {{ $item->variation->color->color ?? 'N/A' }}
                                @else
                                    Không có biến thể
                                @endif
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price) }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="order-totals">
                    <p><strong>Tổng cộng:</strong> {{ number_format($order->total - $order->discount_value) }} VNĐ</p>
                    @if ($order->discount_value > 0)
                        <p><strong>Mã giảm giá:</strong> {{ $order->discount_code }}</p>
                    @endif
                </div>
            </table>
        </div>
    </div>
</body>
</html>
