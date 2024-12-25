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
                        src="{{asset('admin/img/banner4.jpg')}}"
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
                                <form action="{{ route('client.categories.filter') }}" method="GET">
                                    <div class="shop-filter-choose">
                                        <label>Bạn chọn:
                                            <button type="button" id="remove-all-filters" title="Bỏ hết">Bỏ hết</button>
                                        </label>
                                        <ul class="shop-filter-choose-data" id="selected-filters-list">
                                            @foreach($selectedFilters as $key => $value)
                                                <li class="filter-item">
                                                    <span>{{ $value }}</span>
                                                    <button type="button" class="remove-filter" data-filter-key="{{ $key }}">×</button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>



                                    <!-- Bộ lọc danh mục -->
                                    <div class="shop-filter" data-type="vendor">
                                        <h4>Danh mục sản phẩm</h4>
                                        <div class="shop-filter-list">
                                            @foreach($categories as $category)
                                                <div class="shop-filter-item">
                                                    <!-- Tạo checkbox và giữ trạng thái checked nếu đã chọn -->
                                                    <input type="checkbox"
                                                           id="shop-filter-vendor-{{ $category->id }}"
                                                           name="category[]"
                                                           value="{{ $category->id }}"
                                                           {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                                    <label for="shop-filter-vendor-{{ $category->id }}">{{ $category->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <style>
                                        /* Tùy chỉnh cho checkbox */
                                        .shop-filter-item input[type="checkbox"] {
    width: 20px;  /* Điều chỉnh kích thước của checkbox */
    height: 20px;
    margin-right: 10px;  /* Khoảng cách giữa checkbox và label */
    cursor: pointer;  /* Thêm hiệu ứng khi hover */
    appearance: none;  /* Tắt kiểu dáng mặc định của checkbox */
    border: 2px solid #000000; /* Viền màu đen */
    border-radius: 4px;  /* Bo góc */
    position: relative; /* Để tạo dấu V */
    background-color: #fff; /* Màu nền khi chưa chọn */
}

/* Tạo dấu 'V' khi checkbox được chọn */
.shop-filter-item input[type="checkbox"]:checked {
    background-color: #007BFF;  /* Màu nền khi checkbox được chọn */
    border-color: #007BFF;  /* Màu viền khi checkbox được chọn */
}

/* Tạo dấu 'V' khi checkbox được chọn */
.shop-filter-item input[type="checkbox"]:checked::after {
    content: '✔';  /* Dấu 'V' */
    color: white;  /* Màu chữ trắng */
    font-size: 16px;  /* Kích thước chữ */
    position: absolute;
    top: 50%; /* Căn giữa dấu V theo chiều dọc */
    left: 50%; /* Căn giữa dấu V theo chiều ngang */
    transform: translate(-50%, -50%); /* Căn chính xác dấu V vào giữa */
}

/* Tùy chỉnh label (chữ bên cạnh checkbox) */
.shop-filter-item label {
    font-size: 16px;
    cursor: pointer;
}
button.ft4:hover {
            background-color: #f8b4da !important;
            /* Màu hồng khi hover */
        }
                                    </style>

                                    <!-- Bộ lọc giá -->
                                    <div class="shop-filter" data-type="price">
                                        <h4>Giá sản phẩm</h4>
                                        <div class="shop-filter-list">
                                            <div class="shop-filter-item">
                                                <input type="checkbox" id="shop-filter-price-item1" name="price[]" value="<1000000"
                                                       {{ in_array('<1000000', $selectedPrices) ? 'checked' : '' }}>
                                                <label for="shop-filter-price-item1">Dưới 1.000.000₫</label>
                                            </div>
                                            <div class="shop-filter-item">
                                                <input type="checkbox" id="shop-filter-price-item2" name="price[]" value=">=1000000 AND <=3000000"
                                                       {{ in_array('>=1000000 AND <=3000000', $selectedPrices) ? 'checked' : '' }}>
                                                <label for="shop-filter-price-item2">Từ 1.000.000₫ - 3.000.000₫</label>
                                            </div>
                                            <div class="shop-filter-item">
                                                <input type="checkbox" id="shop-filter-price-item3" name="price[]" value=">=3000000 AND <=5000000"
                                                       {{ in_array('>=3000000 AND <=5000000', $selectedPrices) ? 'checked' : '' }}>
                                                <label for="shop-filter-price-item3">Từ 3.000.000₫ - 5.000.000₫</label>
                                            </div>
                                            <div class="shop-filter-item">
                                                <input type="checkbox" id="shop-filter-price-item4" name="price[]" value=">=5000000 AND <=10000000"
                                                       {{ in_array('>=5000000 AND <=10000000', $selectedPrices) ? 'checked' : '' }}>
                                                <label for="shop-filter-price-item4">Từ 5.000.000₫ - 10.000.000₫</label>
                                            </div>
                                            <div class="shop-filter-item">
                                                <input type="checkbox" id="shop-filter-price-item5" name="price[]" value=">10000000"
                                                       {{ in_array('>10000000', $selectedPrices) ? 'checked' : '' }}>
                                                <label for="shop-filter-price-item5">Trên 10.000.000₫</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-filter" data-type="color">
                                        <h4>Màu sắc</h4>
                                        <div class="shop-filter-list">
                                            @foreach($colors as $color)
                                                <div class="shop-filter-item">
                                                    <input type="checkbox" id="shop-filter-color-{{ $color->id }}" name="color[]"
                                                           value="{{ $color->id }}" {{ in_array($color->id, $selectedColors) ? 'checked' : '' }}>
                                                    <label for="shop-filter-color-{{ $color->id }}">{{ ucfirst($color->color) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Bộ lọc kích thước -->
                                    <div class="shop-filter" data-type="size">
                                        <h4>Kích thước</h4>
                                        <div class="shop-filter-list">
                                            @foreach($sizes as $size)
                                                <div class="shop-filter-item">
                                                    <input type="checkbox" id="shop-filter-size-{{ $size->id }}" name="size[]"
                                                           value="{{ $size->id }}" {{ in_array($size->id, $selectedSizes) ? 'checked' : '' }}>
                                                    <label for="shop-filter-size-{{ $size->id }}">{{ strtoupper($size->size) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="submit">Lọc</button>
                                </form>

                                <script>
                                    // Cập nhật danh sách các bộ lọc đã chọn
                                    function updateSelectedFilters() {
                                        const selectedFiltersList = document.getElementById("selected-filters-list");
                                        const checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

                                        // Xóa các bộ lọc cũ
                                        selectedFiltersList.innerHTML = "";

                                        // Thêm các bộ lọc mới
                                        checkboxes.forEach((checkbox) => {
                                            const label = document.querySelector(`label[for="${checkbox.id}"]`).innerText;
                                            const listItem = document.createElement("li");
                                            listItem.textContent = label;
                                            selectedFiltersList.appendChild(listItem);
                                        });

                                        // Hiển thị thông báo nếu không có bộ lọc nào
                                        if (checkboxes.length === 0) {
                                            const listItem = document.createElement("li");
                                            listItem.textContent = "Không có bộ lọc nào được chọn.";
                                            listItem.id = "no-filters";
                                            selectedFiltersList.appendChild(listItem);
                                        }
                                    }

                                    // Xóa tất cả bộ lọc đã chọn khi nhấn nút "Bỏ hết"
                                    document.getElementById("remove-all-filters").addEventListener("click", function(event) {
                                        event.preventDefault(); // Ngăn chặn submit form khi nhấn nút "Bỏ hết"
                                        const checkboxes = document.querySelectorAll("input[type='checkbox']");
                                        checkboxes.forEach((checkbox) => checkbox.checked = false);
                                        updateSelectedFilters();
                                    });

                                    // Cập nhật lại danh sách bộ lọc khi checkbox thay đổi
                                    document.querySelectorAll("input[type='checkbox']").forEach((checkbox) => {
                                        checkbox.addEventListener("change", updateSelectedFilters);
                                    });
                                    document.addEventListener('DOMContentLoaded', function () {
    const removeFilterButtons = document.querySelectorAll('.remove-filter');

    removeFilterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filterKey = this.getAttribute('data-filter-key');
            const url = new URL(window.location.href);

            // Remove the filter from URL
            url.searchParams.delete(filterKey);

            // Reload the page with the updated URL
            window.location.href = url.toString();
        });
    });
});
document.getElementById("remove-all-filters").addEventListener("click", function(event) {
    event.preventDefault(); // Ngăn chặn submit form khi nhấn nút "Bỏ hết"

    // Tắt tất cả các checkbox
    const checkboxes = document.querySelectorAll("input[type='checkbox']");
    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });

    // Gửi lại form với các bộ lọc đã bị xóa
    document.querySelector("form").submit();  // Submit form sau khi bỏ tất cả bộ lọc
});






                                </script>
                            </div>

                        <div class="main-collection-right">
                            <div class="main-collection-head">
                                <div class="shop-sort-style">
                                    <strong>Hiển thị</strong>
                                    <div class="shop-filter-mobile-btn">
                                        <button type="button" data-type="shop-filter-mobile-btn" title="Bộ lọc">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                <g>
                                                    <path d="M486.585 243.429-15.502-8.401c-1.179-.639-1.82-1.981-1.596-3.339 1.048-6.346 1.58-12.843 1.58-19.309 0-6.467-.532-12.963-1.58-19.308-.225-1.359.417-2.701 1.596-3.34l15.502-8.4c4.266-2.311 7.376-6.145 8.757-10.796 1.382-4.65.87-9.561-1.441-13.825l-17.226-31.788c-4.772-8.804-15.817-12.085-24.621-7.314l-15.518 8.409c-1.178.64-2.641.453-3.637-.461-12.001-11.015-25.858-19.283-41.188-24.576-1.341-.463-2.242-1.679-2.242-3.025v-17.615c0-10.015-8.148-18.162-18.162-18.162h-36.154c-10.014 0-18.162 8.147-18.162 18.162v17.615c0 1.346-.901 2.562-2.241 3.025-15.331 5.293-29.189 13.562-41.188 24.576-.997.915-2.459 1.1-3.638.461l-15.518-8.41c-8.805-4.771-19.849-1.488-24.621 7.316l-17.225 31.787c-2.311 4.265-2.823 9.175-1.441 13.825.563 1.896 1.427 3.646 2.525 5.222h-95.46c-4.143 0-7.502 3.358-7.502 7.502 0 4.143 3.359 7.502 7.502 7.502h237.64c.436 0 .791.355.791.791v42.447h-325.714v-42.446c0-.437.355-.791.791-.791h52.484c4.143 0 7.502-3.358 7.502-7.502 0-4.143-3.359-7.502-7.502-7.502h-52.484c-8.709 0-15.794 7.085-15.794 15.794v49.948c0 .053.007.104.008.156.002.085.008.168.013.253.014.267.042.531.084.79.01.062.017.124.028.185.061.325.141.642.242.95.013.041.03.081.044.121.097.279.21.55.338.812.026.055.051.11.079.164.15.291.316.571.502.839.03.043.064.084.095.127.171.236.356.461.553.675.029.032.051.068.081.099l134.961 141.809c1.399 1.47 2.169 3.397 2.169 5.425v76.002c0 4.577 2.475 8.82 6.457 11.072l51.878 29.35c1.967 1.113 4.118 1.669 6.267 1.668 2.204 0 4.406-.584 6.407-1.75 3.953-2.305 6.313-6.413 6.313-10.99v-36.555c0-4.143-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v32.643l-47.316-26.769v-74.671c0-5.896-2.239-11.496-6.305-15.768l-122.898-129.135h305.726l-15.143 15.912c-.015.016-.03.032-.045.048l-107.713 113.178c-4.065 4.271-6.304 9.871-6.304 15.767v33.79c0 4.143 3.359 7.502 7.502 7.502s7.502-3.358 7.502-7.502v-33.79c0-2.029.77-3.955 2.169-5.424l66.857-70.25c4.322 2.116 8.773 3.983 13.304 5.547 1.341.463 2.242 1.679 2.242 3.025v17.615c0 10.015 8.148 18.162 18.162 18.162h36.154c10.014 0 18.162-8.147 18.162-18.162v-17.615c0-1.346.901-2.562 2.242-3.025 15.332-5.294 29.19-13.562 41.188-24.576.998-.914 2.459-1.098 3.638-.461l15.518 8.41c8.804 4.771 19.849 1.489 24.621-7.316l17.224-31.788c2.311-4.265 2.823-9.175 1.441-13.825-1.381-4.652-4.491-8.485-8.756-10.796z" fill="#000000"></path>
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
                    <div class="main-collection-right">


                        <h1 class="titleStyle1">Sản phẩm của chúng tôi</h1>



<div class="main-collection-data four">

    @foreach ($products as $product)

        <div class="product-item" data-id="{{ $product->id }}" data-handle="{{ $product->slug }}">
            <div class="product-item-wrap">
                <div class="product-item-top">
                    <div class="product-item-top-image">
                        <a href="{{ route('client-products.show', $product->id) }}" class="product-item-top-image-showcase">
                            <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                 alt="{{ $product->name }}"
                                 title="{{ $product->name }}" width="480" height="480" loading="lazy" decoding="async">
                        </a>

                    </div>

                    @if($product->price > 0 && $product->price_sale < $product->price)
                    <div class="product-item-label-sale">
                        <span>{{ number_format(100 - (($product->price_sale / $product->price) * 100), 2) }}%</span>
                    </div>
                @endif
                    <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                        <!-- SVG icon for wishlist button -->
                    </button>
                    {{-- <style>
                        /* Modal Styles */
                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1000;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            overflow: auto;
                            background-color: rgba(0, 0, 0, 0.5);
                        }

                        .modal-content {
                            background-color: #fff;
                            margin: 10% auto;
                            padding: 20px;
                            border-radius: 8px;
                            width: 90%;
                            max-width: 500px;
                            position: relative;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                        .close {
                            position: absolute;
                            top: 10px;
                            right: 15px;
                            color: #333;
                            font-size: 24px;
                            font-weight: bold;
                            cursor: pointer;
                        }

                        .form-group {
                            margin-bottom: 15px;
                        }

                        .form-group label {
                            display: block;
                            margin-bottom: 5px;
                            font-weight: bold;
                        }

                        .form-group select,
                        .form-group input {
                            width: 100%;
                            padding: 8px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            font-size: 14px;
                        }

                        .ft1 {
                            display: inline-block;
                            padding: 10px 20px;
                            background-color: #007bff;
                            color: #fff;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            text-align: center;
                            font-size: 14px;
                        }

                        .shop-addLoop-button {
                            display: inline-block;
                            padding: 10px 15px;
                            background-color: #28a745;
                            color: #fff;
                            border-radius: 4px;
                            cursor: pointer;
                            text-decoration: none;
                        }

                        .shop-addLoop-button:hover {
                            background-color: #218838;
                        }

                        .shop-quickview-button {
                            display: inline-block;
                            padding: 10px 15px;
                            background-color: #ffc107;
                            color: #333;
                            border-radius: 4px;
                            cursor: pointer;
                            text-decoration: none;
                        }

                        .shop-quickview-button:hover {
                            background-color: #e0a800;
                        }

                        /* Toggle Modal */
                        .modal-toggle:checked ~ .modal {
                            display: block;
                        }
                    </style> --}}
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
                        .form-group{
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
                    <p class="product-item-category" style="font-size: 0.7em; color: #888; opacity: 0.7; margin-bottom: 10px;">
                        <a href="{{ route('client-products.show', $product->id) }}">{{ $product->name }}</a> <!-- Lấy tên danh mục từ mối quan hệ với Category -->
                   </p>

                    <h2 class="product-item-name" style="font-size: 0.8em; font-weight: 500;"><a href="{{ route('client-products.show', $product->id) }}">{{ $product->name }}</a></h2> <!-- Giảm phông chữ của tên sản phẩm -->




                    <p class="product-item-price">
                        <span class="original-price" style="color: red; font-size: 1.2em;">
                            {{ number_format($product->price_sale, 0, ',', '.') }} VNĐ
                        </span>

                        <span class="sale-price" style="text-decoration: line-through; color: #999999; font-size: 0.8em; margin-left: 10px;">
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