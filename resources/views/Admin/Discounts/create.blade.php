@extends('Admin/layouts/master/master')

@section('content')

<div class="container">
    <h1>Tạo mã giảm giá</h1>

    <form action="{{ route('discount.store') }}" method="POST" class="p-4 border rounded">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Mã giảm giá:</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại:</label>
            <select name="type" class="form-select" required>
                <option value="fixed">Giá trị cố định</option>
                <option value="percent">Phần trăm</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Giá trị:</label>
            <input type="number" name="value" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="min_order_value" class="form-label">Giá trị đơn hàng tối thiểu:</label>
            <input type="number" name="min_order_value" step="0.01" class="form-control">
        </div>
        <div class="mb-3">
            <label for="max_usage" class="form-label">Số lần sử dụng tối đa:</label>
            <input type="number" name="max_usage" class="form-control">
        </div>
        <div class="mb-3">
            <label for="valid_from" class="form-label">Ngày bắt đầu:</label>
            <input type="date" name="valid_from" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="valid_to" class="form-label">Ngày kết thúc:</label>
            <input type="date" name="valid_to" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tạo</button>
    </form>
    
</div>

@endsection