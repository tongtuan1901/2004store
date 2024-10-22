@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')
@section('content')
<div class="container">
    <h1>Quản lý mã giảm giá</h1>
    <a href="{{ route('admin-coupons.create') }}" class="btn btn-primary">Tạo mã giảm giá mới</a>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Mã giảm giá</th>
                <th>Loại </th>
                <th>Số tiền giảm</th>
                <th>Thời Gian Bắt đầu</th>
                <th>Thời Gian Kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
            <tr>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->type }}</td>
                <td>{{ $coupon->value }}</td>
                <td>{{ $coupon->starts_at }}</td>
                <td>{{ $coupon->expires_at }}</td>
                <td>
                    <a href="{{ route('admin-coupons.edit', $coupon->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                    <form action="{{ route('admin-coupons.destroy', $coupon->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('Admin/layouts/master/footer')