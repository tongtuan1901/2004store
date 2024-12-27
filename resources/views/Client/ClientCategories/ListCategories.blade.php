@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <script>
            window.F1GENZ_vars.collection.featured = "vertical"
        </script>
        <div class="main-collection" data-id="3447590">
            <div title="Cocktail Dresses" class="main-collection-breadcrumb">
                <div class="container">
                    <div class="section-title-all" hidden>
                        <!--<h1>Cocktail Dresses</h1>-->
                    </div>
                    <div class="breadcrumb-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" aria-label="Trang chủ" title="Trang chủ">Trang
                                    chủ</a></li>


                            <li class="breadcrumb-item active"><span>Sản phẩm</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="main-collection-banner">
                    <img loading="eager" decoding="sync" fetchpriority="high" width="1000" height="300"
                        src="{{ asset('admin/img/banner4.jpg') }}" alt="Cocktail Dresses" />
                </div>
                <div class="main-collection-wrap vertical">
                    <div class="container">
                        <div class="container"> 
                        <h1 class="titleStyle1">Sản phẩm của danh mục - {{ $categories->name }}</h1>
                                <div class="main-collection-data four">

                                    @foreach ($products as $product)
                                        <div class="product-item" data-id="{{ $product->id }}"
                                            data-handle="{{ $product->slug }}">
                                            <div class="product-item-wrap">
                                                <div class="product-item-top">
                                                    <div class="product-item-top-image">
                                                        <a href="{{ route('client-products.show', $product->id) }}"
                                                            class="product-item-top-image-showcase">
                                                            <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                                                alt="{{ $product->name }}" title="{{ $product->name }}"
                                                                width="480" height="480" loading="lazy"
                                                                decoding="async">
                                                        </a>

                                                    </div>

                                                    @if ($product->price > 0 && $product->price_sale < $product->price)
                                                        <div class="product-item-label-sale">
                                                            <span>{{ number_format(100 - ($product->price_sale / $product->price) * 100, 2) }}%</span>
                                                        </div>
                                                    @endif
                                                    <button type="button" title="Yêu thích"
                                                        class="shop-wishlist-button-add"
                                                        data-type="shop-wishlist-button-add">
                                                        <!-- SVG icon for wishlist button -->
                                                    </button>
                                                    <style>
                                                        .slide-image {
                                                            height: 100px;
                                                            /* Thay đổi chiều cao theo yêu cầu */
                                                            object-fit: cover;
                                                            /* Đảm bảo hình ảnh giữ tỉ lệ mà không bị méo */

                                                        }

                                                        /* Styles for the custom buttons */
                                                        .shop-addLoop-button,
                                                        .shop-quickview-button {
                                                            background-color: #4CAF50;
                                                            /* Green */
                                                            border: none;
                                                            color: white;
                                                            padding: 5px 7px;
                                                            text-align: center;
                                                            text-decoration: none;
                                                            display: inline-block;
                                                            transition: 0.3s;
                                                            cursor: pointer;
                                                        }

                                                        .shop-addLoop-button:hover,
                                                        .shop-quickview-button:hover {
                                                            background-color: #f8b4da !important;
                                                        }

                                                        button.ft1 {
                                                            display: inline-block;
                                                            opacity: 1;
                                                            visibility: visible;
                                                            z-index: 10;
                                                            background-color: initial;
                                                            /* Màu nền mặc định */
                                                            transition: background-color 0.3s ease;
                                                            /* Hiệu ứng mượt khi đổi màu */
                                                        }

                                                        button.ft1:hover {
                                                            background-color: #f8b4da !important;
                                                            /* Màu hồng khi hover */
                                                        }

                                                        .form-group {
                                                            display: left;
                                                        }
                                                    </style>
                                                    <div class="product-item-actions">
                                                        @if ($product->variations->isNotEmpty())
                                                            <label for="modal-toggle-best-{{ $product->id }}"
                                                                class="shop-addLoop-button" title="Thêm vào giỏ">
                                                                Thêm vào giỏ
                                                            </label>
                                                            <input type="checkbox"
                                                                id="modal-toggle-best-{{ $product->id }}"
                                                                class="modal-toggle" />

                                                            <div class="modal">
                                                                <div class="modal-content">
                                                                    <label for="modal-toggle-best-{{ $product->id }}"
                                                                        class="close">&times;</label>
                                                                    <h2>Chọn biến thể và số lượng</h2>

                                                                    @if (auth()->check())
                                                                        <form action="{{ route('cart.add') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="size-best-{{ $product->id }}">Kích
                                                                                    thước:</label>
                                                                                <select id="size-best-{{ $product->id }}"
                                                                                    name="size" class="form-control"
                                                                                    required>
                                                                                    <option value="">Chọn kích thước
                                                                                    </option>
                                                                                    @php
                                                                                        $uniqueSizes = [];
                                                                                        foreach (
                                                                                            $product->variations
                                                                                            as $variation
                                                                                        ) {
                                                                                            if (
                                                                                                !in_array(
                                                                                                    $variation->size
                                                                                                        ->id,
                                                                                                    $uniqueSizes,
                                                                                                )
                                                                                            ) {
                                                                                                $uniqueSizes[] =
                                                                                                    $variation->size->id;
                                                                                                echo '<option value="' .
                                                                                                    $variation->size
                                                                                                        ->id .
                                                                                                    '">' .
                                                                                                    $variation->size
                                                                                                        ->size .
                                                                                                    '</option>';
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="color-best-{{ $product->id }}">Màu
                                                                                    sắc:</label>
                                                                                <select id="color-best-{{ $product->id }}"
                                                                                    name="color" class="form-control"
                                                                                    required>
                                                                                    <option value="">Chọn màu sắc
                                                                                    </option>
                                                                                    @php
                                                                                        $uniqueColors = [];
                                                                                        foreach (
                                                                                            $product->variations
                                                                                            as $variation
                                                                                        ) {
                                                                                            if (
                                                                                                !in_array(
                                                                                                    $variation->color
                                                                                                        ->id,
                                                                                                    $uniqueColors,
                                                                                                )
                                                                                            ) {
                                                                                                $uniqueColors[] =
                                                                                                    $variation->color->id;
                                                                                                echo '<option value="' .
                                                                                                    $variation->color
                                                                                                        ->id .
                                                                                                    '">' .
                                                                                                    $variation->color
                                                                                                        ->color .
                                                                                                    '</option>';
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="quantity-best-{{ $product->id }}">Số
                                                                                    lượng:</label>
                                                                                <input type="number"
                                                                                    id="quantity-best-{{ $product->id }}"
                                                                                    name="quantity" min="1"
                                                                                    value="1" class="form-control"
                                                                                    required>
                                                                            </div>

                                                                            <button type="submit" class="ft1">Thêm vào
                                                                                giỏ</button>
                                                                        </form>
                                                                    @else
                                                                        <p>Vui lòng <a
                                                                                href="{{ route('client-login.index') }}">đăng
                                                                                nhập</a> để mua hàng</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @else
                                                            <span class="shop-addLoop-button disabled" title="Hết hàng">Hết
                                                                hàng</span>
                                                        @endif

                                                        <button class="ft4"
                                                            style="background-color: #4CAF50 ; color: white">
                                                            <a href="{{ route('client-products.show', $product->id) }}">Xem
                                                                chi
                                                                tiết</a>
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="product-item-details">
                                                    <!-- Hiển thị danh mục -->
                                                    <p class="product-item-category"
                                                        style="font-size: 0.7em; color: #888; opacity: 0.7; margin-bottom: 10px;">
                                                        <a
                                                            href="{{ route('client-products.show', $product->id) }}">{{ $product->name }}</a>
                                                        <!-- Lấy tên danh mục từ mối quan hệ với Category -->
                                                    </p>

                                                    <h2 class="product-item-name"
                                                        style="font-size: 0.8em; font-weight: 500;"><a
                                                            href="{{ route('client-products.show', $product->id) }}">{{ $product->name }}</a>
                                                    </h2> <!-- Giảm phông chữ của tên sản phẩm -->




                                                    <p class="product-item-price">
                                                        <span class="original-price"
                                                            style="color: red; font-size: 1.2em;">
                                                            {{ number_format($product->price_sale, 0, ',', '.') }} VNĐ
                                                        </span>

                                                        <span class="sale-price"
                                                            style="text-decoration: line-through; color: #999999; font-size: 0.8em; margin-left: 10px;">
                                                            {{ number_format($product->price, 0, ',', '.') }} VNĐ
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pagination">
                                    {{ $products->links() }} <!-- Hiển thị phân trang -->
                                </div>
                        </div>
                    </div>


                </div>
            </div>



    </main>
@endsection
