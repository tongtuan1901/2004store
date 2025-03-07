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
                        <!-- <p><i class="fa fa-user text-success"></i> <strong>Tài khoản:</strong> 
                            <span class="text-muted">{{ $order->user->name ?? 'Không có' }}</span>
                        </p> -->
                        <p><i class="fa fa-user text-success"></i> <strong>Tên người nhận:</strong> 
                            <span class="text-muted">{{ $order->name ?? 'Không có' }}</span>
                        </p>
                        <p><i class="fa fa-phone text-primary"></i> <strong>Số điện thoại:</strong> 
                            <span class="text-muted">{{ $order->phone_number ?? 'Không có' }}</span>
                        </p>
                        <!-- <p><i class="fa fa-envelope text-dark"></i> <strong>Email:</strong> 
                            <span class="text-muted">{{ $order->email ?? 'Không có' }}</span>
                        </p> -->
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
                                    @if ($order->status == 'Hủy')
                                    <p class="mt-2"><strong>Đơn hàng đã hủy</strong></p>
                                    <p class="text-muted">{{ $order->updated_at ?? 'Chưa cập nhật' }}</p>
                                    @else
                                    <p class="mt-2"><strong>Chờ xử lý</strong></p>
                                    <p class="text-muted">{{ $order->created_at ?? 'Chưa cập nhật' }}</p>
                                    @endif
                                    
                                    
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
                                    <i class="fa-solid fa-people-carry-box fa-2x"></i>
                                    <p class="mt-2"><strong>Đã giao hàng</strong></p>
                                    <p class="text-muted">{{ $order->delivered_time ?? 'Chưa cập nhật' }}</p>
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
                    <table class="table table-bordered table-hover" border="1" style="table-layout: fixed; width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th style="width:5%">STT</th>
                                <th style="width:10%">Mã đơn hàng</th>
                                <th>Sản phẩm</th>
                                <th style="width:10%">Hình ảnh</th>
                                <th>Biến thể</th>
                                <th style="width:15%">Giá</th>
                                <!-- <th>Giá đã giảm</th> -->
                                @if($order->status == 'Hoàn thành')
                                    <th style="width:9%">Thao tác</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" 
                                            alt="{{ $item->product_name }}" 
                                            class="img-thumbnail" 
                                            style="max-width: 50px;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    <div>Size: {{ $item->variation->size->size ?? 'N/A' }}</div>
                                    <div>Color: {{ $item->variation->color->color ?? 'N/A' }}</div>
                                    <div>Số lượng : {{ $item->quantity }}</div>
                                </td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                                @if($order->status == 'Hoàn thành')
                                    <td>
                                        @if(!\App\Models\Review::hasUserReviewed(Auth::id(), $item->product_id))
                                            <a href="{{ route('client.product.review.form', [
                                                'order' => $order->id, 
                                                'product' => $item->product_id
                                            ]) }}" 
                                            class="btn btn-outline-primary btn-sm">
                                                Đánh giá
                                            </a>
                                        @else
                                            <span class="text-muted">Đã đánh giá</span>
                                        @endif
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
                            <td class="text-end" style="width: 40%;">{{ number_format($subtotal, 0, ',', '.') }} VND</td>
                        </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="width: 60%; text-align: right;">Phí vận chuyển</td>
                                <td class="text-end" style="width: 40%;">{{ number_format($shippingFee, 0, ',', '.') }} VND</td>
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
                                <td class="text-end text-primary fw-bold" style="width: 40%;">{{ number_format($finalTotal, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white" style="text-align: right;">Phương thức thanh toán</td>
                                <td class="text-end text-info">
                                    {{ $order->payment_method }}
                                    @if(in_array($order->payment_method, ['momo', 'vnpay', 'wallet']))
                                        <br><small class="text-success">(Đã thanh toán )</small>
                                    @endif
                                </td>
                            </tr>
                            @if ($order->status === 'Đã giao hàng')
                            <tr>
                                <td class="bg-secondary text-white" style="text-align: right;">Xác nhận đã nhận hàng</td>
                                <td class="text-end text-info">
                                    <p style="font-size: 10px;"> ( Nếu không bấm xác nhận thì <br> 
                                        đơn hàng sẽ tự động xác nhận sau 3 ngày )</p>
                                      <form action="{{route('orders.confirm', $order->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                            <input type="text" value="Hoàn thành" hidden>
                                            <button type="submit" class="btn btn-success">Xác nhận</button>
                                      </form>
                                </td>
                            </tr>
                            @elseif($order->status === 'Hoàn thành')
                            <tr>
                                <td class="bg-secondary text-white" style="text-align: right;">Xác nhận đã nhận hàng</td>
                                <td class="text-end text-success">
                                      <p>Đã xác nhận đơn hàng</p>
                                </td>
                            </tr>
                            @endif
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

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 14px;
        table-layout: fixed; /* Cố định độ rộng cột */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center; /* Căn giữa nội dung */
        word-wrap: break-word; /* Tự động xuống dòng */
        white-space: normal; /* Cho phép xuống dòng */
    }

    thead th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .img-thumbnail {
        max-width: 50px;
        max-height: 50px;
        object-fit: cover;
        border-radius: 4px;
    }

    .btn {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 4px;
    }

    .text-muted {
        font-style: italic;
        color: #6c757d;
    }
</style>


@endsection