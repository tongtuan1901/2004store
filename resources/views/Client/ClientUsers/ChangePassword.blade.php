@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="acc">
            <div class="container-fluid">
                <div class="acc-wrap">
                    <div class="acc-sidebar">
                        <span><img width="64" height="64"
                                src="https://ui-avatars.com/api/?nguyen cong phuoc&font-size=.5" alt="nguyen cong phuoc"
                                title="nguyen cong phuoc" /></span>
                        <h3>Xin chào, <b>nguyen cong phuoc</b></h3>
                        <ul>
                            <li><a href="/account" aria-label="Thông tin tài khoản" title="Thông tin tài khoản">Thông tin
                                    tài khoản</a></li>
                            <li><a href="/account/orders" aria-label="Đơn hàng của bạn" title="Đơn hàng của bạn">Đơn hàng
                                    của bạn</a></li>
                            <li><a href="/account/addresses" aria-label="Danh sách địa chỉ" title="Danh sách địa chỉ">Danh
                                    sách địa chỉ</a></li>
                            <li><a href="" aria-label="Đổi mật khẩu" title="Đổi mật khẩu">Đổi mật
                                    khẩu</a></li>
                            <li><a href="/account/logout" aria-label="Đăng xuất" title="Đăng xuất">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <div class="acc-data">
                        <h1>Đổi mật khẩu</h1>
                        <form method="post" action="" id="change_customer_password"
                            accept-charset="UTF-8"><input name="FormType" type="hidden"
                                value="change_customer_password" /><input name="utf8" type="hidden" value="true" />


                            <p>Để đảm bảo tính bảo mật bạn vui lòng đặt lại mật khẩu với ít nhất 8 kí tự</p>


                            <div class="form-signup clearfix row">
                                <fieldset class="form-group col-12">
                                    <label for="oldPass">Mật khẩu cũ <span class="error">*</span></label>
                                    <input type="password" name="OldPassword" id="OldPass" required
                                        class="form-control form-control-lg">
                                </fieldset>
                                <fieldset class="form-group col-12">
                                    <label for="changePass">Mật khẩu mới <span class="error">*</span></label>
                                    <input type="password" name="Password" id="changePass" required
                                        class="form-control form-control-lg">
                                </fieldset>
                                <fieldset class="form-group col-12">
                                    <label for="confirmPass">Xác nhận lại mật khẩu <span class="error">*</span></label>
                                    <input type="password" name="ConfirmPassword" id="confirmPass" required
                                        class="form-control form-control-lg">
                                </fieldset>
                            </div>
                            <button class="btn-edit-addr btn btn-primary" type="submit"
                                "><i class="hoverButton"></i>Đặt lại mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener("load", (event) => {
                resetForms();
            });
        </script>
    </main>
@endsection
