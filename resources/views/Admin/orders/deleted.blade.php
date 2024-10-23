@extends('Admin/layouts/master/master')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Danh Sách Đơn Hàng Đã Xóa</h1>
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
            @foreach ($deletedOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td> 
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('admin-orders.restore', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn khôi phục đơn hàng này?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning">Khôi Phục</button>
                        </form>
                        <form action="{{ route('admin-orders.forceDelete', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn đơn hàng này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa Vĩnh Viễn</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
