@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <h1>Danh sách đơn hàng</h1>
        <a href="{{ route('admin-orders.index') }}" class="btn btn-primary">Quay lai</a>
        <a href="{{ route('order.approved') }}" class="btn btn-primary">Don da duyet</a>
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
                        <td> {{ $order->status }}</td>
                        <td>
                            <ul>
                                @foreach ($order->products as $product)
                                    <li>{{ $product->name }} - Số lượng: {{ $product->pivot->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form action="{{ route('order.approve', $order->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success">Duyet</button>
                            </form>
                            <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Huy</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

