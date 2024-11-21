<!DOCTYPE html>
<html class="no-js" lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quên mật khẩu Admin Store2004</title>
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
                        <h3 class="sherah-wc__form-title sherah-wc__form-title__one">Quên mật khẩu admin <span>Vui lòng nhập email của bạn để nhận liên kết đặt lại mật khẩu.</span></h3>
                        
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <form class="sherah-wc__form-main p-0" action="{{ route('admin.password.email') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="sherah-wc__form-label">Email</label>
                                <div class="form-group__input">
                                    <input class="sherah-wc__form-input" type="email" name="email" placeholder="demo3243@gmail.com" required="required">
                                </div>
                            </div>
                            <div class="form-group form-mg-top25">
                                <div class="sherah-wc__button sherah-wc__button--bottom">
                                    <button class="ntfmax-wc__btn" type="submit">Gửi mật khẩu về email</button>
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