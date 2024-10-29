@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="acc">
            <div class="container-fluid">
                <div class="acc-wrap">
                    <div class="acc-sidebar">
                        <span><img width="64" height="64"
                                src="https://ui-avatars.com/api/?name=Nguyen cong phuoc&font-size=.5" alt="Nguyen cong phuoc"
                                title="Nguyen cong phuoc" /></span>
                        <h3>Xin chào, <b>Nguyen cong phuoc</b></h3>
                        <ul>
                            <li><a href="/account" aria-label="Thông tin tài khoản" title="Thông tin tài khoản">Thông tin
                                    tài khoản</a></li>
                            <li><a href="/account/orders" aria-label="Đơn hàng của bạn" title="Đơn hàng của bạn">Đơn hàng
                                    của bạn</a></li>
                            <li><a href="/account/addresses" aria-label="Danh sách địa chỉ" title="Danh sách địa chỉ">Danh
                                    sách địa chỉ</a></li>
                            <li><a href="/account/changepassword" aria-label="Đổi mật khẩu" title="Đổi mật khẩu">Đổi mật
                                    khẩu</a></li>
                            <li><a href="/account/logout" aria-label="Đăng xuất" title="Đăng xuất">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <div class="acc-data">
                        <h1>Thông tin tài khoản</h1>
                        <!-- Name ================================================= -->
                        <p>
                            <strong>Họ tên:</strong>
                            Nguyen cong phuoc
                        </p>
                        <!-- Email ================================================= -->
                        <p>
                            <strong>Email:</strong>
                            cut0266@gmail.com
                        </p>
                        <!-- Phone ================================================= -->
                        <p>
                            <strong>Điện thoại:</strong>
                            +84961697384
                        </p>
                        <!-- Company ================================================= -->
                        <!-- Address ================================================= -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
