<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h2>Cảm ơn bạn đã đặt hàng tại 2004Store!</h2>
    <p>Mã đơn hàng của bạn: {{ $order->id }}</p>
    <p>Tổng cộng: {{ number_format($order->total, 0, ',', '.') }}₫</p>
    <!-- Thêm các thông tin chi tiết về đơn hàng -->
</body>
</html>
