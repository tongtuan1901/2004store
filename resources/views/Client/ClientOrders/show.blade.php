@extends('Client.layouts.paginate.master')

@section('contentClient')
<div class="container my-4">
    <h1 class="text-center mb-4">Chi tiết đơn hàng</h1>

    @if($userOrder->orders->isNotEmpty())
        @php
            $order = $userOrder->orders->first();
        @endphp

        <!-- Thông tin khách hàng và địa chỉ -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header text-center bg-primary text-white">
                <h2 class="m-0">Thông tin chi tiết đơn hàng</h2>
            </div>
            <div class="card-body">
                <div class="row text-center gy-4">
                    <!-- Thông tin đơn hàng -->
                    <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                            <h3 class="text-primary mb-3">Thông tin đơn hàng</h3>
                            <p><strong>Mã đơn hàng:</strong> <span class="text-dark">{{ $order->id }}</span></p>
                            <p><strong>Phương thức thanh toán:</strong> <span class="text-info">{{ $order->payment_method }}</span></p>
                            <p><strong>Tổng tiền:</strong> 
                                <span class="text-danger fw-bold">{{ number_format($order->total, 0, ',', '.') }} VND</span>
                            </p>
                            <p><strong>Mã giảm giá:</strong> 
                                <span class="badge bg-success">{{ $order->discount_code ?? 'Không có' }}</span>
                            </p>
                            <p><strong>Giá trị giảm giá:</strong> 
                                <span class="text-success">{{ number_format($order->discount_value ?? 0, 0, ',', '.') }} VND</span>
                            </p>
                            <p><strong>Sau khi giảm giá:</strong> 
                                <span class="text-primary fw-bold fs-5">{{ number_format(($order->total - $order->discount_value) ?? 0, 0, ',', '.') }} VND</span>
                            </p>
                        </div>
                    </div>
        
                    <!-- Trạng thái đơn hàng -->
                    <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                            <h3 class="text-warning mb-3">Trạng thái đơn hàng</h3>
                            <p><strong>Chờ xử lý:</strong> 
                                <span class="text-muted">{{ $order->pending_time ?? 'Chưa cập nhật' }}</span>
                            </p>
                            <p><strong>Đang xử lý:</strong> 
                                <span class="text-muted">{{ $order->processing_time ?? 'Chưa cập nhật' }}</span>
                            </p>
                            <p><strong>Đang giao hàng:</strong> 
                                <span class="text-muted">{{ $order->shipping_time ?? 'Chưa cập nhật' }}</span>
                            </p>
                            <p><strong>Hoàn thành:</strong> 
                                <span class="text-muted">{{ $order->completed_time ?? 'Chưa cập nhật' }}</span>
                            </p>
                        </div>
                    </div>
        
                    <!-- Thông tin giao hàng -->
                    <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                            <h3 class="text-success mb-3">Thông tin giao hàng</h3>
                            <p><strong>Địa chỉ giao hàng:</strong> 
                                <span class="text-muted">{{ $order->address ?? 'Không có' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        <!-- Chi tiết sản phẩm trong đơn hàng -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="card-title">Chi tiết sản phẩm</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                @if($order->status == 'Hoàn thành') <!-- Kiểm tra trạng thái -->
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
                                    @if($order->status == 'Hoàn thành') <!-- Kiểm tra trạng thái để hiển thị cột đánh giá -->
                                        <td>
                                            <a href="{{ route('client.product.review.form', ['order' => $order->id, 'product' => $item->product->id]) }}" class="btn btn-outline-primary btn-sm">Đánh giá</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
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
