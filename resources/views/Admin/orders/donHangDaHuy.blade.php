@extends('Admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
                    <div class="sherah-dsinner">
                        <div class="sherah-page-inner sherah-default-bg mg-top-30">
                            <h3>Danh sách đơn hàng đã hủy</h3>

                            @if ($canceledOrders->isNotEmpty())
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Sản phẩm</th>
                                            <th>Trạng thái</th>
                                            <th>Email</th>
                                            <th>Số lượng</th>
                                            <th>Kích thước</th>
                                            <th>Màu sắc</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($canceledOrders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>
                                                    @foreach ($order->orderItems as $item)
                                                        <p>{{ $item->product->name ?? 'Không có tên sản phẩm' }}</p>
                                                    @endforeach
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>
                                                    @foreach ($order->orderItems as $item)
                                                        <p>{{ $item->quantity }}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($order->orderItems as $item)
                                                        {{ optional($item->variation->size)->size ?? 'Không có kích thước' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($order->orderItems as $item)
                                                        {{ optional($item->variation->color)->color ?? 'Không có màu sắc' }}
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Không có đơn hàng đã hủy.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection