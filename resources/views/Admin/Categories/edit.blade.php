@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h1>Chỉnh sửa mã giảm giá</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin-coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ $coupon->code }}" required>
        </div>
        
        <div class="form-group">
            <label for="type">Loại</label>
            <input type="text" class="form-control" name="type" id="type" value="{{ $coupon->type }}" required>
        </div>
        
        <div class="form-group">
            <label for="value">Giá trị</label>
            <input type="number" class="form-control" name="value" id="value" step="0.01" value="{{ $coupon->value }}" required>
        </div>

        <div class="form-group">
            <label for="starts_at">Ngày bắt đầu</label>
            <input type="datetime-local" class="form-control" name="starts_at" id="starts_at" value="{{ $coupon->starts_at->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="expires_at">Ngày kết thúc</label>
            <input type="datetime-local" class="form-control" name="expires_at" id="expires_at" value="{{ $coupon->expires_at->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
    </form>
</div>

@endsection
