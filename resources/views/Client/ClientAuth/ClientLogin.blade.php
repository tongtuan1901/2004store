@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="my-account-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                        <div id="auth-form" class="login-layout">
                            <div class="auth-heading">
                                <i class="lar la-user"></i>
                                <h1>
                                    <span class="login-form-heading">Đăng nhập</span>
                                    {{-- <span class="recover-form-heading">Quên mật khẩu</span> --}}
                                </h1>
                            </div>
                            <div class="auth-form-body">
                                <div class="login-form-body">
                                    <form method="post" action=""
                                        id="customer_login" accept-charset="UTF-8"><input name="FormType" type="hidden"
                                            value="customer_login" /><input name="utf8" type="hidden" value="true" />
                                        <div class="form-group">
                                            <label for="login-email">Email*</label>
                                            <input type="email" id="login-email" class="form-control" name="email"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="login-password">Mật khẩu*</label>
                                            <input type="password" id="login-password" class="form-control" name="password"
                                                required>
                                        </div>
                                        <div class="auth-recover-btn">
                                            <a href="" data-layout="recover-layout" class="auth-layout-trigger"
                                                title="Quên mật khẩu">Quên mật khẩu?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" title="Đăng nhập">
                                                ĐĂNG NHẬP
                                            </button>
                                            <a title="Đăng nhập Facebook" href="javascript:void(0)"
                                                class="social-login--facebook" onclick="loginFacebook()"><img width="129"
                                                    height="37" alt="facebook-login-button"
                                                    src="http://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                                            <a title="Đăng nhập Google" href="javascript:void(0)"
                                                class="social-login--google" onclick="loginGoogle()"><img width="129"
                                                    height="37" alt="google-login-button"
                                                    src="http://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                                        </div>
                                        <div class="auth-back-btn">
                                            <a title="Đăng ký" href="{{route('client-register.index')}}" title="Đăng ký">Đăng ký</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
