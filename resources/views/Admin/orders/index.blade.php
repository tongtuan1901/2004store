@extends('Admin.layouts.master')
@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <!-- Sherah Breadcrumb -->
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Danh sách đơn hàng</h2>
                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                    <a href="{{ route('admin-orders.create') }}" class="sherah-btn sherah-gbcolor">Thêm đơn hàng mới</a>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    <!-- sherah Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                            <th class="sherah-table__column-1 sherah-table__h1">Order ID</th>
                                            <th class="sherah-table__column-2 sherah-table__h2">Tên khách hàng</th>
                                            <th class="sherah-table__column-3 sherah-table__h3">Email</th>
                                            <th class="sherah-table__column-4 sherah-table__h4">Số điện thoại</th>
                                            <th class="sherah-table__column-5 sherah-table__h5">Địa chỉ</th>
                                            <th class="sherah-table__column-6 sherah-table__h6">Trạng thái</th>
                                            <th class="sherah-table__column-7 sherah-table__h7">Sản phẩm</th>
                                            <th class="sherah-table__column-8 sherah-table__h8">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sherah-table__body">
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="#" class="sherah-color1">#{{ $order->id }}</a>
                                                    </p>
                                                </td>
                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                    <p class="sherah-table__product-desc">{{ $order->name }}</p>
                                                </td>
                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                    <p class="sherah-table__product-desc">{{ $order->email }}</p>
                                                </td>
                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                    <p class="sherah-table__product-desc">{{ $order->phone }}</p>
                                                </td>
                                                <td class="sherah-table__column-5 sherah-table__data-5">
                                                    <p class="sherah-table__product-desc">{{ $order->address }}</p>
                                                </td>
                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                    <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">
                                                        {{ $order->status }}
                                                    </div>
                                                </td>
                                                <td class="sherah-table__column-7 sherah-table__data-7">
                                                    <ul>
                                                        @foreach ($order->products as $product)
                                                            <li>{{ $product->name }} - Số lượng: {{ $product->pivot->quantity }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="sherah-table__column-8 sherah-table__data-8">
                                                    <div class="sherah-table__status__group">
                                                        <a href="{{ route('admin-orders.edit', $order) }}" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">Sửa</a>
                                                        <a href="{{ route('admin-orders.show', $order) }}" class="sherah-table__action sherah-color2 sherah-color2__bg--offset">Chi tiết</a>
                                                        @if ($order->status === 'Chờ xử lý')
                                                            <a href="{{ route('admin-orders.approve', $order->id) }}" class="sherah-table__action sherah-color1 sherah-color1__bg--opactity">Duyệt</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
