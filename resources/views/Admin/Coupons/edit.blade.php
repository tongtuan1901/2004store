
@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')
@section('content')
<div class="container">
    <h2>Sửa mã giảm giá</h2>
 
    <form action="{{ route('admin-coupons.update',$coupon->id) }}" method="POST">
        
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="code" class="form-label">Mã giảm giá</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $coupon->code) }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $coupon->type) }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Số tiền giảm</label>
            <input type="number" step="0.01" class="form-control" id="value" name="value" value="{{ old('value', $coupon->value) }}" required>
        </div>
        <div class="mb-3">
            <label for="starts_at" class="form-label">Thời gian bắt đầu</label>
            <input type="datetime-local" class="form-control" name="starts_at" id="starts_at" value="{{ date('Y-m-d\TH:i', strtotime($coupon->starts_at)) }}" required>
            <div class="mb-3">
            <label for="expires_at" class="form-label">Thời gian kết thúc</label>
            <input type="datetime-local" class="form-control" name="expires_at" id="expires_at" value="{{ date('Y-m-d\TH:i', strtotime($coupon->expires_at)) }}" required>
            </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
@endsection
@extends('Admin/layouts/master/footer')