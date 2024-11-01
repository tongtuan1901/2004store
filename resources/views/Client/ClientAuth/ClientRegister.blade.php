@extends('Client.layouts.paginate.master')

@section('contentClient')
<main class="main-layout">
    <div class="my-account-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                    <div id="auth-form">
                        <div class="auth-heading">
                            <h1>Đăng ký</h1>
                        </div>
                        <div class="auth-form-body">
                            <form method="post" action="{{ route('client-register.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="register-name">Họ và tên*</label>
                                    <input type="text" id="register-name" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-email">Email*</label>
                                    <input type="email" id="register-email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-phone">Số điện thoại</label>
                                    <input type="text" id="register-phone" class="form-control" name="phone_number">
                                </div>
                                <div class="form-group">
                                    <label for="register-password">Mật khẩu*</label>
                                    <input type="password" id="register-password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">ĐĂNG KÝ</button>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{ route('client-password.reset') }}" class="btn btn-link">Quên mật khẩu?</a>
                                </div>
                                <div class="auth-back-btn">
                                    <a href="{{ route('client-login.index') }}">Đăng nhập</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
