@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h1>Tạo mã giảm giá mới</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin-coupons.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Mã</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}" required>
        </div>
        
        <div class="form-group">
            <label for="type">Loại</label>
            <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}" required>
        </div>
        
        <div class="form-group">
            <label for="value">Giá trị</label>
            <input type="number" class="form-control" name="value" id="value" step="0.01" value="{{ old('value') }}" required>
        </div>

        <div class="form-group">
            <label for="starts_at">Ngày bắt đầu</label>
            <input type="datetime-local" class="form-control" name="starts_at" id="starts_at" value="{{ old('starts_at') }}" required>
        </div>

        <div class="form-group">
            <label for="expires_at">Ngày kết thúc</label>
            <input type="datetime-local" class="form-control" name="expires_at" id="expires_at" value="{{ old('expires_at') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
    </form>
</div>

@endsection
