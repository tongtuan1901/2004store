@extends('Admin/layouts/master/master')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Sửa mã giảm giá</h1>

    <form action="{{ route('discount.update', $discount->id) }}" method="POST" class="p-4 border rounded bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="code" class="form-label">Mã giảm giá:</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $discount->code) }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại:</label>
            <select name="type" class="form-select" required>
                <option value="fixed" {{ $discount->type == 'fixed' ? 'selected' : '' }}>Giá trị cố định</option>
                <option value="percent" {{ $discount->type == 'percent' ? 'selected' : '' }}>Phần trăm</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Giá trị:</label>
            <input type="number" name="value" class="form-control" step="0.01" value="{{ old('value', $discount->value) }}" required>
        </div>
        <div class="mb-3">
            <label for="min_order_value" class="form-label">Giá trị đơn hàng tối thiểu:</label>
            <input type="number" name="min_order_value" class="form-control" step="0.01" value="{{ old('min_order_value', $discount->min_order_value) }}">
        </div>
        <div class="mb-3">
            <label for="max_usage" class="form-label">Số lần sử dụng tối đa:</label>
            <input type="number" name="max_usage" class="form-control" value="{{ old('max_usage', $discount->max_usage) }}">
        </div>
        <div class="mb-3">
            <label for="valid_from" class="form-label">Ngày bắt đầu:</label>
            <input type="date" name="valid_from" class="form-control" value="{{ old('valid_from', $discount->valid_from) }}" required>
        </div>
        <div class="mb-3">
            <label for="valid_to" class="form-label">Ngày kết thúc:</label>
            <input type="date" name="valid_to" class="form-control" value="{{ old('valid_to', $discount->valid_to) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@endsection