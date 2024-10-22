@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')
@section('content')
<div class="container">
    <h2>Thêm mã giảm giá</h2>

    <form action="{{ route('admin-coupons.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Mã giảm giá</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Số tiền giảm</label>
            <input type="number" step="0.01" class="form-control" id="value" name="value" value="{{ old('value') }}" required>
        </div>
        <div class="mb-3">
            <label for="starts_at" class="form-label">Thời gian bắt đầu</label>
            <input type="datetime-local" class="form-control" id="starts_at" name="starts_at" value="{{ old('starts_at') }}">
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">Thời gian kết thức</label>
            <input type="datetime-local" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
</div>
@endsection
@extends('Admin/layouts/master/footer')