@extends('Admin.layouts.master')
@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">

            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
                    






            <div class="col-12">
                <div class="sherah-body">
                    <!-- Dashboard Inner -->
                    <div class="sherah-dsinner">
                        <div class="row">
                            <div class="col-12">
                                <div class="sherah-breadcrumb mt-4 mb-3">
                                    <h2 class="sherah-breadcrumb__title">Thêm khuyến mãi mới</h2>
                                </div>
                            </div>
                        </div>
                        <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg p-4 rounded">
                            <!-- First Form for Selecting Category -->
                            <form action="{{ route('admin-coupons.update', $admin_coupon->id) }}" method="get" class="mb-4">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="sherah-wc__form-label fw-bold">Danh mục</label>
                                    <select class="form-select" id="category_id" name="category_id" onchange="this.form.submit()">
                                        <option selected disabled>Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $admin_coupon->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>

                            <!-- Main Coupon Creation Form -->
                            <form class="sherah-wc__form-main" action="{{ route('admin-coupons.update', $admin_coupon->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="category_id" value="{{ old('category_id', $admin_coupon->category_id) }}">

                                <div class="row g-4">
                                    <!-- Product Selection -->
                                    <div class="col-lg-6 col-md-12">
                                        <label class="sherah-wc__form-label fw-bold">Sản phẩm</label>
                                        <select class="form-select" id="product_id" name="product_id">
                                            <option selected disabled>Chọn sản phẩm</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{ $admin_coupon->product_id == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Coupon Code Input -->
                                    <div class="col-lg-6 col-md-12">
                                        <label class="sherah-wc__form-label fw-bold">Mã khuyến mãi</label>
                                        <input class="form-control" value="{{ old('code', $admin_coupon->code) }}" placeholder="Nhập mã khuyến mãi" id="code" name="code">
                                    </div>

                                    <!-- Discount Type Selection -->
                                    <div class="col-lg-6 col-md-12">
                                        <label class="sherah-wc__form-label fw-bold">Loại</label>
                                        <select class="form-select" id="type" name="type">
                                            <option value="fixed" {{ $admin_coupon->type == 'fixed' ? 'selected' : '' }}>Giá trị cố định</option>
                                            <option value="percentage" {{ $admin_coupon->type == 'percentage' ? 'selected' : '' }}>Theo phần trăm</option>
                                        </select>
                                    </div>

                                    <!-- Discount Amount Input -->
                                    <div class="col-lg-6 col-md-12">
                                        <label class="sherah-wc__form-label fw-bold">Số Tiền Giảm</label>
                                        <input class="form-control" value="{{ old('value', $admin_coupon->value) }}" placeholder="Nhập số tiền giảm" type="number" id="value" name="value">
                                    </div>

                                    <!-- Start Date Input -->
                                    <div class="col-lg-6 col-md-12">
                                        <label class="sherah-wc__form-label fw-bold">Ngày Bắt Đầu</label>
                                        <input class="form-control" type="datetime-local" id="starts_at" name="starts_at" value="{{ old('starts_at', $admin_coupon->starts_at) }}">
                                    </div>

                                    <!-- Expiration Date Input -->
                                    <div class="col-lg-6 col-md-12">
                                        <label class="sherah-wc__form-label fw-bold">Ngày Kết Thúc</label>
                                        <input class="form-control" type="datetime-local" id="expires_at" name="expires_at" value="{{ old('expires_at', $admin_coupon->expires_at) }}">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4 py-2">Tạo</button>
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


</section>
@endsection

