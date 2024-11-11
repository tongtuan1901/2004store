@extends('Client.layouts.paginate.master')

@section('contentClient')
<section class="order-details">
    <div class="container">
        <!-- Nút trở lại -->
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('client.order', $order->id) }}" class="btn btn-primary">Trở lại trang đơn hàng</a>
            </div>
        </div> 
        <!-- Thông tin đơn hàng -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="order-info p-3 border rounded">
                    <h3>Thông tin đơn hàng</h3>
                    <p><strong>Mã đơn hàng:</strong> #{{ $order->id }}</p>
                    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('F j, Y') }} vào {{ $order->created_at->format('h:i A') }}</p>
                </div>
            </div>
        </div>

        <!-- Giải phân cách -->
        <hr class="custom-divider">

        <div class="row">
            <!-- Phần trái: Thông tin khách hàng và địa chỉ giao hàng gộp vào một bảng -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="customer-shipping-info p-3 border rounded mb-4">
                    <h3>Địa chỉ nhận hàng</h3>
                    <p><strong>Người nhận:</strong> {{ $order->name }}</p>
                    <p><strong>Điện thoại:</strong> {{ $order->user->phone_number }}</p>

                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                </div>
            </div>

            <!-- Phần phải: Trạng thái đơn hàng -->
            {{-- <div class="col-lg-6 col-md-6 col-12">
                <div class="order-summary p-3 border rounded">
                    <h3>Trạng thái đơn hàng</h3>
                    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                    <p class="sherah-table__product-desc">{{ $order->created_at }}</p>
                </div>
            </div> --}}
            {{-- <div class="col-lg-6 col-md-6 col-12">
                <div class="order-summary p-3 border rounded">
                    <h3>Trạng thái đơn hàng</h3>
                    
                    <div class="order-status">
                        <p><strong>Chờ xử lý:</strong> 
                            {{ $order->created_at ?? 'Chưa cập nhật' }}
                        </p>
                        <p><strong>Đang xử lý:</strong> 
                            {{ $order->created_at ?? 'Chưa cập nhật' }}
                        </p>
                        <p><strong>Đang giao hàng:</strong> 
                            {{ $order->created_at ?? 'Chưa cập nhật' }}
                        </p>
                        <p><strong>Hoàn thành:</strong> 
                            {{ $order->created_at ?? 'Chưa cập nhật' }}
                        </p>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-6 col-md-6 col-12">
                <div class="order-summary p-3 border rounded">
                    <h3>Trạng thái đơn hàng</h3>
                    
                    <div class="order-status">
                        <p><strong>Chờ xử lý:</strong> 
                            {{ $order->pending_time ?? 'Chưa cập nhật' }}
                        </p>
                        <p><strong>Đang xử lý:</strong> 
                            {{ $order->processing_time ?? 'Chưa cập nhật' }}
                        </p>
                        <p><strong>Đang giao hàng:</strong> 
                            {{ $order->shipping_time ?? 'Chưa cập nhật' }}
                        </p>
                        <p><strong>Hoàn thành:</strong> 
                            {{ $order->completed_time ?? 'Chưa cập nhật' }}
                        </p>
                    </div>
                </div>
            </div>
            
            
        </div>

        <!-- Giải phân cách -->
        <hr class="custom-divider">

        <!-- Phần dưới: Sản phẩm trong đơn hàng -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="order-items">
                    <h3>Sản phẩm trong đơn hàng</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Biến thể</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        @if ($item->variation && $item->variation->image)
                                            <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Product Image" width="50">
                                        @else
                                            <p>No image</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->variation)
                                            Kích thước: {{ $item->variation->size->size ?? 'N/A' }}<br>
                                            Màu sắc: {{ $item->variation->color->color ?? 'N/A' }}
                                        @else
                                            Không có biến thể
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->price) }} VNĐ</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Phần tổng tiền -->
<div class="row mt-4">
    <div class="col-12">
        <div class="order-total p-3 border rounded">
            <h3>Tổng tiền</h3>
            <table class="table">
                <tr>
                    <td><strong>Tổng cộng:</strong></td>
                    <td>{{ number_format($order->total) }} VNĐ</td>
                </tr>
                <tr>
                    <td><strong>Phí vận chuyển:</strong></td>
                    <td>{{ number_format($order->shipping_fee) }} VNĐ</td>
                </tr>
                <tr>
                    <td><strong>Giảm giá:</strong></td>
                    <td>{{ number_format($order->discount) }} VNĐ</td>
                </tr>
                <tr>
                    <td><strong>Tổng tiền thanh toán:</strong></td>
                    <td>{{ number_format($order->total - $order->discount + $order->shipping_fee) }} VNĐ</td>
                </tr>
                <!-- Dòng mới: Phương thức thanh toán -->
                <tr>
                    <td><strong>Phương thức thanh toán:</strong></td>
                    <td>{{ $order->payment_method }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
    </div>
</section>

<style>
    /* Tùy chỉnh giải phân cách thành nét đứt màu xanh và đỏ */
    hr.custom-divider {
        border: none;
        border-top: 2px dashed;
        border-image: linear-gradient(to right, #008000, #ff0000) 1;
        margin: 30px 0;
    }

    /* Cải thiện kiểu nút */
    .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        color: white;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Tùy chỉnh bảng sản phẩm */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    /* Cải thiện thông tin khách hàng và địa chỉ */
    .customer-shipping-info p {
        margin-bottom: 10px;
    }
</style>

@endsection
