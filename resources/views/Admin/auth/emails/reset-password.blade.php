<!DOCTYPE html>
<html>
<head>
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h2>Xin chào!</h2>
    <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
    <p>Vui lòng click vào link bên dưới để đặt lại mật khẩu:</p>
    <a href="{{ route('admin.password.reset', $token) }}">Đặt lại mật khẩu</a>
    <p>Link đặt lại mật khẩu này sẽ hết hạn sau 60 phút.</p>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua email này.</p>
    <p>Trân trọng,</p>
    <p>2004Store</p>
</body>
</html>