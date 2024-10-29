@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h2>Chỉnh Sửa khuyến mãi</h2>

    <form action="{{ route('admin-coupons.update', $admin_coupon->id) }}" method="POST" id="coupon-form">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục</label>
            <select class="form-control" id="category_id" name="category_id" required onchange="this.form.submit()">
                <option value="">-- Chọn Danh Mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $admin_coupon->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <form action="{{ route('admin-coupons.update', $admin_coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="category_id" value="{{ old('category_id', $admin_coupon->category_id) }}"> 
        <div class="mb-3">
            <label for="product_id" class="form-label">Sản Phẩm</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <option value="">-- Chọn Sản Phẩm --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $admin_coupon->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Mã Giảm Giá</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $admin_coupon->code) }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại</label>
            <select class="form-control" id="type" name="type" required>
                <option value="fixed" {{ $admin_coupon->type == 'fixed' ? 'selected' : '' }}>Giá trị cố định</option>
                <option value="percentage" {{ $admin_coupon->type == 'percentage' ? 'selected' : '' }}>Theo phần trăm</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Số Tiền Giảm</label>
            <input type="number" step="0.01" class="form-control" id="value" name="value" value="{{ old('value', $admin_coupon->value) }}" required>
        </div>
        <div class="mb-3">
            <label for="starts_at" class="form-label">Thời Gian Bắt Đầu</label>
            <input type="datetime-local" class="form-control" id="starts_at" name="starts_at" value="{{ old('starts_at', $admin_coupon->starts_at) }}" required>
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">Thời Gian Kết Thúc</label>
            <input type="datetime-local" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at', $admin_coupon->expires_at) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Mã Giảm Giá</button>
    </form>
</div>
@endsection

@extends('Admin/layouts/master/footer')
