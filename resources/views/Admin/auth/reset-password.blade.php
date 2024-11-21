<!DOCTYPE html>
<html class="no-js" lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đặt lại mật khẩu - Store2004</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>
<body>
<section class="sherah-wc sherah-wc__full sherah-bg-cover">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6 col-md-6 col-12 sherah-wc-col-one">
                <div class="sherah-wc__inner">
                    <div class="sherah-wc__middle">
                        <a href=""><img src="{{ asset('assets/images/2004Store.png') }}" alt="#" style="padding-top:150px"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 sherah-wc-col-two">
                <div class="sherah-wc__form">
                    <div class="sherah-wc__form-inner">
                        <h3 class="sherah-wc__form-title">Đặt lại mật khẩu <span>Vui lòng nhập mật khẩu mới của bạn</span></h3>
                        <form class="sherah-wc__form-main" action="{{ route('admin.password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-group">
                                <label class="sherah-wc__form-label">Mật khẩu mới</label>
                                <div class="form-group__input">
                                    <input class="sherah-wc__form-input" type="password" name="password" required>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="sherah-wc__form-label">Xác nhận mật khẩu</label>
                                <div class="form-group__input">
                                    <input class="sherah-wc__form-input" type="password" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group form-mg-top25">
                                <div class="sherah-wc__button sherah-wc__button--bottom">
                                <button type="submit" class="ntfmax-wc__btn">Đặt lại mật khẩu</button>
                                </div>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>