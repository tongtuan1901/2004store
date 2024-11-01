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
                                <!-- Breadcrumb -->
                                <div class="sherah-breadcrumb">
                                    <h2 class="sherah-breadcrumb__title">Danh sách đơn hàng đã xóa</h2>
                                </div>
                                <!-- End Breadcrumb -->
                                <a href="{{ route('admin-orders.index') }}" class="sherah-btn sherah-gbcolor">Quay lại danh sách đơn hàng</a>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                            <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                <!-- Table Head -->
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1">Order ID</th>
                                        <th class="sherah-table__column-2">Customer Name</th>
                                        <th class="sherah-table__column-3">Email</th>
                                        <th class="sherah-table__column-4">Order Status</th>
                                        <th class="sherah-table__column-5">Action</th>
                                    </tr>
                                </thead>

                                <!-- Table Body -->
                                <tbody class="sherah-table__body">
                                    @foreach ($deletedOrders as $order)
                                    <tr>
                                        <td class="sherah-table__column-1">{{ $order->id }}</td>
                                        <td class="sherah-table__column-2">{{ $order->name }}</td>
                                        <td class="sherah-table__column-3">{{ $order->email }}</td>
                                        <td class="sherah-table__column-4">
                                            <div class="sherah-table__status sherah-color4 sherah-color4__bg--opacity">
                                                {{ $order->status }}
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-5">
                                            <div class="sherah-table__status__group">
                                                <form action="{{ route('admin-orders.restore', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn khôi phục đơn hàng này?');">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="sherah-table__action sherah-color2 sherah-color3__bg--opacity">
                                                        Khôi Phục
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin-orders.forceDelete', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn đơn hàng này?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="sherah-table__action sherah-color2 sherah-color2__bg--offset">
                                                        Xóa Vĩnh Viễn
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
