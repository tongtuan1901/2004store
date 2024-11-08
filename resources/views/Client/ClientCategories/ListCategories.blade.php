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
                                <h4>Thương hiệu sản phẩm</h4>
                                <div class="shop-filter-list">
                                    @foreach($brands as $brand)
                                        <div class="shop-filter-item">
                                            <input type="checkbox" id="shop-filter-vendor-{{ $brand->id }}" data-group="vendor"
                                                data-field="vendor" data-text="{{ $brand->name }}" value="{{ $brand->name }}" data-operator="OR">
                                            <label for="shop-filter-vendor-{{ $brand->id }}">{{ $brand->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>                   
                            <div class="shop-filter" data-type="category">
                                <h4>Danh mục sản phẩm</h4>
                                <div class="shop-filter-list">
                                    @foreach($categories as $category)
                                        <div class="shop-filter-item">
                                            <input type="checkbox" id="shop-filter-category-{{ $category->id }}" data-group="category"
                                                data-field="category" data-text="{{ $category->name }}" value="{{ $category->name }}" data-operator="OR">
                                            <label for="shop-filter-category-{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>                   
                            <div class="shop-filter" data-type="size">
                                <h4>Kích thước sản phẩm</h4>
                                <div class="shop-filter-list">
                                    @foreach($sizes as $size)
                                        <div class="shop-filter-item">
                                            <input type="checkbox" id="shop-filter-size-{{ $size->id }}" data-group="size"
                                                data-field="size" data-text="{{ $size->size }}" value="{{ $size->size }}" data-operator="OR">
                                            <label for="shop-filter-size-{{ $size->id }}">{{ $size->size }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="shop-filter" data-type="color">
                                <h4>Màu sắc sản phẩm</h4>
                                <div class="shop-filter-list">
                                    @foreach($colors as $color)
                                        <div class="shop-filter-item">
                                            <input type="checkbox" id="shop-filter-color-{{ $color->id }}" data-group="color"
                                                data-field="color" data-text="{{ $color->color }}" value="{{ $color->color }}" data-operator="OR">
                                            <label for="shop-filter-color-{{ $color->id }}">{{ $color->color }}</label>
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
                                        <!-- SVG icon -->
                                    </button>
                                </div>
                                <div class="shop-sort-item" data-show="two"></div>
                                <div class="shop-sort-item" data-show="three"></div>
                                <div class="shop-sort-item" data-show="four"></div>
                            </div>
                            <div class="shop-sort-by">
                                <label for="shopSortSelect">Sắp xếp theo</label>
                                <select aria-label="Sắp xếp theo" id="shopSortSelect" onchange="sortProducts(this.value)">
                                    <option value="">Mặc định</option>
                                    <option value="name:asc" {{ $sortBy === 'name:asc' ? 'selected' : '' }}>A &rarr; Z</option>
                                    <option value="name:desc" {{ $sortBy === 'name:desc' ? 'selected' : '' }}>Z &rarr; A</option>
                                    <option value="price_min:asc" {{ $sortBy === 'price_min:asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                    <option value="price_min:desc" {{ $sortBy === 'price_min:desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                    <option value="created_on:asc" {{ $sortBy === 'created_on:asc' ? 'selected' : '' }}>Hàng mới nhất</option>
                                    <option value="created_on:desc" {{ $sortBy === 'created_on:desc' ? 'selected' : '' }}>Hàng cũ nhất</option>
                                </select>
                            </div>
                            <script>
                                function sortProducts(value) {
                                    const url = new URL(window.location.href);
                                    url.searchParams.set('sortBy', value);
                                    window.location.href = url.toString();
                                }
                            </script>
                            
                        </div>
                        
                        <div class="main-collection-info">
                            <h1 class="titleStyle1">2004 Store</h1>
                            <div class="main-collection-info-description">
                                Những mẫu váy tinh tế, thanh lịch, thường may bằng các chất liệu cao cấp như lụa, ren,
                                chiffon hoặc nhung. Chiều dài váy khoảng trên đầu gối đến dưới gối, tạo vẻ quý phái, sang
                                trọng. Các thiết kế có nhiều kiểu dáng khác nhau như cổ chéo, cổ V, tay lửng hoặc không tay.
                                Các màu sắc phổ biến bao gồm đen, đỏ, xanh đen, tím than và các gam màu trung tính tinh tế.
                                Những chiếc váy này thường được mặc tới các bữa tiệc, sự kiện chính thức hoặc dạ tiệc.
                            </div>
                        </div>
                        <div class="main-collection-data four">
                            @foreach ($productsSale as $product)
    <div class="product-item" data-id="{{ $product->id }}" data-handle="{{ Str::slug($product->name, '-') }}">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="{{ route('client-products.show', $product->id) }}" class="product-item-top-image-showcase">
                        <img src="{{ Storage::url($product->images->first()->image_path ?? 'default/path/to/image.jpg') }}"
                             alt="{{ $product->name }}" title="{{ $product->name }}"
                             width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-{{ number_format($product->discount_percentage, 2) }}%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <!-- SVG yêu thích -->
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="{{ route('client-products.index') }}" title="{{ $product->category->name ?? '' }}" aria-label="{{ $product->category->name ?? '' }}">
                        <span>{{ $product->category->name ?? '' }}</span>
                    </a>
                    <div class="sapo-product-reviews-badge" data-id="{{ $product->id }}"></div>
                </div>
                <h3 class="product-item-detail-title">
                    <a href="{{ route('client-products.show', $product->id) }}" title="{{ $product->name }}" aria-label="{{ $product->name }}">{{ $product->name }}</a>
                </h3>
                <div class="product-item-detail-price">
                    <strong>{{ number_format($product->price_sale, 0, ',', '.') }}₫</strong>
                    <del>{{ number_format($product->price, 0, ',', '.') }}₫</del>
                </div>
            </div>
        </div>
    </div>
@endforeach
                            <div class="shop-pagination">
                                <!-- Nút Trang trước -->
                                @if (!$productsSale->onFirstPage())
                                    <a href="{{ $productsSale->previousPageUrl() }}" title="Trang trước" aria-label="Trang trước">
                                        Trước
                                    </a>
                                @endif
                            
                                <!-- Xác định phạm vi hiển thị -->
                                @php
                                    $currentPage = $productsSale->currentPage();
                                    $lastPage = $productsSale->lastPage();
                                    $startPage = max(1, $currentPage - 4); // Bắt đầu từ trang hiện tại - 4
                                    $endPage = min($lastPage, $startPage + 9); // Kết thúc tại trang bắt đầu + 9
                            
                                    // Điều chỉnh để đảm bảo chúng ta không vượt quá phạm vi
                                    if ($endPage - $startPage < 9) {
                                        $startPage = max(1, $endPage - 9); // Nếu không đủ 10 trang, điều chỉnh lại startPage
                                    }
                                @endphp
                            
                                <!-- Hiển thị các số trang -->
                                @for ($page = $startPage; $page <= $endPage; $page++)
                                    @if ($page == $currentPage)
                                        <!-- Trang hiện tại -->
                                        <span class="current">{{ $page }}</span>
                                    @else
                                        <!-- Trang không phải trang hiện tại -->
                                        <a href="{{ $productsSale->url($page) }}" title="Trang {{ $page }}" aria-label="Trang {{ $page }}">{{ $page }}</a>
                                    @endif
                                @endfor
                            
                                <!-- Nút Trang sau -->
                                @if ($productsSale->hasMorePages())
                                    <a href="{{ $productsSale->nextPageUrl() }}" title="Trang sau" aria-label="Trang sau">
                                        Sau
                                    </a>
                                @endif
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
