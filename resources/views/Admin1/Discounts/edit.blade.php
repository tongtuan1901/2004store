@extends('Admin1.layouts.master')
@section('contentAdmin')

    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sherah-breadcrumb mg-top-30">
                                        <h2 class="sherah-breadcrumb__title">Thêm mới mã giảm giá</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                <form class="sherah-wc__form-main" action="{{ route('discount.update', $discount->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Mã giảm giá</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input" placeholder="Type here"
                                                                    type="text" name="code" value="{{ old('code', $discount->code) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Loại</label>
                                                            <div class="form-group__input">
                                                                <select class="form-group__input" name="type"
                                                                aria-label="Default select example" value="{{ old('type', $discount->type) }}">
                                                                <option value="fixed">Giá trị cố định</option>
                                                                <option value="percent">Phần trăm</option>  
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Giá trị</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input" placeholder="Type here"
                                                                    type="number" name="value" value="{{ old('value', $discount->value) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Giá trị đơn hàng tối thiểu</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input" placeholder="Type here"
                                                                    type="number" name="min_order_value" value="{{ old('min_order_value', $discount->min_order_value) }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Số lần sử dụng tối đa</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input" placeholder="Type here"
                                                                    type="number" name="max_usage" value="{{ old('max_usage', $discount->max_usage) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">ngày bắt đầu</label>
                                                            <input class="sherah-wc__form-input" placeholder="Type here"
                                                                    type="date" name="valid_from" value="{{ old('valid_from', $discount->valid_from) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Ngày kết thúc</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input" placeholder="Type here"
                                                                    type="date" name="valid_to" value="{{ old('valid_to', $discount->valid_to) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                        <button type="submit" class="sherah-btn sherah-btn__primary">Sửa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

