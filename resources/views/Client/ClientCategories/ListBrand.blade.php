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


                            <li class="breadcrumb-item active"><span>Cocktail Dresses</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="main-collection-banner">
                    <img loading="eager" decoding="sync" fetchpriority="high" width="1920" height="640"
                        src="{{ asset('assets/bizweb.dktcdn.net/thumb/2048x2048/100/520/624/collections/h3bfbc9d6abb74530820bd8a71dccc8d-07aaeb016e4a475e97daf80cb8459361b9a8.jpg') }}"
                        alt="Cocktail Dresses" />
                </div>
                <div class="main-collection-wrap vertical">
                    <div class="main-collection-left">
                        <div class="shop-filter-wrap shop-filter-mobile">
                            <div class="head-for-mobile">
                                <strong>Bộ lọc</strong>
                                <button type="button" data-type="close-filter-mobile" title="Đóng"><svg
                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0"
                                        viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                        class="">
                                        <g>
                                            <script></script>
                                            <path xmlns="http://www.w3.org/2000/svg"
                                                d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z"
                                                fill="#000000" data-original="#000000" class=""></path>
                                        </g>
                                    </svg></button>
                            </div>

                            <div class="container">
                                <div class="shop-filter-choose">
                                    <!-- Bạn có thể thêm các bộ lọc vào đây mà không cần dùng form -->
                                </div>
                            </div>

                            <div class="main-collection-right">
                                <div class="main-collection-head">
                                    <div class="shop-sort-style">
                                        <strong>Hiển thị</strong>
                                        <div class="shop-filter-mobile-btn">
                                            <button type="button" data-type="shop-filter-mobile-btn" title="Bộ lọc">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                                    x="0" y="0" viewBox="0 0 512 512"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M486.585 243.429-15.502-8.401c-1.179-.639-1.82-1.981-1.596-3.339 1.048-6.346 1.58-12.843 1.58-19.309 0-6.467-.532-12.963-1.58-19.308-.225-1.359.417-2.701 1.596-3.34l15.502-8.4c4.266-2.311 7.376-6.145 8.757-10.796 1.382-4.65.87-9.561-1.441-13.825l-17.226-31.788c-4.772-8.804-15.817-12.085-24.621-7.314l-15.518 8.409c-1.178.64-2.641.453-3.637-.461-12.001-11.015-25.858-19.283-41.188-24.576-1.341-.463-2.242-1.679-2.242-3.025v-17.615c0-10.015-8.148-18.162-18.162-18.162h-36.154c-10.014 0-18.162 8.147-18.162 18.162v17.615c0 1.346-.901 2.562-2.241 3.025-15.331 5.293-29.189 13.562-41.188 24.576-.997.915-2.459 1.1-3.638.461l-15.518-8.41c-8.805-4.771-19.849-1.488-24.621 7.316l-17.225 31.787c-2.311 4.265-2.823 9.175-1.441 13.825.563 1.896 1.427 3.646 2.525 5.222h-95.46c-4.143 0-7.502 3.358-7.502 7.502 0 4.143 3.359 7.502 7.502 7.502h237.64c.436 0 .791.355.791.791v42.447h-325.714v-42.446c0-.437.355-.791.791-.791h52.484c4.143 0 7.502-3.358 7.502-7.502 0-4.143-3.359-7.502-7.502-7.502h-52.484c-8.709 0-15.794 7.085-15.794 15.794v49.948c0 .053.007.104.008.156.002.085.008.168.013.253.014.267.042.531.084.79.01.062.017.124.028.185.061.325.141.642.242.95.013.041.03.081.044.121.097.279.21.55.338.812.026.055.051.11.079.164.15.291.316.571.502.839.03.043.064.084.095.127.171.236.356.461.553.675.029.032.051.068.081.099l134.961 141.809c1.399 1.47 2.169 3.397 2.169 5.425v76.002c0 4.577 2.475 8.82 6.457 11.072l51.878 29.35c1.967 1.113 4.118 1.669 6.267 1.668 2.204 0 4.406-.584 6.407-1.75 3.953-2.305 6.313-6.413 6.313-10.99v-36.555c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v32.643l-47.316-26.769v-74.671c0-5.896-2.239-11.496-6.305-15.768l-122.898-129.135h305.726l-15.143 15.912c-.015.016-.03.032-.045.048l-107.713 113.178c-4.065 4.271-6.304 9.871-6.304 15.767v33.79c0 4.143 3.359 7.502 7.502 7.502s7.502-3.358 7.502-7.502v-33.79c0-2.029.77-3.955 2.169-5.424l66.857-70.25c4.322 2.116 8.773 3.983 13.304 5.547 1.341.463 2.242 1.679 2.242 3.025v17.615c0 10.015 8.148 18.162 18.162 18.162h36.154c10.014 0 18.162-8.147 18.162-18.162v-17.615c0-1.346.901-2.562 2.242-3.025 15.332-5.294 29.19-13.562 41.188-24.576.998-.914 2.459-1.098 3.638-.461l15.518 8.41c8.804 4.771 19.849 1.489 24.621-7.316l17.224-31.788c2.311-4.265 2.823-9.175 1.441-13.825-1.381-4.652-4.491-8.485-8.756-10.796z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-sort-item" data-show="two"></div>
                            <div class="shop-sort-item" data-show="three"></div>
                            <div class="shop-sort-item" data-show="four"></div>
                        </div>
                        <div class="shop-sort-by">

                        </div>
                    </div>
                    <div class="main-collection-info">


                        <h1 class="titleStyle1">Sản phẩm của thương hiệu - {{ $brand->name }}</h1>




                        <div class="main-collection-data four">

                            @foreach ($products as $product)
                                <div class="product-item" data-id="{{ $product->id }}" data-handle="{{ $product->slug }}">
                                    <div class="product-item-wrap">
                                        <div class="product-item-top">
                                            <div class="product-item-top-image">
                                                <a href="#" class="product-item-top-image-showcase">
                                                    <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                                        alt="{{ $product->name }}" title="{{ $product->name }}"
                                                        width="480" height="480" loading="lazy" decoding="async">
                                                </a>

                                            </div>

                                            {{-- @if ($product->sale_percentage > 0)
                        <div class="product-item-label-sale"><span>-{{ $product->sale_percentage }}%</span></div>
                    @endif --}}
                                            <button type="button" title="Yêu thích" class="shop-wishlist-button-add"
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

                                                button.ft4:hover {
                                                    background-color: #f8b4da !important;
                                                    /* Màu hồng khi hover */
                                                }

                                                .form-group {
                                                    display: left;
                                                }
                                            </style>
                                         <div class="product-item-actions">
                                            @if ($product->variations->isNotEmpty())
                                                <label for="modal-toggle-best-{{ $product->id }}" class="shop-addLoop-button" title="Thêm vào giỏ">
                                                    Thêm vào giỏ
                                                </label>
                                                <input type="checkbox" id="modal-toggle-best-{{ $product->id }}" class="modal-toggle" />

                                                <div class="modal">
                                                    <div class="modal-content">
                                                        <label for="modal-toggle-best-{{ $product->id }}" class="close">&times;</label>
                                                        <h2>Chọn biến thể và số lượng</h2>

                                                        @if (auth()->check())
                                                            <form action="{{ route('cart.add') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                <div class="form-group">
                                                                    <label for="size-best-{{ $product->id }}">Kích thước:</label>
                                                                    <select id="size-best-{{ $product->id }}" name="size" class="form-control" required>
                                                                        <option value="">Chọn kích thước</option>
                                                                        @php
                                                                            $uniqueSizes = [];
                                                                            foreach ($product->variations as $variation) {
                                                                                if (!in_array($variation->size->id, $uniqueSizes)) {
                                                                                    $uniqueSizes[] = $variation->size->id;
                                                                                    echo '<option value="' . $variation->size->id . '">' . $variation->size->size . '</option>';
                                                                                }
                                                                            }
                                                                        @endphp
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="color-best-{{ $product->id }}">Màu sắc:</label>
                                                                    <select id="color-best-{{ $product->id }}" name="color" class="form-control" required>
                                                                        <option value="">Chọn màu sắc</option>
                                                                        @php
                                                                            $uniqueColors = [];
                                                                            foreach ($product->variations as $variation) {
                                                                                if (!in_array($variation->color->id, $uniqueColors)) {
                                                                                    $uniqueColors[] = $variation->color->id;
                                                                                    echo '<option value="' . $variation->color->id . '">' . $variation->color->color . '</option>';
                                                                                }
                                                                            }
                                                                        @endphp
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="quantity-best-{{ $product->id }}">Số lượng:</label>
                                                                    <input type="number" id="quantity-best-{{ $product->id }}" name="quantity" min="1" value="1" class="form-control" required>
                                                                </div>

                                                                <button type="submit" class="ft1">Thêm vào giỏ</button>
                                                            </form>
                                                        @else
                                                            <p>Vui lòng <a href="{{ route('client-login.index') }}">đăng nhập</a> để mua hàng</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                <span class="shop-addLoop-button disabled" title="Hết hàng">Hết hàng</span>
                                            @endif

                                            <button class="ft4" style="background-color: #4CAF50 ; color: white">
                                                <a href="{{ route('client-products.show', $product->id) }}">Xem chi tiết</a>
                                            </button>
                                        </div>


                                        </div>
                                        <div class="product-item-details">
                                            <!-- Hiển thị danh mục -->
                                            <p class="product-item-category"
                                                style="font-size: 0.7em; color: #888; opacity: 0.7; margin-bottom: 10px;">
                                                {{ $product->category->name }}
                                                <!-- Lấy tên danh mục từ mối quan hệ với Category -->
                                            </p>

                                            <h2 class="product-item-name" style="font-size: 0.8em; font-weight: 500;">
                                                {{ $product->name }}</h2> <!-- Giảm phông chữ của tên sản phẩm -->




                                            <p class="product-item-price">
                                                <span class="original-price" style="color: red; font-size: 1.2em;">
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



    </main>
@endsection
