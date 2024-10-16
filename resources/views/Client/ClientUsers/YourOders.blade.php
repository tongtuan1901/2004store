@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="acc">
            <div class="container-fluid">
                <div class="acc-wrap">
                    <div class="acc-sidebar">
                        <span><img width="64" height="64"
                                src="https://ui-avatars.com/api/?name=nguyen cong phuoci&font-size=.5" alt="nguyen cong phuoc"
                                title="nguyen cong phuoc" /></span>
                        <h3>Xin chào, <b>nguyen cong phuoc</b></h3>
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
                    <div class="acc-data acc-data-orders">
                        <h1 class="title-head margin-top-0">Đơn hàng của bạn</h1>
                        <p>
                            Bạn chưa có đơn hàng nào, <a href="/collections/all" title="Tiếp tục mua sắm">mua sắm ngay và
                                nhận thật nhiều ưu đãi hấp dẫn bạn nhé.</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
