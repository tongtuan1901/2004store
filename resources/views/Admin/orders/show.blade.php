@extends('Admin/layouts/master/master')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Chi tiết Đơn Hàng</h2>
                <i class="fa fa-shopping-cart fa-2x"></i>
            </div>
            <div class="card-body">
                @if (isset($order))
                    <div class="mb-3">
                        <strong>ID Đơn Hàng:</strong> <span class="badge bg-secondary">{{ $order->id }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Tên khách hàng:</strong> <span>{{ $order->name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> <span>{{ $order->email }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Số điện thoại:</strong> <span>{{ $order->phone }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Địa chỉ:</strong> <span>{{ $order->address }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Tổng cộng:</strong> <span class="badge bg-success">{{ $order->total }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Trạng thái:</strong> <span class="badge bg-warning">{{ $order->status }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Sản phẩm:</strong>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá</th>
                                    <th>Hình Ảnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>{{ number_format($product->price) }} VNĐ</td>
                                        <td>
                                            <div class="product-carousel">
                                                <div id="productCarousel{{ $product->id }}" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach ($product->images as $key => $image)
                                                            <div
                                                                class="carousel-item @if ($key === 0) active @endif">
                                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                    class="d-block w-100" alt="Product Image">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#productCarousel{{ $product->id }}"
                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#productCarousel{{ $product->id }}"
                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger">
                        Đơn hàng không tồn tại.
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a class="btn btn-secondary" href="{{ route('admin-orders.index') }}">
                    <i class="fa fa-arrow-left"></i> Trở lại danh sách đơn hàng
                </a>
            </div>
        </div>
    </div>
@endsection

<style>
    .product-carousel {
        max-width: 200px;
        margin: auto;
    }

    .product-carousel .carousel-inner img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #000;
    }

    .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>
