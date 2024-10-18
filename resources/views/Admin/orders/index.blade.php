@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <h1>Danh sách đơn hàng</h1>

        <!-- Form lọc trạng thái -->
        <div class="mb-2 w-44">
        <form method="GET" action="{{ route('admin-orders.index') }}" class="mb-3" id="filterForm">
            <div class="form-group">
                <select name="status" id="status" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700" onchange="this.form.submit()"> <!-- Tự động submit form khi thay đổi -->
                    <option value="">Tất cả</option>
                    <option value="Chờ xử lý   " {{ request('status') == 'Chờ xử lý   ' ? 'selected' : '' }}>Chờ xử lý   </option>
                    <option value="Đã xử lý    " {{ request('status') == 'Đã xử lý    ' ? 'selected' : '' }}>Đã xử lý    </option>
                    <option value="Đã giao hàng" {{ request('status') == 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                    <option value="Đã nhận hàng" {{ request('status') == 'Đã nhận hàng' ? 'selected' : '' }}>Đã nhận hàng</option>
                </select>
            </div>
        </form>
        </div>

        <a href="{{ route('admin-orders.create') }}" class="btn btn-primary mb-3">Thêm đơn hàng mới</a>

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
