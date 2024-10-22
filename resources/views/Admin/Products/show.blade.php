@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <h2 class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">Chi tiết sản phẩm</h2>

        <div class="row">
            <div class="col-md-6">
                <h4>Hình ảnh sản phẩm</h4>
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($product->images as $key => $image)
                            <div class="carousel-item @if ($key === 0) active @endif">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100"
                                    alt="Product Image">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Thông tin sản phẩm</h4>
                <div class="mb-3">
                    <strong>Tên sản phẩm:</strong>
                    <p class="text-muted">{{ $product->name }}</p>
                </div>

                <div class="mb-3">
                    <strong>Mô tả:</strong>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>

                <div class="mb-3">
                    <strong>Giá:</strong>
                    <p class="text-danger">{{ number_format($product->price, 2) }} VND</p>
                </div>

                @if ($product->price_sale)
                    <div class="mb-3">
                        <strong>Giá khuyến mãi:</strong>
                        <p class="text-danger"><del>{{ number_format($product->price, 2) }} VND</del>
                            <span>{{ number_format($product->price_sale, 2) }} VND</span></p>
                    </div>
                @endif

                <div class="mb-3">
                    <strong>Số lượng:</strong>
                    <p class="text-muted">{{ $product->quantity }}</p>
                </div>

                <div class="mb-3">
                    <strong>Trạng thái:</strong>
                    <p class="text-muted">{{ $product->status == 0 ? 'Còn hàng' : 'Hết hàng' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Kích thước:</strong>
                    <p class="text-muted">
                        @if (is_array($product->sizes))
                            {{ implode(', ', $product->sizes) }}
                        @else
                            {{ $product->sizes }}
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <strong>Màu sắc:</strong>
                    <p class="text-muted">
                        @if (is_array($product->colors))
                            {{ implode(', ', $product->colors) }}
                        @else
                            {{ $product->colors }}
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <strong>Danh mục:</strong>
                    <p class="text-muted">{{ $product->category->name }}</p>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin-products.index') }}" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
            <a href="{{ route('admin-products.edit', $product->id) }}" class="btn btn-primary">Chỉnh sửa sản phẩm</a>
        </div>

    </div>
@endsection
