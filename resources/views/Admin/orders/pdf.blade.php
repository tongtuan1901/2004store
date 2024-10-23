<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
        }

        h1,
        h2,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .badge {
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
        }

        .bg-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .bg-success {
            background-color: #28a745;
            color: #fff;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .product-image {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>Hóa đơn</h1>

    <div>
        <strong>ID Đơn Hàng:</strong> <span class="badge bg-secondary">{{ $order->id }}</span>
    </div>
    <div>
        <strong>Tên Khách Hàng:</strong> {{ $order->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $order->email }}
    </div>
    <div>
        <strong>Số Điện Thoại:</strong> {{ $order->phone }}
    </div>
    <div>
        <strong>Địa Chỉ:</strong> {{ $order->address }}
    </div>
    <div>
        <strong>Tổng Cộng:</strong>{{ number_format($order->total) }} VNĐ</span>
    </div>
    <div>
        <strong>Trạng Thái:</strong>{{ $order->status }}</span>
    </div>

    <h3>Sản Phẩm</h3>
    <table>
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->price) }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Thông Tin Khác</h3>
    <p><strong>Ngày Tạo Đơn:</strong> {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
    <p><strong>Ngày Cập Nhật:</strong> {{ $order->updated_at->format('d/m/Y H:i:s') }}</p>
</body>

</html>
