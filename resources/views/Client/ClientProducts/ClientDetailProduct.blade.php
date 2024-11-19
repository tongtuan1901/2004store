@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <script>
            window.F1GENZ_vars.product.featured.style_gallery = "style3"
        </script>


        <div class="main-product">
            <div class="main-product-breadcrumb" title="">
                <div class="container">
                    <div hidden class="section-title-all">
                        <h1>{{ $productDetail->name }}</h1>
                    </div>
                    <div class="breadcrumb-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="" aria-label="Trang chủ" title="Trang chủ">Trang
                                    chủ</a></li>
                            <li class="breadcrumb-item"><a href="cocktail-dresses.html" aria-label="Cocktail Dresses"
                                    title="Cocktail Dresses">Cocktail Dresses</a></li>
                            <li class="breadcrumb-item active"><span> {{ $productDetail->name }}</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Flash Sale -->
                <div class="productFSale">
                    <img loading="lazy" decoding="async" src="" alt="productFSale" />
                    <div data-time="1/4/2025 24:00:00" class="countdownLoop"></div>
                    <a href="cocktail-dresses.html" aria-label="Xem toàn bộ sản phẩm Flash Sale"
                        title="Xem toàn bộ sản phẩm Flash Sale">Xem toàn bộ sản phẩm Flash Sale</a>
                </div>
                <div class="main-product-wrap">
                    <div class="main-product-left main-product-feature" data-style="style3">
                        <div class="main-product-feature-thumbs">
                            <!-- Carousel cho hình ảnh lớn -->
                            <div id="productCarouselClient" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    @php $displayedImages = []; @endphp
                                    @foreach ($productDetail->variations as $key => $variation)
                                        @if ($variation->image && !in_array($variation->image->image_path, $displayedImages))
                                            <div class="carousel-item @if ($key === 0) active @endif">
                                                <img src="{{ asset('storage/' . $variation->image->image_path) }}"
                                                    class="d-block w-100" alt="Product Variation Image">
                                            </div>
                                            @php $displayedImages[] = $variation->image->image_path; @endphp
                                        @endif
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarouselClient"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarouselClient"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            <!-- Thumbnails với kiểu carousel -->
                            <div id="thumbnailCarousel" class="carousel slide mt-3" data-bs-ride="false">
                                <div class="carousel-inner">
                                    @php $displayedThumbImages = []; @endphp
                                    @foreach ($productDetail->variations as $key => $variation)
                                        @if ($variation->image && !in_array($variation->image->image_path, $displayedThumbImages))
                                            @if ($key % 5 === 0)
                                                <div class="carousel-item @if ($key === 0) active @endif">
                                                    <div class="d-flex">
                                            @endif
                                            <div class="col-3">
                                                <img src="{{ asset('storage/' . $variation->image->image_path) }}"
                                                    class="img-thumbnail" alt="Thumbnail Image"
                                                    data-bs-slide-to="{{ $key }}"
                                                    onclick="document.querySelector('#productCarouselClient .carousel-item.active').classList.remove('active'); document.querySelector('#productCarouselClient .carousel-item:nth-child({{ $key + 1 }})').classList.add('active');">
                                            </div>
                                            @php $displayedThumbImages[] = $variation->image->image_path; @endphp
                                            @if ($key % 5 === 4)
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            @if ($key % 5 !== 4)
                        </div>
                    </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#thumbnailCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#thumbnailCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
            </div>
        </div>
        </div>



        <div class="main-product-right">
            <div class="main-product-share">
                <button type="button" data-type="main-product-share-overplay" class="main-product-share-overplay"></button>
                <button type="button" data-type="main-product-share-open-popup" class="main-product-share-cta"
                    title="Chia sẻ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="#595959"
                            d="M19 3c-1.652 0-3 1.348-3 3 0 .46.113.895.3 1.285L12.587 11h-4.77A2.999 2.999 0 005 9c-1.652 0-3 1.348-3 3s1.348 3 3 3c1.3 0 2.402-.84 2.816-2h4.77l3.715 3.715c-.188.39-.301.824-.301 1.285 0 1.652 1.348 3 3 3s3-1.348 3-3-1.348-3-3-3c-.46 0-.895.113-1.285.3l-3.3-3.3 3.3-3.3c.39.187.824.3 1.285.3 1.652 0 3-1.348 3-3s-1.348-3-3-3z">
                        </path>
                    </svg>
                </button>
                <div class="main-product-share-popup">
                    <div class="main-product-share-popup-head">
                        <label>Chia sẻ</label>
                        <a target="_blank" aria-label="Chia sẻ Facebook" title="Chia sẻ Facebook"
                            href="https://www.facebook.com/sharer.php?u=https://f1genz-model-fashion.mysapo.net/ao-day-twist-drape"><svg
                                width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27 0H5a5 5 0 00-5 5v22a5 5 0 005 5h22a5 5 0 005-5V5a5 5 0 00-5-5z"
                                    fill="#1778F2"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.314 32V19.499h3.255L24 15.19h-3.686l.006-2.156c0-1.123.1-1.725 1.623-1.725h2.034V7h-3.255c-3.91 0-5.285 2.09-5.285 5.604v2.587H13v4.308h2.437V32h4.877z"
                                    fill="#fff"></path>
                            </svg></a>
                        <a target="_blank" aria-label="Chia sẻ Facebook" title="Chia sẻ Twitter"
                            href="https://twitter.com/intent/tweet?url=https://f1genz-model-fashion.mysapo.net/ao-day-twist-drape"><svg
                                width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="4" fill="#1FA1F3"></rect>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.73 13.235l.04.634-.674-.077c-2.455-.298-4.6-1.308-6.42-3.004l-.89-.841-.23.621c-.485 1.385-.175 2.848.836 3.832.54.544.419.622-.512.298-.324-.104-.607-.181-.634-.143-.094.091.23 1.27.486 1.735.35.648 1.065 1.282 1.847 1.657l.661.298-.782.013c-.755 0-.782.013-.701.285.27.841 1.335 1.735 2.522 2.123l.836.272-.728.414a7.894 7.894 0 01-3.615.958c-.607.013-1.106.065-1.106.104 0 .13 1.646.854 2.603 1.14 2.873.84 6.285.478 8.848-.959 1.82-1.023 3.642-3.055 4.491-5.023.459-1.049.918-2.965.918-3.884 0-.596.04-.673.795-1.385.445-.415.864-.868.945-.997.134-.246.12-.246-.567-.026-1.146.388-1.308.337-.742-.246.418-.414.917-1.165.917-1.385 0-.04-.202.026-.431.142-.243.13-.783.324-1.187.44l-.729.22-.66-.427c-.364-.233-.877-.492-1.147-.57-.688-.18-1.74-.155-2.36.052-1.686.583-2.752 2.085-2.63 3.729z"
                                    fill="#fff"></path>
                            </svg></a>
                        <a target="_blank" aria-label="Chia sẻ Facebook" title="Chia sẻ WhatsApp"
                            href="https://wa.me/?text=https://f1genz-model-fashion.mysapo.net/ao-day-twist-drape"><svg
                                viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
                                <path
                                    d="M116.225-.001c-11.264.512-26.112 1.536-32.768 3.072-10.24 2.048-19.968 5.12-27.648 9.216-9.728 4.608-17.92 10.752-25.088 17.92-7.68 7.68-13.824 15.872-18.432 25.6-4.096 7.68-7.168 17.408-9.216 27.648-1.536 6.656-2.56 21.504-2.56 32.768-.512 4.608-.512 10.752-.512 13.824v265.729c.512 11.264 1.536 26.112 3.072 32.768 2.048 10.24 5.12 19.968 9.216 27.648 4.608 9.728 10.752 17.92 17.92 25.088 7.68 7.68 15.872 13.824 25.6 18.432 7.68 4.096 17.408 7.168 27.648 9.216 6.656 1.536 21.504 2.56 32.768 2.56 4.608.512 10.752.512 13.824.512h265.728c11.264-.512 26.112-1.536 32.768-3.072 10.24-2.048 19.968-5.12 27.648-9.216 9.728-4.608 17.92-10.752 25.088-17.92 7.68-7.68 13.824-15.872 18.432-25.6 4.096-7.68 7.168-17.408 9.216-27.648 1.536-6.656 2.56-21.504 2.56-32.768.512-4.608.512-10.752.512-13.824V116.223c-.512-11.264-1.536-26.112-3.072-32.768-2.048-10.24-5.12-19.968-9.216-27.648-4.608-9.728-10.752-17.92-17.92-25.088-7.68-7.68-15.872-13.824-25.6-18.432-7.68-4.096-17.408-7.168-27.648-9.216-6.656-1.536-21.504-2.56-32.768-2.56-4.608-.512-10.752-.512-13.824-.512H116.225z"
                                    fill="url(#whatsApp_svg___Linear1)" fill-rule="nonzero"></path>
                                <path
                                    d="M344.754 289.698c-4.56-2.282-26.98-13.311-31.161-14.832-4.18-1.521-7.219-2.282-10.259 2.282-3.041 4.564-11.78 14.832-14.44 17.875-2.66 3.042-5.32 3.423-9.88 1.14-4.561-2.281-19.254-7.095-36.672-22.627-13.556-12.087-22.709-27.017-25.369-31.581s-.283-7.031 2-9.304c2.051-2.041 4.56-5.324 6.84-7.986 2.28-2.662 3.04-4.564 4.56-7.606 1.52-3.042.76-5.705-.38-7.987-1.14-2.282-10.26-24.72-14.06-33.848-3.701-8.889-7.461-7.686-10.26-7.826-2.657-.132-5.7-.16-8.74-.16-3.041 0-7.98 1.141-12.161 5.704-4.18 4.564-15.96 15.594-15.96 38.032 0 22.438 16.34 44.116 18.62 47.159 2.281 3.043 32.157 49.089 77.902 68.836 10.88 4.697 19.374 7.501 25.997 9.603 10.924 3.469 20.866 2.98 28.723 1.806 8.761-1.309 26.98-11.029 30.781-21.677 3.799-10.649 3.799-19.777 2.659-21.678-1.139-1.902-4.179-3.043-8.74-5.325m-83.207 113.573h-.061c-27.22-.011-53.917-7.32-77.207-21.137l-5.539-3.287-57.413 15.056 15.325-55.959-3.608-5.736c-15.184-24.145-23.203-52.051-23.192-80.704.033-83.611 68.083-151.635 151.756-151.635 40.517.016 78.603 15.811 107.243 44.474 28.64 28.663 44.404 66.764 44.389 107.283-.035 83.617-68.083 151.645-151.693 151.645m129.102-280.709c-34.457-34.486-80.281-53.487-129.103-53.507-100.595 0-182.468 81.841-182.508 182.437-.013 32.156 8.39 63.546 24.361 91.212l-25.892 94.545 96.75-25.37c26.657 14.535 56.67 22.194 87.216 22.207h.075c100.586 0 182.465-81.852 182.506-182.448.019-48.751-18.946-94.59-53.405-129.076"
                                    fill="#fff"></path>
                                <defs>
                                    <linearGradient gradientTransform="matrix(0 -512 -512 0 256.001 512)"
                                        gradientUnits="userSpaceOnUse" id="whatsApp_svg___Linear1" x1="0"
                                        x2="1" y1="0" y2="0">
                                        <stop offset="0" stop-color="#25cf43"></stop>
                                        <stop offset="1" stop-color="#61fd7d"></stop>
                                    </linearGradient>
                                </defs>
                            </svg></a>
                        <a target="_blank" aria-label="Chia sẻ Facebook" title="Chia sẻ Linkedin"
                            href="https://www.linkedin.com/sharing/share-offsite/?url=https://f1genz-model-fashion.mysapo.net/ao-day-twist-drape"><svg
                                width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="4" fill="#0077B5"></rect>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.857 9.07c-.022-1.094-.744-1.927-1.917-1.927S7 7.976 7 9.07C7 10.142 7.744 11 8.895 11h.022c1.196 0 1.94-.858 1.94-1.93zm0 3.216H7v11.571h3.857V12.286zm9.294 0c2.771 0 4.849 1.616 4.849 5.089v6.482h-4.212V17.81c0-1.52-.609-2.556-2.134-2.556-1.163 0-1.856.698-2.16 1.373-.112.242-.14.58-.14.917v6.314h-4.211s.055-10.244 0-11.305h4.212v1.601c.559-.77 1.56-1.867 3.796-1.867z"
                                    fill="#fff"></path>
                            </svg></a>
                    </div>
                    <hr>
                    <div class="main-product-share-popup-body">
                        <label>Sao chép đường dẫn</label>
                        <form>
                            <input value="https://f1genz-model-fashion.mysapo.net/ao-day-twist-drape" readonly
                                id="main-product-share-copy" />
                            <button type="button" title="Sao chép" data-type="main-product-share-copy">Sao
                                chép</button>
                        </form>
                    </div>
                </div>
            </div>

            <h1 class="main-product-title ">{{ $productDetail->name }}</h1>
            <div class="main-product-info">
                <div class="main-product-info-vendor">
                    <strong>Thương hiệu: </strong>
                    <span>{{ $productDetail->brand ? $productDetail->brand->name : 'Không có' }}</span>
                </div>
                <div class="main-product-info-type">
                    <strong>Dòng sản phẩm: </strong>
                    <span>{{ $productDetail->category ? $productDetail->category->name : 'Không có' }}</span>
                </div>
            </div>

            <div class="main-product-swatch">
                <div id="product-base-price" class="main-product-price">
                    <div class="main-product-price-wrap">
                        <del class="main-product-price-compare">{{ number_format($productDetail->price, 0, ',', '.') }}
                            VND</del>
                        <span class="main-product-price-this">{{ number_format($productDetail->price_sale, 0, ',', '.') }}
                            VND</span>
                        <span class="main-product-price-discount">Tiết kiệm 11%</span>
                    </div>
                </div>
                {{-- <div id="variation-price" style="margin-top: 10px;color:#e95d00; font-size: 20px"></div>
                <div class="product-sw-line">
                    <div class="product-sw-select">
                        <div class="product-sw-title">Color</div>
                        <div class="variation mb-3">
                            <div class="variation-content d-flex">
                                @php $uniqueColors = []; @endphp
                                @foreach ($productDetail->variations as $variation)
                                    @if (!in_array($variation->color->color, $uniqueColors))
                                        <span class="product-sw-select-item">
                                            <input type="radio" data-color="{{ $variation->color->color }}"
                                                name="product-choose-color" value="{{ $variation->color->color }}"
                                                data-image="{{ asset('storage/' . $variation->image->image_path) }}"
                                                data-price="{{ $variation->price }}" class="trigger-option-sw d-none"
                                                id="product-choose-color-{{ $variation->color->id }}">
                                            <label for="product-choose-color-{{ $variation->color->id }}"
                                                class="product-sw-select-item-span">{{ $variation->color->color }}</label>
                                        </span>
                                        @php $uniqueColors[] = $variation->color->color; @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
                <form action="{{ route('cart.add') }}" method="POST" id="cart-form">
    @csrf
    <input type="hidden" name="product_id" value="{{ $productDetail->id }}">
    
    <!-- Color selection -->
    <div class="product-sw-line">
        <div class="product-sw-select">
            <div class="product-sw-title">Color</div>
            <div class="variation mb-3">
                <div class="variation-content d-flex">
                    @php $uniqueColors = []; @endphp
                    @foreach ($productDetail->variations as $variation)
                        @if (!in_array($variation->color->color, $uniqueColors))
                            <span class="product-sw-select-item">
                                <input type="radio" 
                                    name="color" 
                                    value="{{ $variation->color->id }}"
                                    data-color="{{ $variation->color->color }}"
                                    data-image="{{ $variation->image ? asset('storage/' . $variation->image->image_path) : asset('path/to/placeholder/image.jpg') }}"
                                    data-price="{{ $variation->price }}"
                                    class="trigger-option-sw d-none"
                                    id="product-choose-color-{{ $variation->color->id }}" required>
                                <label for="product-choose-color-{{ $variation->color->id }}"
                                    class="product-sw-select-item-span">{{ $variation->color->color }}</label>
                            </span>
                            @php $uniqueColors[] = $variation->color->color; @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Size selection -->
    <div class="product-sw-line">
        <div class="product-sw-select">
            <div class="product-sw-title">Size</div>
            <div class="variation mb-3">
                <div class="variation-content d-flex">
                    @php $uniqueSizes = []; @endphp
                    @foreach ($productDetail->variations as $variation)
                        @if (!in_array($variation->size->size, $uniqueSizes))
                            <span class="product-sw-select-item">
                                <input type="radio" 
                                    name="size" 
                                    value="{{ $variation->size->id }}"
                                    data-size="{{ $variation->size->size }}"
                                    class="trigger-option-sw d-none"
                                    id="product-choose-size-{{ $variation->size->id }}" required>
                                <label for="product-choose-size-{{ $variation->size->id }}"
                                    class="product-sw-select-item-span">{{ $variation->size->size }}</label>
                            </span>
                            @php $uniqueSizes[] = $variation->size->size; @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Quantity -->
    <div class="main-product-quantity shop-quantity-wrap">
        <label>Số lượng</label>
        <div class="shop-quantity">
            <button type="button" data-type="shop-quantity-minus" class="quantity-btn">-</button>
            <input type="number" name="quantity" value="1" min="1" class="quantity-input">
            <button type="button" data-type="shop-quantity-plus" class="quantity-btn">+</button>
        </div>
    </div>

    <!-- Action buttons -->
    <div class="main-product-cta">
        <button type="submit" name="action" value="addToCart" class="add-to-cart-btn">
            <strong>Thêm vào giỏ</strong>
            <span>Chọn ngay sản phẩm bạn yêu thích</span>
        </button>
        <button type="submit" name="action" value="buyNow" class="buy-now-btn">
            <strong>Mua ngay</strong>
            <span>Mua ngay sản phẩm này</span>
        </button>
    </div>
</form>
                <!-- HTML remains the same -->
                <button type="button" data-type="main-product-send-help" title="Tư vấn">
                    <strong>Tư vấn</strong>
                    <span>Tư vấn kích cỡ phù hợp</span>
                </button>
                <button type="button" data-type="main-product-send-info" onclick="window.open('pages/lien-he.html')"
                    title="Liên hệ">
                    <strong>Liên hệ</strong>
                    <span>Chúng tôi luôn bên bạn 24/7</span>
                </button>
            </div>
            <div class="main-product-banner">
                <a href="collections/all.html" aria-label="Beauty Cosmetic" title="Beauty Cosmetic">
                    <img width="1500" height="300" loading="lazy" decoding="sync"
                        src="../bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/main_product_bannerb1ed.jpg?1724041824574"
                        sizes="(max-width: 600px) 480px, 1024px"
                        srcset="//bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/main_product_banner.jpg?1724041824574 480w, //bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/main_product_banner.jpg?1724041824574 1024w"
                        alt="Beauty Cosmetic" />
                </a>
            </div>

            <div class="main-product-description inSidebar">
                <div class="main-product-description-items">
                    <div class="main-product-description-item active" data-type="des">
                        <span class="main-product-description-item-head">Mô tả sản phẩm</span>
                        <div class="main-product-description-item-data-wrap">
                            <div class="main-product-description-item-data">
                                <p>{{ $productDetail->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="sapo-buyxgety-module-detail-v2"></div>
        <div id="sapo-product-reviews" class="sapo-product-reviews" data-id="36389545">
            <div id="sapo-product-reviews-noitem" style="display: none;">
                <div class="content">
                    <p data-content-text="language.suggest_noitem"></p>
                    <div class="product-reviews-summary-actions">
                        <button type="button" class="btn-new-review" onclick="BPR.newReview(this); return false;"
                            data-content-str="language.newreview"></button>
                    </div>
                    <div id="noitem-bpr-form_" data-id="formId" class="noitem-bpr-form" style="display:none;">
                        <div class="sapo-product-reviews-form"></div>
                    </div>
                </div>
            </div>

        </div>

        <div>
            <div class="comments-section mt-4">
            <div class="btn-group mb-3">
                <button id="btn-comments" class="btn btn-primary">Bình luận</button>
                <button id="btn-reviews" class="btn btn-secondary">Đánh giá</button>
            </div>
            
            <div id="comments-section">
                <h5>Bình luận:</h5>
                @if($productDetail->comments)
                    @foreach ($productDetail->comments as $comment)
                        <div class="comment-item mb-3">
                            <div class="comment-header">
                                <strong>{{ $comment->user->name }}</strong>
                                <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="comment-content">
                                {{ $comment->content }}
                            </div>
                        </div>
                    @endforeach
                @endif
            
                @auth
                    <form method="POST" action="{{ route('client-products.comments.store', $productDetail->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="content" class="form-label">Viết bình luận của bạn:</label>
                            <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    </form>
                @else
                    <div class="mb-3">
                        <label for="content" class="form-label">Viết bình luận của bạn:</label>
                        <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <p class="text-muted">Bạn phải <a class="btn btn-success" href="{{ route('client-login.index') }}">đăng nhập</a> để bình luận.</p>
                @endauth
            </div>
            
            <div id="reviews-section" style="display: none;">
                <h2>Đánh giá sản phẩm</h2>
                <div id="reviews-section">
                    @if($productDetail->reviews->isEmpty())
                        <p>Chưa có đánh giá nào cho sản phẩm này.</p>
                    @else
                        @foreach ($productDetail->reviews as $review)
                            <div class="review">
                                <h4>{{ $review->user->name }}</h4>
                                
                                <!-- Hiển thị sao đánh giá -->
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)

                                        <i class="fa fa-star text-warning"></i> <!-- Sao vàng -->
                                        @else
                                            <i class="fa fa-star text-secondary"></i> <!-- Sao xám -->
                                        @endif
                                    @endfor
                                </div>
            
                                <p>{{ $review->comment }}</p>
                                <small>Đăng vào ngày {{ $review->created_at->format('d/m/Y') }}</small>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>
            
            
            <script>
                document.getElementById('btn-comments').addEventListener('click', function () {
                    document.getElementById('comments-section').style.display = 'block';
                    document.getElementById('reviews-section').style.display = 'none';
                });
            
                document.getElementById('btn-reviews').addEventListener('click', function () {
                    document.getElementById('comments-section').style.display = 'none';
                    document.getElementById('reviews-section').style.display = 'block';
                });
            </script>
            
        </div>



        <div class="main-product-relate">
            <div class="section-title-all">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="main-product-relate-data">

                <div class="product-item" data-id="120912676" data-handle="ao-phong-co-chu-v-logo-rosy">
                    <div class="product-item-wrap">
                        <div class="related-products">
                            @foreach ($relatedProducts as $relatedProduct)
                                <div class="product-item-detail">
                                    <div class="product-item-top-image">
                                        <a href="{{ route('client-products.show', $relatedProduct->id) }}"
                                            class="product-item-top-image-showcase">
                                            <img src="{{ Storage::url($relatedProduct->images->first()->image_path ?? 'default/path/to/image.jpg') }}"
                                                alt='{{ $relatedProduct->name }}' title='{{ $relatedProduct->name }}'
                                                width="300" height="480" loading="lazy" decoding="async">

                                        </a>
                                    </div>
                                    <div class="product-item-detail-flex">
                                        <a class="product-item-detail-vendor"
                                            href="{{ route('client-products.show', $relatedProduct->id) }}"
                                            title="{{ $relatedProduct->brand->name }}"
                                            aria-label="{{ $relatedProduct->brand->name }}">
                                            <span>{{ $relatedProduct->brand->name }}</span>
                                        </a>
                                        <div class="sapo-product-reviews-badge" data-id="{{ $relatedProduct->id }}">
                                        </div>
                                    </div>
                                    <h3 class="product-item-detail-title">
                                        <a href="{{ route('client-products.show', $relatedProduct->id) }}"
                                            title="{{ $relatedProduct->name }}"
                                            aria-label="{{ $relatedProduct->name }}">
                                            {{ $relatedProduct->name }}
                                        </a>
                                    </h3>
                                    <div class="product-item-detail-price">
                                        <strong>{{ number_format($relatedProduct->price_sale, 0, ',', '.') }}₫</strong>
                                        <del>{{ number_format($relatedProduct->price, 0, ',', '.') }}₫</del>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('input[name="product-choose-color"]').forEach(function(input) {
            input.addEventListener('change', updateDetails);
        });

        document.querySelectorAll('input[name="product-choose-size"]').forEach(function(input) {
            input.addEventListener('change', updateDetails);
        });

        function updateDetails() {
            var selectedColor = document.querySelector('input[name="product-choose-color"]:checked');
            var selectedSize = document.querySelector('input[name="product-choose-size"]:checked');

            if (selectedColor && selectedSize) {
                @foreach ($productDetail->variations as $variation)
                    if (selectedColor.value === "{{ $variation->color->color }}" && selectedSize.value ===
                        "{{ $variation->size->size }}") {
                        document.getElementById('variation-quantity').innerText =
                            "Số lượng còn lại: {{ $variation->quantity }}";
                    }
                @endforeach
            } else {
                document.getElementById('variation-quantity').innerText = '';
            }
        }
        document.querySelectorAll('.product-sw-select-item label').forEach(function(label) {
            label.addEventListener('click', function() {
                var radio = document.getElementById(label.getAttribute('for'));
                radio.blur();
            });
        });
        document.querySelector('[data-type="shop-quantity-minus"]').addEventListener('click', function() {
            var input = document.querySelector('input[name="quantity"]');
            var currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        });

        document.querySelector('[data-type="shop-quantity-plus"]').addEventListener('click', function() {
            var input = document.querySelector('input[name="quantity"]');
            input.value = parseInt(input.value) + 1;
        });
       // Cập nhật hình ảnh khi chọn màu
document.querySelectorAll('input[name="color"]').forEach(function(input) {
    input.addEventListener('change', function() {
        if (this.checked) {
            var newImage = this.getAttribute('data-image');
            document.querySelector('.main-product-feature-thumbs .carousel-item.active img').src = newImage;
        }
    });
});


// Kiểm tra form trước khi submit
document.getElementById('cart-form').addEventListener('submit', function(e) {
    var color = document.querySelector('input[name="color"]:checked');
    var size = document.querySelector('input[name="size"]:checked');
    
    if (!color || !size) {
        e.preventDefault();
        alert('Vui lòng chọn màu sắc và kích thước');
    }
});
        document.querySelectorAll('input[name="product-choose-color"]').forEach(function(input) {
            input.addEventListener('change', updatePrice);
        });

        document.querySelectorAll('input[name="product-choose-size"]').forEach(function(input) {
            input.addEventListener('change', updatePrice);
        });

        function updatePrice() {
            var selectedColor = document.querySelector('input[name="product-choose-color"]:checked');
            var selectedSize = document.querySelector('input[name="product-choose-size"]:checked');

            if (selectedColor && selectedSize) {
                @foreach ($productDetail->variations as $variation)
                    if (selectedColor.value === "{{ $variation->color->color }}" && selectedSize.value ===
                        "{{ $variation->size->size }}") {
                        document.getElementById('product-base-price').style.display = 'none';
                        document.getElementById('variation-price').style.display = 'block';
                        document.getElementById('variation-price').innerHTML = `
                    <div class="main-product-price-wrap">
                        <span class="main-product-price-compare">{{ number_format($variation->price, 0, ',', '.') }} VND</span>

                    </div>`;
                    }
                @endforeach
            } else {
                document.getElementById('product-base-price').style.display = 'block';
                document.getElementById('variation-price').style.display = 'none';
                document.getElementById('variation-price').innerHTML = '';
            }
        }
        const thumbnails = document.querySelector('.thumbnail-container');
        const thumbnailItems = document.querySelectorAll('.thumbnail-item');
        const prevButton = document.getElementById('prevThumbnail');
        const nextButton = document.getElementById('nextThumbnail');
        let currentIndex = 0;

        function updateThumbnails() {
            thumbnailItems.forEach((item, index) => {
                if (index === currentIndex) {
                    item.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }
            });

            prevButton.disabled = currentIndex <= 0;
            nextButton.disabled = currentIndex >= thumbnailItems.length - 1;
        }

        prevButton.onclick = function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateThumbnails();
            }
        };

        nextButton.onclick = function() {
            if (currentIndex < thumbnailItems.length - 1) {
                currentIndex++;
                updateThumbnails();
            }
        };

        updateThumbnails();
    </script>
    <style>
        .product-sw-select-item label {
            outline: none;
        }

        .product-sw-select-item input[type="radio"]:focus {
            outline: none;
        }

        .product-sw-select-item {
            margin-right: 3px;
        }

        .product-sw-select-item input[type="radio"]:checked+label {
            background-color: #ccc;
            color: #fff;
        }

        .product-sw-select-item label {
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-sw-select-item label:hover {
            background-color: #e0e0e0;
        }

        .main-product-quantity {
            margin-top: 20px;
        }

        .shop-quantity {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            margin-left: 30px;
        }

        .quantity-btn {
            background-color: #f0f0f0;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .quantity-btn:hover {
            background-color: #e0e0e0;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 10px;
            padding: 5px;
        }

        .buy-now-btn {
            background-color: #f99100;
            margin-left: 30px;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buy-now-btn:hover {
            background-color: #e95d00;
        }

        .main-product-left {
            max-width: 600px;
            /* Width of the image container */
            margin-top: auto;
        }

        .carousel-inner img {
            max-height: 400px;
            /* Adjust height as needed */
            object-fit: contain;
            /* Maintain aspect ratio */
        }

        .thumbs img {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .thumbs img:hover {
            transform: scale(1.05);
            /* Slight zoom effect on hover */
        }

        .thumbs .col-3 {
            padding: 5px;
            /* Spacing between thumbnails */
        }

        .main-product-left {
            max-width: 600px;
            /* Width of the image container */
            margin: auto;
        }

        .carousel-inner img {
            max-height: 400px;
            /* Adjust height as needed */
            object-fit: contain;
            /* Maintain aspect ratio */
        }

        .thumbs img {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .thumbs img:hover {
            transform: scale(1.05);
            /* Slight zoom effect on hover */
        }

        .thumbs .col-3 {
            padding: 5px;
            /* Spacing between thumbnails */
        }

        /* CSS cho nút điều khiển carousel */
        .carousel-control-prev,
        .carousel-control-next {
            background: none;
            /* Bỏ màu nền */
            border: none;
            /* Bỏ border */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
            /* Đổi màu biểu tượng nếu cần */
        }

        /* Đảm bảo rằng không có khoảng cách giữa các phần tử carousel */
        
    </style>
@endsection
