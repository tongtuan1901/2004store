@extends('Admin/layouts/master/master')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Danh Sách Đơn Hàng Cần Duyệt</h1>
    <a href="{{ route('admin-orders.deleted') }}" class="btn btn-danger mb-3">Xem Đơn Hàng Đã Xóa</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID Đơn Hàng</th> 
                <th>Tên Khách Hàng</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td> 
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('admin-orders.approve', $order->id) }}" class="btn btn-success">Duyệt</a>
                        <a href="{{ route('admin-orders.show', $order->id) }}" class="btn btn-info">Chi tiết</a>
                        <form action="{{ route('admin-orders.destroy', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
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
