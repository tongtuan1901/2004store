@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')
@section('content')
<div class="container">
    <h1>Sửa đơn hàng</h1>

    <form action="{{ route('admin-orders.update', $adminOrder) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $adminOrder->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $adminOrder->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $adminOrder->phone }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea class="form-control" id="address" name="address" required>{{ $adminOrder->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Tổng</label>
            <input type="number" step="0.01" class="form-control" id="total" name="total" value="{{ $adminOrder->total }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $adminOrder->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
@extends('Admin/layouts/master/footer')