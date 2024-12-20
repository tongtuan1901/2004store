@extends('Client.layouts.paginate.master')
@section('contentClient')

            <style>
                .coupon {
                    background: #fff;
                    padding: 15px;
                    margin: 10px 0;
                    border-radius: 5px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .coupon-code {
                    font-size: 18px;
                    font-weight: bold;
                    color: #333;
                }
            </style>
            <section class="bread-crumb margin-bottom-10">
                <div class="container">
                    <div id="alert-box" class="alert alert-success" style="display: none;"></div>
                    <div class="row">
                        
                        @foreach ($khuyenMai as $coupon)
                            <div class="col-sm-6">
                                <div class="coupon bg-white rounded mb-3 d-flex justify-content-between">
                                    <div class="kiri p-3">
                                        <div class="icon-container ">
                                            <div class="icon-container_box">
                                                <img src="https://magiamgia.com/wp-content/uploads/2020/12/fnal-logo.png"
                                                    width="85" alt="totoprayogo.com" class="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tengah py-3 d-flex w-100 justify-content-start">
                                        <div>
                                            {{-- <span class="badge badge-success">{{ $coupon->name }}</span> --}}
                                            <h3 class="lead">Mã: {{ $coupon->code }} <br> Giảm: {{number_format($coupon->value)}} 
                                            @if ($coupon->type == 'percentage')
                                                %
                                            @else
                                                VND
                                            @endif
                                            </h3>
                                            <p>Dành cho: {{$coupon->product->name}}</p>
                                        </div>
                                    </div>
                                    <div class="kanan">
                                        <div class="info m-3 d-flex align-items-center">
                                            <div class="w-500">
                                                <div class="block">
                                                    <span class="time font-weight-light">
                                                        <span>Còn {{ $coupon->days_remaining }} ngày</span>
                                                    </span>
                                                </div>
                                                <button class="btn btn-primary"
                                                    onclick="copyToClipboard('{{ $coupon->code }}')">Copy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </section>
    @endsection
    <script>
        function copyToClipboard(code) {
            navigator.clipboard.writeText(code).then(() => {
                const alertBox = document.getElementById('alert-box');
                alertBox.textContent = `Đã sao chép mã: ${code}`;
                alertBox.style.display = 'block';
                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 3000);
            }).catch(err => {
                console.error('Lỗi sao chép: ', err);
            });
        }
    </script>
