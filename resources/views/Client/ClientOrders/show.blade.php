@extends('Client.layouts.paginate.master')

@section('contentClient')
<div class="container my-5">
    <h1 class="text-center mb-4 text-dark">Chi tiết đơn hàng</h1>

    @if($userOrder->orders->isNotEmpty())
        @php
            $order = $userOrder->orders->first();
        @endphp

        <!-- Thông tin khách hàng và địa chỉ -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-secondary text-white">
                <h4 class="m-0">Thông tin đơn hàng</h4>
            </div>
            <div class="card-body">
                <div class="row gy-4">
                    <!-- Địa chỉ nhận hàng -->
                    <div class="col-md-3">
                        <div class="border rounded p-3 h-100">
                            <h3 class="text-success mb-3"><i class="fa fa-truck"></i>Địa chỉ nhận hàng</h3>
                        <p><i class="fa fa-user text-success"></i> <strong>Tên:</strong> 
                            <span class="text-muted">{{ $order->name ?? 'Không có' }}</span>
                        </p>
                        <p><i class="fa fa-phone text-primary"></i> <strong>Số điện thoại:</strong> 
                            <span class="text-muted">{{ $order->phone_number ?? 'Không có' }}</span>
                        </p>
                        <p><i class="fa fa-map-marker-alt text-danger"></i> <strong>Địa chỉ giao hàng:</strong> 
                            <span class="text-muted">{{ $order->address ?? 'Không có' }}</span>
                        </p>
                        </div>
                    </div>

                    <!-- Trạng thái đơn hàng -->
                    <div class="col-md-9">
                        <div class="border rounded p-3 h-100">
                            <h3 class="text-warning mb-3"><i class="fa fa-info-circle"></i> Trạng thái đơn hàng</h3>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="status-item text-center">
                                    <i class="fa fa-clock text-warning fa-2x"></i>
                                    <p class="mt-2"><strong>Chờ xử lý</strong></p>
                                    <p class="text-muted">{{ $order->pending_time ?? 'Chưa cập nhật' }}</p>
                                </div>
                                <div class="status-item text-center">
                                    <i class="fa fa-cogs text-info fa-2x"></i>
                                    <p class="mt-2"><strong>Đang xử lý</strong></p>
                                    <p class="text-muted">{{ $order->processing_time ?? 'Chưa cập nhật' }}</p>
                                </div>
                                <div class="status-item text-center">
                                    <i class="fa fa-truck text-success fa-2x"></i>
                                    <p class="mt-2"><strong>Đang giao hàng</strong></p>
                                    <p class="text-muted">{{ $order->shipping_time ?? 'Chưa cập nhật' }}</p>
                                </div>
                                <div class="status-item text-center">
                                    <i class="fa fa-check-circle text-primary fa-2x"></i>
                                    <p class="mt-2"><strong>Hoàn thành</strong></p>
                                    <p class="text-muted">{{ $order->completed_time ?? 'Chưa cập nhật' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chi tiết sản phẩm -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-secondary text-white">
                <h4 class="m-0">Chi tiết sản phẩm</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Giá đã giảm</th>
                                @if($order->status == 'Hoàn thành')
                                    <th>Thao tác</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        @if ($item->variation && $item->variation->image)
                                            <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-fluid" style="max-width: 60px;">
                                        @else
                                            <span class="text-muted">Không có hình ảnh</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->variation->size->size ?? 'Không có' }}</td>
                                    <td>{{ $item->variation->color->color ?? 'Không có' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} VND</td>
                                    <td>{{ number_format($item->product->price_sale * $item->quantity, 0, ',', '.') }} VND</td>
                                    @if($order->status == 'Hoàn thành')
                                        <td>
                                            <a href="{{ route('client.product.review.form', ['order' => $order->id, 'product' => $item->product->id]) }}" class="btn btn-outline-secondary btn-sm">Đánh giá</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Bảng tổng tiền -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Tổng tiền</td>
                                <td class="text-end" style="width: 40%;">{{ number_format($item->product->price_sale * $item->quantity, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Phí vận chuyển</td>
                                <td class="text-end" style="width: 40%;">40.000 VND</td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Mã giảm giá</td>
                                <td class="text-end" style="width: 40%;">{{ $order->discount_code ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Giá trị giảm giá</td>
                                <td class="text-end" style="width: 40%;">{{ number_format($order->discount_value ?? 0, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Thành tiền</td>
                                <td class="text-end text-primary fw-bold" style="width: 40%;">{{ number_format(($order->total + $order->shipping_fee - $order->discount_value) ?? 0, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Phương thức thanh toán</td>
                                <td class="text-end text-info" style="width: 40%;">{{ $order->payment_method }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    @else
        <p class="alert alert-warning">Không có đơn hàng nào.</p>
    @endif

    <!-- Nút quay lại -->
    <div class="text-center mt-4">
        <a href="{{ route('client.order', ['userId' => $userOrder->id]) }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div>
@endsection
