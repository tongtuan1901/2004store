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
                        src="{{asset('assets/bizweb.dktcdn.net/thumb/2048x2048/100/520/624/collections/h3bfbc9d6abb74530820bd8a71dccc8d-07aaeb016e4a475e97daf80cb8459361b9a8.jpg')}}"
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
                            <div class="shop-filter-choose">
                                <label>Bạn chọn: <button type="button" data-type="shop-filter-choose-remove"
                                        title="Bỏ hết">Bỏ hết</button></label>
                                <ul class="shop-filter-choose-data">

                                </ul>
                            </div>
                            <div class="shop-filter" data-type="vendor">
                                <h4>Danh mục sản phẩm</h4>
                                <div class="shop-filter-list">
                                    @foreach($categories as $category)
                                        <div class="shop-filter-item">
                                            <input type="checkbox" id="shop-filter-vendor-{{ $category->id }}" data-group="vendor"
                                                data-field="vendor" data-text="{{ $category->name }}" value="({{ $category->name }})" data-operator="OR">
                                            <label for="shop-filter-vendor-{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="shop-filter" data-type="price">
                                <h4>Giá sản phẩm</h4>
                                <div class="shop-filter-list">
                                    <div class="shop-filter-item">
                                        <input type="checkbox" id="shop-filter-price-item1" data-group="price"
                                            data-field="price_min" data-text="Dưới 1.000.000₫" value="(&lt;1000000)"
                                            data-operator="OR">
                                        <label for="shop-filter-price-item1" title="Dưới 1.000.000₫">Dưới
                                            1.000.000₫</label>
                                    </div>
                                    <div class="shop-filter-item">
                                        <input type="checkbox" id="shop-filter-price-item2" data-group="price"
                                            data-field="price_min" data-text="Từ 1.000.000₫ - 3.000.000₫"
                                            value="(&gt;=1000000 AND &lt;=3000000)" data-operator="OR">
                                        <label for="shop-filter-price-item2" title="Từ 1.000.000₫ - 3.000.000₫">Từ
                                            1.000.000₫ - 3.000.000₫</label>
                                    </div>
                                    <div class="shop-filter-item">
                                        <input type="checkbox" id="shop-filter-price-item3" data-group="price"
                                            data-field="price_min" data-text="Từ 3.000.000₫ - 5.000.000₫"
                                            value="(&gt;=3000000 AND &lt;=5000000)" data-operator="OR">
                                        <label for="shop-filter-price-item3" title="Từ 3.000.000₫ - 5.000.000₫">Từ
                                            3.000.000₫ - 5.000.000₫</label>
                                    </div>
                                    <div class="shop-filter-item">
                                        <input type="checkbox" id="shop-filter-price-item4" data-group="price"
                                            data-field="price_min" data-text="Từ 5.000.000₫ - 10.000.000₫"
                                            value="(&gt;=5000000 AND &lt;=10000000)" data-operator="OR">
                                        <label for="shop-filter-price-item4" title="Từ 5.000.000₫ - 10.000.000₫">Từ
                                            5.000.000₫ - 10.000.000₫</label>
                                    </div>
                                    <div class="shop-filter-item">
                                        <input type="checkbox" id="shop-filter-price-item5" data-group="price"
                                            data-field="price_min" data-text="Trên 10.000.000₫" value="(&gt;10000000)"
                                            data-operator="OR">
                                        <label for="shop-filter-price-item5" title="Trên 10.000.000₫">Trên
                                            10.000.000₫</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-collection-right ">
                        <div class="main-collection-head">
                            <div class="shop-sort-style">
                                <strong>Hiển thị</strong>
                                <div class="shop-filter-mobile-btn">
                                    <button type="button" data-type="shop-filter-mobile-btn" title="Bộ lọc">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                            x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                                            xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="m486.585 243.429-15.502-8.401c-1.179-.639-1.82-1.981-1.596-3.339 1.048-6.346 1.58-12.843 1.58-19.309 0-6.467-.532-12.963-1.58-19.308-.225-1.359.417-2.701 1.596-3.34l15.502-8.4c4.266-2.311 7.376-6.145 8.757-10.796 1.382-4.65.87-9.561-1.441-13.825l-17.226-31.788c-4.772-8.804-15.817-12.085-24.621-7.314l-15.518 8.409c-1.178.64-2.641.453-3.637-.461-12.001-11.015-25.858-19.283-41.188-24.576-1.341-.463-2.242-1.679-2.242-3.025v-17.615c0-10.015-8.148-18.162-18.162-18.162h-36.154c-10.014 0-18.162 8.147-18.162 18.162v17.615c0 1.346-.901 2.562-2.241 3.025-15.331 5.293-29.189 13.562-41.188 24.576-.997.915-2.459 1.1-3.638.461l-15.518-8.41c-8.805-4.771-19.849-1.488-24.621 7.316l-17.225 31.787c-2.311 4.265-2.823 9.175-1.441 13.825.563 1.896 1.427 3.646 2.525 5.222h-95.46c-4.143 0-7.502 3.358-7.502 7.502 0 4.143 3.359 7.502 7.502 7.502h237.64c.436 0 .791.355.791.791v42.447h-325.714v-42.446c0-.437.355-.791.791-.791h52.484c4.143 0 7.502-3.358 7.502-7.502 0-4.143-3.359-7.502-7.502-7.502h-52.484c-8.709 0-15.794 7.085-15.794 15.794v49.948c0 .053.007.104.008.156.002.085.008.168.013.253.014.267.042.531.084.79.01.062.017.124.028.185.061.325.141.642.242.95.013.041.03.081.044.121.097.279.21.55.338.812.026.055.051.11.079.164.15.291.316.571.502.839.03.043.064.084.095.127.171.236.356.461.553.675.029.032.051.068.081.099l134.961 141.809c1.399 1.47 2.169 3.397 2.169 5.425v76.002c0 4.577 2.475 8.82 6.457 11.072l51.878 29.35c1.967 1.113 4.118 1.669 6.267 1.668 2.204 0 4.406-.584 6.407-1.75 3.953-2.305 6.313-6.413 6.313-10.99v-36.555c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v32.643l-47.316-26.769v-74.671c0-5.896-2.239-11.496-6.305-15.768l-122.898-129.135h305.726l-15.143 15.912c-.015.016-.03.032-.045.048l-107.713 113.178c-4.065 4.271-6.304 9.871-6.304 15.767v33.79c0 4.143 3.359 7.502 7.502 7.502s7.502-3.358 7.502-7.502v-33.79c0-2.029.77-3.955 2.169-5.424l66.857-70.25c4.322 2.116 8.773 3.983 13.304 5.547 1.341.463 2.242 1.679 2.242 3.025v17.615c0 10.015 8.148 18.162 18.162 18.162h36.154c10.014 0 18.162-8.147 18.162-18.162v-17.615c0-1.346.901-2.562 2.242-3.025 15.332-5.294 29.19-13.562 41.188-24.576.998-.914 2.459-1.098 3.638-.461l15.518 8.41c8.804 4.771 19.849 1.489 24.621-7.316l17.224-31.788c2.311-4.265 2.823-9.175 1.441-13.825-1.381-4.652-4.491-8.485-8.756-10.796zm-5.876 17.473-17.225 31.786c-.83 1.532-2.75 2.103-4.283 1.274l-15.516-8.409c-6.806-3.688-15.218-2.646-20.932 2.598-10.473 9.614-22.565 16.831-35.939 21.449-7.386 2.55-12.348 9.465-12.348 17.206v17.615c0 1.742-1.417 3.159-3.159 3.159h-36.154c-1.742 0-3.159-1.417-3.159-3.159v-17.615c0-7.741-4.962-14.655-12.349-17.207-2.456-.848-4.881-1.809-7.274-2.846l26.897-28.262c4.571.961 9.249 1.446 13.962 1.446 11.949 0 23.695-3.164 33.968-9.148 3.579-2.085 4.791-6.678 2.705-10.258s-6.678-4.788-10.259-2.706c-7.982 4.65-17.115 7.109-26.414 7.109-.348 0-.695-.011-1.043-.018l17.362-18.243c.03-.031.052-.067.081-.099.197-.214.382-.439.553-.675.031-.043.065-.084.095-.127.186-.267.352-.548.502-.839.028-.054.052-.109.079-.164.128-.263.241-.533.338-.812.014-.041.031-.08.044-.121.101-.308.182-.625.242-.95.012-.061.018-.123.028-.185.042-.259.07-.523.084-.79.005-.084.011-.168.013-.253.001-.053.008-.104.008-.156v-49.948c0-8.709-7.085-15.794-15.794-15.794h-40.281c9.773-10.043 23.314-15.931 37.688-15.931 28.978 0 52.554 23.575 52.554 52.553 0 8.256-1.857 16.154-5.52 23.476-1.853 3.705-.353 8.212 3.352 10.065 1.078.539 2.223.795 3.351.795 2.751-.001 5.4-1.52 6.715-4.147 4.715-9.424 7.105-19.58 7.105-30.188 0-37.251-30.306-67.556-67.557-67.556-23.022 0-44.383 11.746-56.777 30.934h-55.375l-14.056-7.618c-1.001-.542-1.383-1.409-1.522-1.876-.139-.469-.292-1.404.251-2.405l17.225-31.786c.83-1.532 2.752-2.102 4.283-1.274l15.516 8.409c6.807 3.689 15.219 2.647 20.932-2.598 10.474-9.614 22.566-16.831 35.94-21.449 7.386-2.549 12.348-9.465 12.348-17.206v-17.617c0-1.742 1.417-3.159 3.159-3.159h36.154c1.742 0 3.159 1.417 3.159 3.159v17.615c0 7.741 4.962 14.655 12.348 17.206 13.373 4.618 25.465 11.835 35.94 21.449 5.712 5.244 14.124 6.287 20.931 2.598l15.517-8.408c1.532-.831 3.453-.26 4.283 1.272l17.225 31.787c.543 1.001.39 1.936.251 2.405-.139.468-.522 1.334-1.523 1.877l-15.503 8.401c-6.799 3.684-10.516 11.31-9.25 18.976.915 5.539 1.379 11.212 1.379 16.862s-.464 11.323-1.38 16.863c-1.266 7.665 2.451 15.29 9.25 18.975l15.503 8.402c1.001.542 1.383 1.409 1.522 1.876.14.469.293 1.404-.25 2.405z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                                <path
                                                    d="m23.399 75.926c4.143 0 7.502-3.358 7.502-7.502v-33.162c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v33.162c.001 4.144 3.359 7.502 7.502 7.502z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                                <path
                                                    d="m148.977 154.757c4.143 0 7.502-3.358 7.502-7.502v-33.163c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v33.163c0 4.144 3.359 7.502 7.502 7.502z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                                <path
                                                    d="m117.03 48.165c4.143 0 7.502-3.358 7.502-7.502v-33.161c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v33.162c0 4.143 3.359 7.501 7.502 7.501z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                                <path
                                                    d="m269.664 64.747c4.143 0 7.502-3.358 7.502-7.502v-33.162c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v33.162c.001 4.144 3.359 7.502 7.502 7.502z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                                <path
                                                    d="m82.593 119.291c14.073 0 25.522-11.449 25.522-25.521s-11.449-25.521-25.522-25.521c-14.072 0-25.521 11.449-25.521 25.521s11.449 25.521 25.521 25.521zm0-36.039c5.8 0 10.518 4.718 10.518 10.518s-4.718 10.518-10.518 10.518-10.518-4.718-10.518-10.518 4.719-10.518 10.518-10.518z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                                <path
                                                    d="m198.079 99.711c14.072 0 25.521-11.449 25.521-25.521 0-14.073-11.449-25.522-25.521-25.522-14.073 0-25.522 11.449-25.522 25.522.001 14.072 11.45 25.521 25.522 25.521zm0-36.04c5.8 0 10.518 4.719 10.518 10.519s-4.718 10.518-10.518 10.518-10.518-4.718-10.518-10.518 4.718-10.519 10.518-10.519z"
                                                    fill="#000000" data-original="#000000" class=""></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <div class="shop-sort-item" data-show="two"></div>
                                <div class="shop-sort-item" data-show="three"></div>
                                <div class="shop-sort-item" data-show="four"></div>
                            </div>
                            <div class="shop-sort-by">
                                <label for="shopSortSelect">Sắp xếp theo</label>
                                <select aria-label="Sắp xếp theo" id="shopSortSelect">
                                    <option value="">Mặc định</option>
                                    <option value="name:asc">A &rarr; Z</option>
                                    <option value="name:desc">Z &rarr; A</option>
                                    <option value="price_min:asc">Giá tăng dần</option>
                                    <option value="price_min:desc">Giá giảm dần</option>
                                    <option value="created_on:desc">Hàng cũ nhất</option>
                                    <option value="created_on:asc">Hàng mới nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="main-collection-info">
                           
                            @if($products->isNotEmpty())
                            <h1 class="titleStyle1">Sản phẩm của thương hiệu: {{ $products->first()->brand->name }}</h1>
                        @endif
                            {{-- <div class="main-collection-info-description">
                                Những mẫu váy tinh tế, thanh lịch, thường may bằng các chất liệu cao cấp như lụa, ren,
                                chiffon hoặc nhung. Chiều dài váy khoảng trên đầu gối đến dưới gối, tạo vẻ quý phái, sang
                                trọng. Các thiết kế có nhiều kiểu dáng khác nhau như cổ chéo, cổ V, tay lửng hoặc không tay.
                                Các màu sắc phổ biến bao gồm đen, đỏ, xanh đen, tím than và các gam màu trung tính tinh tế.
                                Những chiếc váy này thường được mặc tới các bữa tiệc, sự kiện chính thức hoặc dạ tiệc.
                            </div> --}}
                        </div>
                        {{-- <h1>Sản phẩm theo thương hiệu</h1> --}}

    <div class="main-collection-data four">
      
        @foreach ($products as $product)
       
            <div class="product-item" data-id="{{ $product->id }}" data-handle="{{ $product->slug }}">
                <div class="product-item-wrap">
                    <div class="product-item-top">
                        <div class="product-item-top-image">
                            <a href="#" class="product-item-top-image-showcase">
                                <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                     alt="{{ $product->name }}"
                                     title="{{ $product->name }}" width="480" height="480" loading="lazy" decoding="async">
                            </a>
                
                        </div>
                        
                        @if($product->sale_percentage > 0)
                            <div class="product-item-label-sale"><span>-{{ $product->sale_percentage }}%</span></div>
                        @endif
                        <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                            <!-- SVG icon for wishlist button -->
                        </button>
                        <div class="product-item-actions">
                            <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                            <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                        </div>
                        
                    </div>
                    <div class="product-item-details">
                        <h2 class="product-item-name">{{ $product->name }}</h2>
                        <p class="product-item-price">
                            <span class="original-price" style="color: red; font-size: 1.2em;">
                                {{ number_format($product->price, 0, ',', '.') }} VNĐ
                            </span>
                            <span class="sale-price" style="text-decoration: line-through; color: #999999; font-size: 0.8em; margin-left: 10px;">
                                {{ number_format($product->price_sale, 0, ',', '.') }} VNĐ
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
                                    </div>
                                    <div class="product-item-detail">
                                        <div class="product-item-detail-flex">
                                            <a class="product-item-detail-vendor" href="ribbon-jacquard-vintage.html"
                                               title="RIBBON"
                                               aria-label="RIBBON"><span>RIBBON</span></a>
                                            <div class="sapo-product-reviews-badge" data-id="36389529"></div>
                                        </div>
                                        <h3 class="product-item-detail-title"><a  href="ribbon-jacquard-vintage.html" title="RIBBON JACQUARD VINTAGE" aria-label="RIBBON JACQUARD VINTAGE">RIBBON JACQUARD VINTAGE</a></h3>
                                        <div class="product-item-detail-price">
                                            
                                            <strong>2.033.000₫</strong>
                                            <del>2.533.000₫</del>
                                            
                                        </div>
                                        <div class="product-item-detail-gallery-items">
                                            <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4ba734f8a25b5ec60601367e1a0d98375c29.jpg?v=1720423861723">
                                                <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4ba734f8a25b5ec60601367e1a0d98375c29.jpg?v=1720423861723" width="50" height="50" loading="lazy" decoding="async"
                                                     alt='RIBBON JACQUARD VINTAGE'
                                                     title='RIBBON JACQUARD VINTAGE'>
                                            </div>
                                            <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/1ab6290bacbf36715ec672ec9476b91a3fba.jpg?v=1720424199790">
                                                <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/1ab6290bacbf36715ec672ec9476b91a3fba.jpg?v=1720424199790" width="50" height="50" loading="lazy" decoding="async"
                                                     alt='RIBBON JACQUARD VINTAGE'
                                                     title='RIBBON JACQUARD VINTAGE'>
                                            </div>
                                            <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/1ab6290bacbf36715ec672ec9476b91a-848c991f8fda40228b4d0d93708a6840-7240cbd3a9c9474f8aeeece4b66c60f43fba.jpg?v=1720424199790">
                                                <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/1ab6290bacbf36715ec672ec9476b91a-848c991f8fda40228b4d0d93708a6840-7240cbd3a9c9474f8aeeece4b66c60f43fba.jpg?v=1720424199790" width="50" height="50" loading="lazy" decoding="async"
                                                     alt='RIBBON JACQUARD VINTAGE'
                                                     title='RIBBON JACQUARD VINTAGE'>
                                            </div>
                                            <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4d6809edffb7dda04d54f921b86d6968-d11d0f5dbef546018b468ded6799a260-4f858d433d6f4516a3998c7c98fec4433fba.jpg?v=1720424199790">
                                                <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4d6809edffb7dda04d54f921b86d6968-d11d0f5dbef546018b468ded6799a260-4f858d433d6f4516a3998c7c98fec4433fba.jpg?v=1720424199790" width="50" height="50" loading="lazy" decoding="async"
                                                     alt='RIBBON JACQUARD VINTAGE'
                                                     title='RIBBON JACQUARD VINTAGE'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-pagination">

                                <span class="current">1</span>

                                <a href="cocktail-dresses142e.html?view=vertical&amp;page=2" title="Trang 2"
                                    aria-label="Trang 2" data-page="2">2</a>

                                <a href="cocktail-dresses142e.html?view=vertical&amp;page=2" title="Trang sau"
                                    aria-label="Trang sau" data-page="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0"
                                        y="0" viewBox="0 0 240.823 240.823" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <path id="Chevron_Right_1_"
                                            d="M183.189,111.816L74.892,3.555c-4.752-4.74-12.451-4.74-17.215,0c-4.752,4.74-4.752,12.439,0,17.179l99.707,99.671l-99.695,99.671c-4.752,4.74-4.752,12.439,0,17.191c4.752,4.74,12.463,4.74,17.215,0l108.297-108.261C187.881,124.315,187.881,116.495,183.189,111.816z"
                                            fill="#000000" data-original="#000000"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
