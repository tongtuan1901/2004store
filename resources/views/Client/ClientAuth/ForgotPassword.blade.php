@extends('Client.layouts.paginate.master')

@section('contentClient')
<main class="main-layout">
    <div class="my-account-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                    <div id="auth-form">
                        <div class="auth-heading">
                            <h1>Quên mật khẩu</h1>
                        </div>
                        <div class="auth-form-body">
                            <form method="post" action="{{ route('client-password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="reset-email">Email*</label>
                                    <input type="email" id="reset-email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Gửi mật khẩu mới</button>
                                </div>
                            </form>
                            @if(session('success'))
                                <!-- <div class="alert alert-success">{{ session('success') }}</div> -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
