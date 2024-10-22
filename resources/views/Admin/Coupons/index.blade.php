@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h2>Danh Sách Mã Giảm Giá</h2>

    <a href="{{ route('admin-coupons.create') }}" class="btn btn-primary mb-3">Thêm Mã Giảm Giá</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Mã Giảm Giá</th>
                <th>Loại</th>
                <th>Số Tiền Giảm</th>
                <th>Danh Mục</th>
                <th>Sản Phẩm</th>
                <th>Thời Gian Bắt Đầu</th>
                <th>Thời Gian Kết Thúc</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td>{{ $coupon->category ? $coupon->category->name : 'N/A' }}</td>
                    <td>{{ $coupon->product ? $coupon->product->name : 'N/A' }}</td>
                    <td>{{ $coupon->starts_at }}</td>
                    <td>{{ $coupon->expires_at }}</td>
                    <td>
                        <a href="{{ route('admin-coupons.edit', $coupon->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                        <form action="{{ route('admin-coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('Admin/layouts/master/footer')
