@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="my-account-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                        <div id="auth-form">
                            <div class="auth-heading">
                                <i class="lar la-user"></i>
                                <h1>
                                    Đăng ký
                                </h1>
                            </div>
                            <div class="auth-form-body">
                                <div class="register-form-body">
                                    <form method="post" action="https://f1genz-model-fashion.mysapo.net/account/register"
                                        id="customer_register" accept-charset="UTF-8"><input name="FormType" type="hidden"
                                            value="customer_register" /><input name="utf8" type="hidden"
                                            value="true" /><input type="hidden"
                                            id="Token-b5ef2377fe6d46bd96a322bdea20d77e" name="Token" />
                                        <script src="../../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                                        <script>
                                            grecaptcha.ready(function() {
                                                grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                                    action: "customer_register"
                                                }).then(function(token) {
                                                    document.getElementById("Token-b5ef2377fe6d46bd96a322bdea20d77e").value = token
                                                });
                                            });
                                        </script>

                                        <div class="form-group">
                                            <label for="register-last-name">Họ của bạn*</label>
                                            <input type="text" id="register-last-name" class="form-control"
                                                name="lastName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-first-name">Tên của bạn*</label>
                                            <input type="text" id="register-first-name" class="form-control"
                                                name="firstName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-phone">Số điện thoại</label>
                                            <input type="number" id="register-phone" class="form-control" name="phone"
                                                pattern="\d+">
                                        </div>
                                        <div class="form-group">
                                            <label for="register-email">Email*</label>
                                            <input type="email" id="register-email" class="form-control" name="email"
                                                required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                        </div>
                                        <div class="form-group">
                                            <label for="register-password">Mật khẩu*</label>
                                            <input type="password" id="register-password" class="form-control"
                                                name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" title="Đăng ký">
                                                ĐĂNG KÝ
                                            </button>
                                        </div>
                                          <div class="auth-back-btn">
                                            <a href="{{route('client-login.index')}}" title="Đăng nhập">Đăng nhập</a>
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
