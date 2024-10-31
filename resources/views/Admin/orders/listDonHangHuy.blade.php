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
                    <th>ID Đơn Hàng</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donHangBiHuy as $donHangBiHuys)
                    <tr>
                        <td>{{ $donHangBiHuys->id }}</td>
                        <td>{{ $donHangBiHuys->name }}</td>
                        <td>{{ $donHangBiHuys->email }}</td>
                        <td>{{ $donHangBiHuys->phone }}</td>
                        <td >{{ $donHangBiHuys->address }}</td>
                        <td style="color: red">{{ $donHangBiHuys->status }}</td>
                        <td>
                            {{ $donHangBiHuys->product ? $donHangBiHuys->product->name : 'Sản phẩm không tồn tại' }}
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
