@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
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
                    <th>Trạng thái</th>
                    <th>Sản phẩm</th>
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
                        <td>{{ $order->status }}</td>
                        <td>
                            <ul>
                                @foreach ($order->products as $product)
                                    <li>{{ $product->name }} - Số lượng: {{ $product->pivot->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('admin-orders.edit', $order) }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ route('admin-orders.show', $order) }}" class="btn btn-info">Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

