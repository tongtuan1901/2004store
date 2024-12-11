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
                                    <strong>Mã đơn Hàng:</strong> <span>{{ $order->order_code }}</span>
                                </div>
                                <div class="col-md-6">
                                 
                                        <strong>Tên người gửi:</strong> <span>{{ $order->user->name }}</span>
                                    
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <strong>Địa chỉ:</strong> <span>{{ $order->address }}</span>
                                </div>
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
                            <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-2 sherah-table__h2">Tên Sản Phẩm</th>
                                        <th class="sherah-table__column-1 sherah-table__h1">Hình Ảnh</th>
                                        <th class="sherah-table__column-3 sherah-table__h4">Biến thể</th>
                                        <th class="sherah-table__column-3 sherah-table__h4">Danh mục</th>
                                        <th class="sherah-table__column-3 sherah-table__h4">Thương hiệu</th>
                                        <th class="sherah-table__column-3 sherah-table__h4">Giá</th>
                                        <th class="sherah-table__column-4 sherah-table__h5">Số Lượng</th>
                                        <th class="sherah-table__column-3 sherah-table__h4">Phương thức thanh toán</th>
                                        <th class="sherah-table__column-4 sherah-table__h5">Ngày đặt</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body">
                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td class="sherah-table__column-2 sherah-table__data-2">
                                                <div class="sherah-table__product-name">
                                                    <h4 class="sherah-table__product-name--title">{{ $item->product->name }}</h4>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-1 sherah-table__data-1">
                                                <div class="sherah-table__product--thumb">
                                                    <div class="product-carousel">
                                                        <div id="productCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                @if ($item->variation)
                                                                    @if ($item->variation->image)
                                                                        <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-fluid" width="150">
                                                                    @else
                                                                        <p>No image available</p>
                                                                    @endif
                                                                @else
                                                                    <p>No variation available</p>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-2 sherah-table__data-2">
                                                <div class="sherah-table__product-name">
                                                    @if ($item->variation)
                                                    <div>
                                                        Kích thước: {{ $item->variation->size->size ?? 'N/A' }}, 
                                                        Màu sắc: {{ $item->variation->color->color ?? 'N/A' }}
                                                    </div>
                                                    @else
                                                        <div>Không có biến thể</div>
                                                    @endif
                                                        <hr> 
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-3 sherah-table__data-3">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $item->product->category->name }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-3 sherah-table__data-3">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $item->product->brand->name }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-3 sherah-table__data-3">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ number_format($item->price) }} VNĐ</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-4 sherah-table__data-4">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $item->quantity }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-4 sherah-table__data-4">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $order->payment_method }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-4 sherah-table__data-4">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $order->created_at }}</p>
                                                </div>
                                            </td>
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
