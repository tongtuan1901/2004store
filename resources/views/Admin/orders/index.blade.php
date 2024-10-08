@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')
@section('content')
<div class="container">
    <h1>Danh sách đơn hàng</h1>
    <a href="{{ route('admin-orders.create') }}" class="btn btn-primary">Thêm đơn hàng mới</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('admin-orders.edit', $order) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin-orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('Admin/layouts/master/footer')