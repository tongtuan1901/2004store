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
            <div class="card-body">
                <h2 class="card-title">Thông tin đơn hàng</h2>
                <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
                <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                <p><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} VND</p>
                <p><strong>Mã giảm giá:</strong> {{ $order->discount_code ?? 'Không có' }}</p>
                <p><strong>Giá trị giảm giá:</strong> {{ number_format($order->discount_value) ?? '0' }} VND</p>
                <p><strong>Sau khi giảm giá:</strong> {{ number_format($order->total-$order->discount_value) ?? '0' }} VND</p>

                <h2 class="card-title mt-4">Thông tin giao hàng</h2>
                <p><strong>Địa chỉ:</strong> {{ $order->address ?? 'Không có' }}</p>
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
                                            <a href="{{ route('orders.review', ['order' => $order->id]) }}" class="btn btn-outline-primary btn-sm">Đánh giá</a>
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
