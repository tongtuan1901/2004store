@extends('Admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sherah-body">
                    <!-- Order Review Section -->
                    <div class="sherah-dsinner">
                        <div class="row mg-top-30">
                            <div class="col-12 sherah-flex-between">
                                <!-- Breadcrumb -->
                                <div class="sherah-breadcrumb">
                                    <h2 class="sherah-breadcrumb__title">Duyệt Đơn Hàng</h2>
                                </div>
                                <!-- End Breadcrumb -->
                                <a href="{{ route('admin-orders.index') }}" class="sherah-btn sherah-gbcolor">Trở Lại</a>
                            </div>
                        </div>

                        <!-- Order Info -->
                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25 p-4">
                            <h4>Thông Tin Đơn Hàng</h4>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>ID Đơn Hàng:</strong> <span>{{ $order->id }}</span>
                                </div>
                                <div class="col-md-6">
                                    @foreach ($order->products as $product)
                                        <strong>Tên người gửi:</strong> <span>{{ $order->user->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Email:</strong> <span>{{ $order->email }}</span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Trạng Thái:</strong> 
                                    <span class="sherah-table__status sherah-color4 sherah-color4__bg--opacity">{{ $order->status }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Tên người nhận:</strong> <span>{{ $order->name }}</span>
                                </div>
                            </div>
                            <!-- Product Details -->
                            <h4>Chi Tiết Sản Phẩm</h4>
                            <table class="sherah-table__main sherah-table__main-v3 mt-3">
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1">Tên Sản Phẩm</th>
                                        <th class="sherah-table__column-2">Ảnh biến thể</th>
                                        <th class="sherah-table__column-2">biến thể</th>
                                        <th class="sherah-table__column-3">Số Lượng</th>
                                        <th class="sherah-table__column-4">Giá</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body">
                                    @foreach ($order->products as $product)
                                    <tr>
                                        <td class="sherah-table__column-1">{{ $product->name }}</td>
                                        <td class="sherah-table__column-1">
                                            @foreach ($product->variations as $variation)
                                                @if ($variation->image)
                                                    <img src="{{ asset('storage/' . $variation->image) }}" alt="Variation Image" class="img-fluid" width="100">
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                            @endforeach
                                        </td>
                                            @foreach ($product->variations as $variation)
                                            <td>
                                                Kích thước: {{ $variation->size->size ?? 'N/A' }}, 
                                                Màu sắc: {{ $variation->color->color ?? 'N/A' }}
                                            </td>
                                            @endforeach
                                        <td class="sherah-table__column-2">{{ $product->pivot->quantity }}</td>
                                        <td class="sherah-table__column-3">{{ number_format($product->price) }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Action Buttons -->
                            <div class="sherah-flex-between mt-4">
                                <form action="{{ route('admin-orders.update-status', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn duyệt đơn hàng này?');">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="sherah-btn sherah-color2 sherah-color3__bg--opacity">Duyệt Đơn Hàng</button>
                                </form>
                                <a href="{{ route('admin-orders.index') }}" class="sherah-btn sherah-gbcolor">Trở Lại</a>
                            </div>
                        </div>
                        <!-- End Order Info -->
                    </div>
                    <!-- End Order Review Section -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
