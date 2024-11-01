@extends('admin.layouts.master')
@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <div class="sherah-dsinner">
                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Chi tiết sản phẩm</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="product-detail-body sherah-default-bg sherah-border mg-top-30">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="product-gallery">
                                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
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
                                                    data-bs-target="#productCarousel" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#productCarousel" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="product-detail-body__content">
                                            <h2 class="product-detail-body__title">{{ $product->name }}</h2>
                                            <div class="product-detail-body__deal--rating">
                                                <div class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                    <div class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                        @if ($product->price_sale)
                                                            <div class="mb-3">
                                                                <p class="text-danger">
                                                                    <del>{{ number_format($product->price, 2) }} VND</del>
                                                                    <span>{{ number_format($product->price_sale, 2) }}
                                                                        VND</span>
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="product-detail-body__stock sherah-color3">{{ $product->stock }} In
                                                stock</p>
                                            <div class="product-detail-body__text">{{ $product->description }}</div>

                                            <div class="sherah-border-btm pd-top-40 mg-btm-40"></div>
                                            <div class="sherah-products-meta">
                                                <ul class="sherah-products-meta__list">
                                                    <li><span class="p-list-title">Category :</span>
                                                        {{ $product->category->name }}</li>
                                                    <li><span class="p-list-title">Brand :</span>
                                                        {{ $product->brand->name }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="mt-3">Biến thể sản phẩm</h4>
                            <div id="variations-container">
                                @foreach ($product->variations as $variation)
                                    <div class="variation mb-3">
                                        <div class="variation-header d-flex justify-content-between">
                                            <h5 class="variation-title">Biến thể {{ $loop->iteration }}</h5>
                                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                                data-bs-target="#variationModal{{ $variation->id }}">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Modal chứa Thông tin Biến thể -->
                                    <div class="modal fade" id="variationModal{{ $variation->id }}" tabindex="-1"
                                        aria-labelledby="variationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="variationModalLabel">Thông Tin Biến Thể</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="variation mb-3">
                                                        <div class="variation-content d-flex">
                                                            <div class="image-container me-3" style="flex: 0 0 350px;">
                                                                <label class="form-label">Hình ảnh:</label>
                                                                @if ($variation->image)
                                                                    <img src="{{ asset('storage/' . $variation->image) }}"
                                                                        alt="Hình ảnh biến thể" class="img-fluid"
                                                                        style="max-width: 100%; height: auto;">
                                                                @else
                                                                    <p>Không có hình ảnh</p>
                                                                @endif
                                                            </div>
                                                            <div class="info-container d-flex flex-column justify-content-between"
                                                                style="flex: 1;">
                                                                <div>
                                                                    <label class="form-label">Kích thước:</label>
                                                                    <p>{{ $variation->size->size }}</p>
                                                                </div>
                                                                <div>
                                                                    <label class="form-label">Màu sắc:</label>
                                                                    <p>{{ $variation->color->color }}</p>
                                                                </div>
                                                                <div>
                                                                    <label class="form-label">Số lượng:</label>
                                                                    <p>{{ $variation->quantity }}</p>
                                                                </div>
                                                                <div>
                                                                    <label class="form-label">Giá:</label>
                                                                    <p>{{ number_format($variation->price, 2) }} VND</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .modal-body {
            padding: 20px;
        }

        .variation-content {
            display: flex;
            align-items: center;
        }

        .image-container {
            flex: 0 0 100%;
            max-width: 350px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        .info-container {
            flex: 1;
            padding-left: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .info-container .form-label {
            font-weight: bold;
        }

        .info-container p {
            margin: 0;
            padding: 5px 0;
        }

        .variation {
            padding: 15px;
            background-color: #f8f9fa;
            margin-bottom: 15px;
        }
    </style>
@endsection
