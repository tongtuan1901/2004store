@extends('Client.layouts.paginate.master')

@section('contentClient')
<main class="main-layout">
    <div class="my-account-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                    <div id="auth-form">
                        <div class="auth-heading">
                            <h1>Đổi mật khẩu</h1>
                        </div>
                        <div class="auth-form-body">
                            @if(session('error'))
                                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('client-password.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="current-password">Mật khẩu hiện tại*</label>
                                    <input type="password" id="current-password" class="form-control" name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new-password">Mật khẩu mới*</label>
                                    <input type="password" id="new-password" class="form-control" name="new_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new-password-confirm">Xác nhận mật khẩu mới*</label>
                                    <input type="password" id="new-password-confirm" class="form-control" name="new_password_confirmation" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">CẬP NHẬT MẬT KHẨU</button>
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
