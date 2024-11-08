@extends('Admin.layouts.master')

@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12 sherah-main__column">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="sherah-page-inner sherah-default-bg mg-top-30">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Thêm phần CSS trực tiếp vào đây -->
                                        <style>
                                            /* CSS cho phần danh sách đơn hàng */
                                            .sherah-adashboard {
                                                padding: 20px 0;
                                            }

                                            .sherah-body {
                                                background-color: #f9f9f9;
                                                padding: 20px;
                                                border-radius: 8px;
                                                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                            }

                                            .sherah-page-inner {
                                                background-color: #fff;
                                                padding: 20px;
                                                border-radius: 8px;
                                                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                            }

                                            h3 {
                                                font-size: 1.8rem;
                                                color: #333;
                                                margin-bottom: 20px;
                                            }

                                            .table {
                                                width: 100%;
                                                margin: 0;
                                                border-collapse: collapse;
                                                border: 1px solid #ddd;
                                            }

                                            .table th, .table td {
                                                padding: 12px 15px;
                                                text-align: left;
                                                vertical-align: middle;
                                                border-bottom: 1px solid #ddd;
                                            }

                                            .table th {
                                                background-color: #f1f1f1;
                                                font-weight: bold;
                                                color: #333;
                                            }

                                            .table tr:hover {
                                                background-color: #f9f9f9;
                                            }

                                            .table td a {
                                                color: #007bff;
                                                text-decoration: none;
                                                padding: 5px 10px;
                                                border-radius: 4px;
                                            }

                                            .table td a:hover {
                                                background-color: #007bff;
                                                color: #fff;
                                            }

                                            .table td form button {
                                                background-color: #e74c3c;
                                                color: #fff;
                                                padding: 6px 12px;
                                                border: none;
                                                border-radius: 4px;
                                                cursor: pointer;
                                                font-size: 0.875rem;
                                            }

                                            .table td form button:hover {
                                                background-color: #c0392b;
                                            }

                                            .table td p {
                                                margin: 0;
                                                color: #333;
                                                font-size: 0.875rem;
                                            }

                                            /* CSS cho thông báo khi không có đơn hàng */
                                            p {
                                                font-size: 1rem;
                                                color: #666;
                                            }
                                        </style>
                                    </div>
                                </div>
                                <h3>Danh sách đơn hàng đã hủy</h3>

                                @if ($donHangDaHuy->isNotEmpty())
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
                                            @foreach ($donHangDaHuy as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            <p>{{ $item->product->name }}</p>
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
                                                            @if ($item->variation)
                                                                <div>{{ $item->variation->size->size ?? 'Không có kích thước' }}</div>
                                                            @else
                                                                <div>Không có kích thước</div>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                    
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            @if ($item->variation)
                                                                <div>{{ $item->variation->color->color?? 'Không có màu sắc' }}</div>
                                                            @else
                                                                <div>Không có màu sắc</div>
                                                            @endif
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
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
