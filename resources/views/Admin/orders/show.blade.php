@extends('Admin/layouts/master/master')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center"
                style="height: 70px;">
                <h1 class="mb-0" style="font-size: 1.5rem;">Chi Tiết Đơn Hàng</h1>
                <a href="{{ url()->previous() }}" class="btn btn-warning text-white">Trở Lại</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="font-size: 1.5rem;">Chi tiết Vận Chuyển</h4>
                        <br>
                        <hr> <br>
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
                            <strong>Trạng thái:</strong> <span>{{ $order->status }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 style="font-size: 1.5rem;">Chi Tiết Đơn Hàng</h4>
                        <br>
                        <hr>
                        <br>
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
                        <div class="mb-3">
                            <strong style="font-size: 1.5rem;">Tổng cộng:</strong> <span
                                style="font-size: 20px">{{ number_format($order->total) }} VNĐ</span>
                        </div>
                        <form action="{{ route('admin-orders.update', $order->id) }}" method="POST" class="mb-3">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="status" class="form-label">Cập nhật Trạng thái</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Chờ xử lý" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý
                                    </option>
                                    <option value="Đã xử lý" {{ $order->status == 'processed' ? 'selected' : '' }}>Đã xử lý
                                    </option>
                                    <option value="Đã giao hàng" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đã
                                        giao hàng</option>
                                    <option value="Đã nhận hàng" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã
                                        nhận hàng</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Cập nhật Trạng thái</button>
                                <a class="btn btn-success" href="{{ route('admin-orders.generatePDF', $order->id) }}">
                                    <i class="fa fa-file-pdf"></i> Tải PDF
                                </a>
                            </div>
                        </form>

                    </div>
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
    </style>
