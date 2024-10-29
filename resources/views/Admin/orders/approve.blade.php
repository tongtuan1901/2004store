@extends('Admin/layouts/master/master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Duyệt Đơn Hàng</h2>
        </div>
        <div class="card-body">
            <h4>Thông Tin Đơn Hàng</h4>
            <div class="mb-3">
                <strong>ID Đơn Hàng:</strong> <span>{{ $order->id }}</span>
            </div>
            <div class="mb-3">
                <strong>Tên Khách Hàng:</strong> <span>{{ $order->name }}</span>
            </div>
            <div class="mb-3">
                <strong>Email:</strong> <span>{{ $order->email }}</span>
            </div>
            <div class="mb-3">
                <strong>Trạng Thái:</strong> <span>{{ $order->status }}</span>
            </div>

            <h4>Chi Tiết Sản Phẩm</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ number_format($product->price) }} VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('admin-orders.update-status', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Duyệt Đơn Hàng</button>
                <a href="{{ route('admin-orders.index') }}" class="btn btn-warning">Trở Lại</a>
            </form>
        </div>
    </div>
</div>
@endsection
