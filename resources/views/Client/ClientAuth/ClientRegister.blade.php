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
                                @if (session('success'))
                                    <div id="successMessage" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div id="errorMessage" class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="post" action="{{ route('client-register.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-name">Họ và tên*</label>
                                        <input type="text" id="register-name" class="form-control" name="name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-email">Email*</label>
                                        <input type="email" id="register-email" class="form-control" name="email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-phone">Số điện thoại</label>
                                        <input type="text" id="register-phone" class="form-control" name="phone_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-password">Mật khẩu*</label>
                                        <input type="password" id="register-password" class="form-control" name="password"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Nhập lại mật khẩu</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">ĐĂNG KÝ</button>
                                    </div>

                                    <div class="form-group text-center">
                                        <a href="{{ route('client-password.reset') }}" class="btn btn-link">Quên mật
                                            khẩu?</a>
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none'; // Ẩn thông báo sau 5 giây
                }, 5000);
            }

            const errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none'; // Ẩn thông báo lỗi sau 5 giây
                }, 5000);
            }
        });
    </script>
@endsection
