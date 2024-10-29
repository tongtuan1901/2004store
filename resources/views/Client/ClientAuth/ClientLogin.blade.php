@extends('Client.layouts.paginate.master')

@section('contentClient')
<main class="main-layout">
    <div class="my-account-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                    <div id="auth-form">
                        <div class="auth-heading">
                            <h1>Đăng nhập</h1>
                        </div>
                        <div class="auth-form-body">
                            <form method="post" action="{{ route('client-login.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="login-email">Email*</label>
                                    <input type="email" id="login-email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="login-password">Mật khẩu*</label>
                                    <input type="password" id="login-password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">ĐĂNG NHẬP</button>
                                </div>
                                <div class="auth-back-btn">
                                    <a href="{{ route('client-register.index') }}">Đăng ký</a>
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
