@extends('Client.layouts.paginate.master')
@section('contentClient')
<main class="main-layout">
			
    <home-slider class="section_index--slider section-distance">
        <div class="section_index--slider-items"> 
            <div class="section_index--slider-item">
                <a href="collections/all.html" aria-label="New Arrival" title="New Arrival">
                    <picture>
                        <source width="1920" height="960" media="(min-width: 768px)" srcset="{{asset('assets/bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_slider_item_image_desktop_1b1ed.jpg')}}">
                        <source width="800" height="800" media="(min-width: 0)" srcset="{{asset('bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_slider_item_image_mobile_1.jpg')}}">
                        <img src="{{asset('assets/bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_slider_item_image_desktop_1b1ed.jpg')}}" alt="New Arrival" width="1920" height="960" 
                             loading="eager" decoding="sync" fetchpriority="high">
                    </picture>
                </a>
            </div>
            <div class="section_index--slider-item">
                <a href="collections/all.html" aria-label="Hot Trend" title="Hot Trend">
                    <picture>
                        <source width="1920" height="960" media="(min-width: 768px)" srcset="//bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_slider_item_image_desktop_2.jpg?1724041824574">
                        <source width="800" height="800" media="(min-width: 0)" srcset="//bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_slider_item_image_mobile_2.jpg?1724041824574">
                        <img src="../bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_slider_item_image_desktop_2b1ed.jpg?1724041824574" alt="Hot Trend" width="1920" height="960" 
                             loading="lazy" decoding="async" fetchpriority="low">
                    </picture>
                </a>
            </div>
        </div>
    </home-slider>
    <div class="home-about section-distance">
        <div class="container">
            <div class="home-about-wrap">
                <div class="home-about-left">
                    <div class="home-about-left-header home-product-list-header-wrapper">
                        <hr>
                        <a href="collections/all.html" title="Về chúng tôi">
                            <h2>Về chúng tôi</h2>
                        </a>
                        <hr>
                    </div>
                    <h3>Artisanal Nomad</h3>
                    <p>Chủ đề này khám phá các loại vải sáng tạo, thiết kế tương lai và kiểu dáng đẹp mắt lấy cảm hứng từ thời đại kỹ thuật số. Quần áo kết hợp các yếu tố công nghệ có thể mặc, điểm nhấn sáng và tính thẩm mỹ hiện đại, phản ánh sự kết hợp giữa phong cách và chức năng dành cho tín đồ thời trang am hiểu công nghệ.
    <br/><br/>
    Chủ đề này trưng bày các kết cấu phong phú, các chi tiết trang trí xa hoa và bảng màu lấy cảm hứng từ đồ trang sức hoàng gia. Những hình bóng toát lên sự tinh tế đồng thời kết hợp các họa tiết ma thuật, đưa người mặc đến một thế giới hùng vĩ và quyến rũ.</p>
                    <div class="home-about-left-actions">
                        <a class="primary-btn" href="collections/all.html" aria-label="Men">
                            Men
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z" fill="white"></path></svg>
                        </a>
                        <a class="primary-btn" href="collections/all.html" aria-label="Women">
                            Women
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z" fill="white"></path></svg>
                        </a>
                    </div>
                </div>
                <div class="home-about-right">
                    <img loading="lazy" decoding="async" width="500" height="380"
                         src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_about_imageb1ed.jpg?1724041824574" alt="Về chúng tôi"> 
                </div>
            </div>
        </div>
    </div>
    
    <section class="home-collection-list section-distance container">
        <div class="home-product-list-header-wrapper">
            <hr>
            <a href="collections/all.html" title="Danh mục nổi bật"><h2>Danh mục nổi bật</h2></a>
            <hr>
        </div>
        <h3>List các nhóm sản phẩm nổi bật nhất</h3>
        <div class="home-collection_list-wrapper">
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Flash Sale">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__1b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Flash Sale" title="F1GENZ Model Fashion - Flash Sale" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Flash Sale</span>
            </a>
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Áo ngủ">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__2b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Áo ngủ" title="F1GENZ Model Fashion - Áo ngủ" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Áo ngủ</span>
            </a>
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Áo kiểu">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__3b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Áo kiểu" title="F1GENZ Model Fashion - Áo kiểu" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Áo kiểu</span>
            </a>
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Đầm ">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__4b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Đầm " title="F1GENZ Model Fashion - Đầm " 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Đầm</span>
            </a>
            <a class="home-collection-list-item" href="collection/all.html" title="F1GENZ Model Fashion - Quần">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__5b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Quần" title="F1GENZ Model Fashion - Quần" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Quần</span>
            </a>
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Váy">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__6b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Váy" title="F1GENZ Model Fashion - Váy" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Váy</span>
            </a>
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Áo thun">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__7b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Áo thun" title="F1GENZ Model Fashion - Áo thun" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Áo thun</span>
            </a>
            <a class="home-collection-list-item" href="collections/all.html" title="F1GENZ Model Fashion - Áo Khoác">
                <div class="home-collection-list-item-image-holder">
                    <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_collection_list_item_image__8b1ed.jpg?1724041824574"
                         alt="F1GENZ Model Fashion - Áo Khoác" title="F1GENZ Model Fashion - Áo Khoác" 
                         width="480" height="480" loading="lazy" decoding="async" fetchpriority="auto">
                </div>
                <span>Áo khoác</span>
            </a>
        </div>
    </section>
    <section class="home-flashsale animate section-distance ">
        <div class="container">
            <div class="home-flashsale-wrapper">
                <div class="home-flashsale-left">
                    <picture>
                        <img src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_flashsale_d_img__1b1ed.jpg?1724041824574"
                             alt="Flash Sale"
                             title="Flash Sale"
                             width="500" height="500" loading="lazy" decoding="async" fetchpriority="auto">
                    </picture>
                    <div class="home-flashsale-info">
                        <div data-time="4/7/2025 24:00:00" class="countdownLoop"></div>
                    </div>
                </div>
                <div class="home-flashsale-right">
    
    
    
    
    
    <div class="product-item" data-id="120912660" data-handle="co-chu-u-tay-ao-xam">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="co-chu-u-tay-ao-xam.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" 
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="co-chu-u-tay-ao-xam.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389526"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="co-chu-u-tay-ao-xam.html" title="CỔ CHỮ U TAY &#193;O X&#193;M" aria-label="CỔ CHỮ U TAY &#193;O X&#193;M">CỔ CHỮ U TAY ÁO XÁM</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.489.000₫</strong>
                    <del>1.678.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912667" data-handle="ribbon-jacquard-vintage">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-jacquard-vintage.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4ba734f8a25b5ec60601367e1a0d98375c29.jpg?v=1720423861723" 
                             alt='RIBBON JACQUARD VINTAGE'
                             title='RIBBON JACQUARD VINTAGE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-20%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
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
    
    
    
    
    <div class="product-item" data-id="120912676" data-handle="ao-phong-co-chu-v-logo-rosy">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-phong-co-chu-v-logo-rosy.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783" 
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-33%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-phong-co-chu-v-logo-rosy.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389531"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-phong-co-chu-v-logo-rosy.html" title="&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY" aria-label="&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY">ÁO PHÔNG CỔ CHỮ V LOGO ROSY</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.079.000₫</strong>
                    <del>1.599.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4dd219c98903a086bde50d13c63495a6-7acaf653592c4324bd10aa7153e4c717-6cdfb8c72d9641d3b4695632e76a2a3f0c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4dd219c98903a086bde50d13c63495a6-7acaf653592c4324bd10aa7153e4c717-6cdfb8c72d9641d3b4695632e76a2a3f0c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/7cf7d6e93a8df05c953620082dd542b8-88fa60110cd9455aaf9b4ce88dacf7f9-854c50d6b5214ae8959d6725da7544630c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7cf7d6e93a8df05c953620082dd542b8-88fa60110cd9455aaf9b4ce88dacf7f9-854c50d6b5214ae8959d6725da7544630c74.png?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/9a1a07b2fefae64f831bd55ca791c818-1e13a1c66e4c452fbc7a5c4d186bc472-6ca1f0e08b534994b87a19ffff4ff7e00c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/9a1a07b2fefae64f831bd55ca791c818-1e13a1c66e4c452fbc7a5c4d186bc472-6ca1f0e08b534994b87a19ffff4ff7e00c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912683" data-handle="ao-thun-logo-hai-tone-chacoal">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-thun-logo-hai-tone-chacoal.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723" 
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-21%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-thun-logo-hai-tone-chacoal.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389533"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-thun-logo-hai-tone-chacoal.html" title="&#193;O THUN LOGO HAI TONE CHACOAL" aria-label="&#193;O THUN LOGO HAI TONE CHACOAL">ÁO THUN LOGO HAI TONE CHACOAL</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.015.000₫</strong>
                    <del>1.279.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f5-9446a7de8e234d1dbb4014904a5d4234-aa05ce51f2d242e7af1ad5333cc0839f17a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f5-9446a7de8e234d1dbb4014904a5d4234-aa05ce51f2d242e7af1ad5333cc0839f17a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/7a5f7eb96de9479b79c9ff6f47308bdb-bdd53c37011c45f8b48e1552a271497a-abda3b682578450b90c40f742288c2f417a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7a5f7eb96de9479b79c9ff6f47308bdb-bdd53c37011c45f8b48e1552a271497a-abda3b682578450b90c40f742288c2f417a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/3d47e0b70d0b318948f8bb351518d1ad-503c3ec4616745e5aeec758d395e8d47-5fd2beca1a7b4da9b8adfc0478bd3bf217a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/3d47e0b70d0b318948f8bb351518d1ad-503c3ec4616745e5aeec758d395e8d47-5fd2beca1a7b4da9b8adfc0478bd3bf217a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912697" data-handle="ao-thun-lop-tencel-m-gray">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-thun-lop-tencel-m-gray.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/bd256a2bf67cd65a7e27a6063acd42adbf34.jpg?v=1720423726307" 
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-3%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-thun-lop-tencel-m-gray.html"
                       title="GRAY"
                       aria-label="GRAY"><span>GRAY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389536"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-thun-lop-tencel-m-gray.html" title="&#193;O THUN LỚP Tencel M.GRAY" aria-label="&#193;O THUN LỚP Tencel M.GRAY">ÁO THUN LỚP Tencel M.GRAY</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.890.000₫</strong>
                    <del>1.950.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/bd256a2bf67cd65a7e27a6063acd42adbf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bd256a2bf67cd65a7e27a6063acd42adbf34.jpg?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/bbfdc561e54e1c834cfaa6209ea6b0d6-875fb93746f643339d49ff4a57966453-1b7e9240992a4126975aac72ce54c582bf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bbfdc561e54e1c834cfaa6209ea6b0d6-875fb93746f643339d49ff4a57966453-1b7e9240992a4126975aac72ce54c582bf34.jpg?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/25ceedbc96d2cf3c1ad3c886aa34a47c-acaa1f298460414e9b8946626725f79b-a39c7477c5264da88282e4eb9cfa9379bf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/25ceedbc96d2cf3c1ad3c886aa34a47c-acaa1f298460414e9b8946626725f79b-a39c7477c5264da88282e4eb9cfa9379bf34.jpg?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/55993647ddcd7bd7e4242d753de3b638-ab07b521a6574e0a84bce506c60f9de8-ae7a86455e0c437e91ae40c75b221787bf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/55993647ddcd7bd7e4242d753de3b638-ab07b521a6574e0a84bce506c60f9de8-ae7a86455e0c437e91ae40c75b221787bf34.png?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912703" data-handle="ribbon-sleeveless-one-piece-white">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-sleeveless-one-piece-white.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" 
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-22%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ribbon-sleeveless-one-piece-white.html"
                       title="RIBBON"
                       aria-label="RIBBON"><span>RIBBON</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389537"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ribbon-sleeveless-one-piece-white.html" title="RIBBON SLEEVELESS ONE PIECE WHITE" aria-label="RIBBON SLEEVELESS ONE PIECE WHITE">RIBBON SLEEVELESS ONE PIECE WHITE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.459.000₫</strong>
                    <del>1.869.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.png?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912709" data-handle="two-line-halter-neck-top">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="two-line-halter-neck-top.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" 
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-40%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="two-line-halter-neck-top.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389538"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="two-line-halter-neck-top.html" title="TWO LINE HALTER NECK TOP" aria-label="TWO LINE HALTER NECK TOP">TWO LINE HALTER NECK TOP</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.390.000₫</strong>
                    <del>2.300.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.png?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                </div>
            </div>
        </div>
    </div>			</div>
            </div>
        </div>
    </section>
    <section class="home-banner-lg section-distance">
        <div class="home-banner-lg-wrapper">
            <div class="home-banner-lg-item animate need-cover-bg">
                <a href="collections/all.html" title="F1 Fashion Style" class="home-banner-lg-image-holder face-background">
                    <picture>
                        <source media="(max-width:767px)" srcset="../bizweb.dktcdn.net/thumb/2048x2048/100/520/624/themes/959507/assets/home_banner_lg_image_mb1ed.jpg?1724041824574">
                        <img src="../bizweb.dktcdn.net/thumb/2048x2048/100/520/624/themes/959507/assets/home_banner_lg_image_db1ed.jpg?1724041824574"
                             alt="F1 Fashion Style" title="F1 Fashion Style" 
                             width="1880" height="720" loading="lazy" decoding="async" fetchpriority="auto">
                    </picture>
                </a>
                <div class="home-banner-lg-item-info">
                    <h2>Bộ sưu tập mùa hè</h2>
                    <hr>
                    <h3>Vẻ Đẹp Trường Tồn Được Tái Tạo: Nghiên Cứu Sự Đối Lập trong Xu Hướng Thời Trang Mùa Thu 2024</h3>
                    <a href="collections/all.html" title="Khám phá ngay " class="home-lg-button primary-btn">
                        <p>Khám phá ngay</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="container section-distance">
        <div class="home-banner-stylist">
            <div class="home-banner-stylist-wrapper animate">
                <div class="home-banner-stylist-item">
                    <a href="collections/cocktail-dresses.html" title="Cocktail Dresses" class="home-slider-image-holder">
                        <picture>
                            <img src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_banner_stylist_image_d__1b1ed.jpg?1724041824574"
                                 alt="Cocktail Dresses" title="Cocktail Dresses" 
                                 width="600" height="600"
                                 loading="lazy" decoding="async" fetchpriority="auto">
                        </picture>
                    </a>
                    <div class="home-banner-stylist-info">
                        <a href="collections/cocktail-dresses.html" title="Cocktail Dresses " class="home-slider-button primary-btn">
                            <p>
                                Cocktail Dresses
                            </p>
                        </a>
                    </div>
                </div>
                <div class="home-banner-stylist-item">
                    <a href="collections/casual-jumpsuits.html" title="Casual Jumpsuits" class="home-slider-image-holder">
                        <picture>
                            <img src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_banner_stylist_image_d__2b1ed.jpg?1724041824574"
                                 alt="Casual Jumpsuits" title="Casual Jumpsuits" 
                                 width="600" height="600"
                                 loading="lazy" decoding="async" fetchpriority="auto">
                        </picture>
                    </a>
                    <div class="home-banner-stylist-info">
                        <a href="collections/casual-jumpsuits.html" title="Casual Jumpsuits " class="home-slider-button primary-btn">
                            <p>
                                Casual Jumpsuits
                            </p>
                        </a>
                    </div>
                </div>
                <div class="home-banner-stylist-item">
                    <a href="collections/formal-pants.html" title="Formal Pants" class="home-slider-image-holder">
                        <picture>
                            <img src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_banner_stylist_image_d__3b1ed.jpg?1724041824574"
                                 alt="Formal Pants" title="Formal Pants" 
                                 width="600" height="600"
                                 loading="lazy" decoding="async" fetchpriority="auto">
                        </picture>
                    </a>
                    <div class="home-banner-stylist-info">
                        <a href="collections/formal-pants.html" title="Formal Pants " class="home-slider-button primary-btn">
                            <p>
                                Formal Pants
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="home-product-new section-distance">
        <div class="home-product-new-header-wrapper">
            <hr>
            <a href="collections/all.html" title="Top trending"><h2>Top trending</h2></a>
            <hr>
        </div>
        <h3>Bộ sưu tập nổi bật nhất tuần</h3>
        <div class="home-product-wrapper">
            <a href="collections/all.html" title="Bộ sưu tập mới" class="home-product-new-banner home-product-new-banner-1">
                <picture>
                    <img src="../bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/home_product_new_image_d__1b1ed.jpg?1724041824574"
                         alt="Bộ sưu tập mới" title="Bộ sưu tập mới" 
                         width="800" height="800"
                         loading="lazy" decoding="async" fetchpriority="auto">
                </picture>
            </a>
            <div class="container">
                <div class="home-product-new-slider">
    
    
    
    
    
    <div class="product-item" data-id="120912683" data-handle="ao-thun-logo-hai-tone-chacoal">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-thun-logo-hai-tone-chacoal.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723" 
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-21%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-thun-logo-hai-tone-chacoal.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389533"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-thun-logo-hai-tone-chacoal.html" title="&#193;O THUN LOGO HAI TONE CHACOAL" aria-label="&#193;O THUN LOGO HAI TONE CHACOAL">ÁO THUN LOGO HAI TONE CHACOAL</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.015.000₫</strong>
                    <del>1.279.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f5-9446a7de8e234d1dbb4014904a5d4234-aa05ce51f2d242e7af1ad5333cc0839f17a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f5-9446a7de8e234d1dbb4014904a5d4234-aa05ce51f2d242e7af1ad5333cc0839f17a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/7a5f7eb96de9479b79c9ff6f47308bdb-bdd53c37011c45f8b48e1552a271497a-abda3b682578450b90c40f742288c2f417a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7a5f7eb96de9479b79c9ff6f47308bdb-bdd53c37011c45f8b48e1552a271497a-abda3b682578450b90c40f742288c2f417a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/3d47e0b70d0b318948f8bb351518d1ad-503c3ec4616745e5aeec758d395e8d47-5fd2beca1a7b4da9b8adfc0478bd3bf217a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/3d47e0b70d0b318948f8bb351518d1ad-503c3ec4616745e5aeec758d395e8d47-5fd2beca1a7b4da9b8adfc0478bd3bf217a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912676" data-handle="ao-phong-co-chu-v-logo-rosy">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-phong-co-chu-v-logo-rosy.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783" 
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-33%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-phong-co-chu-v-logo-rosy.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389531"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-phong-co-chu-v-logo-rosy.html" title="&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY" aria-label="&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY">ÁO PHÔNG CỔ CHỮ V LOGO ROSY</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.079.000₫</strong>
                    <del>1.599.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4dd219c98903a086bde50d13c63495a6-7acaf653592c4324bd10aa7153e4c717-6cdfb8c72d9641d3b4695632e76a2a3f0c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4dd219c98903a086bde50d13c63495a6-7acaf653592c4324bd10aa7153e4c717-6cdfb8c72d9641d3b4695632e76a2a3f0c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/7cf7d6e93a8df05c953620082dd542b8-88fa60110cd9455aaf9b4ce88dacf7f9-854c50d6b5214ae8959d6725da7544630c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7cf7d6e93a8df05c953620082dd542b8-88fa60110cd9455aaf9b4ce88dacf7f9-854c50d6b5214ae8959d6725da7544630c74.png?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/9a1a07b2fefae64f831bd55ca791c818-1e13a1c66e4c452fbc7a5c4d186bc472-6ca1f0e08b534994b87a19ffff4ff7e00c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/9a1a07b2fefae64f831bd55ca791c818-1e13a1c66e4c452fbc7a5c4d186bc472-6ca1f0e08b534994b87a19ffff4ff7e00c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912730" data-handle="corset-bung-len-quan-denim-mini">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="corset-bung-len-quan-denim-mini.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" 
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="corset-bung-len-quan-denim-mini.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389544"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="corset-bung-len-quan-denim-mini.html" title="Corset b&#249;ng l&#234;n quần denim mini" aria-label="Corset b&#249;ng l&#234;n quần denim mini">Corset bùng lên quần denim mini</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.249.000₫</strong>
                    <del>1.343.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.png?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912709" data-handle="two-line-halter-neck-top">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="two-line-halter-neck-top.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" 
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-40%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="two-line-halter-neck-top.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389538"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="two-line-halter-neck-top.html" title="TWO LINE HALTER NECK TOP" aria-label="TWO LINE HALTER NECK TOP">TWO LINE HALTER NECK TOP</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.390.000₫</strong>
                    <del>2.300.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.png?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912703" data-handle="ribbon-sleeveless-one-piece-white">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-sleeveless-one-piece-white.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" 
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-22%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ribbon-sleeveless-one-piece-white.html"
                       title="RIBBON"
                       aria-label="RIBBON"><span>RIBBON</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389537"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ribbon-sleeveless-one-piece-white.html" title="RIBBON SLEEVELESS ONE PIECE WHITE" aria-label="RIBBON SLEEVELESS ONE PIECE WHITE">RIBBON SLEEVELESS ONE PIECE WHITE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.459.000₫</strong>
                    <del>1.869.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.png?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912660" data-handle="co-chu-u-tay-ao-xam">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="co-chu-u-tay-ao-xam.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" 
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="co-chu-u-tay-ao-xam.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389526"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="co-chu-u-tay-ao-xam.html" title="CỔ CHỮ U TAY &#193;O X&#193;M" aria-label="CỔ CHỮ U TAY &#193;O X&#193;M">CỔ CHỮ U TAY ÁO XÁM</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.489.000₫</strong>
                    <del>1.678.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912733" data-handle="ao-day-twist-drape">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-day-twist-drape.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557" 
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-day-twist-drape.html"
                       title="GRAY"
                       aria-label="GRAY"><span>GRAY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389545"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-day-twist-drape.html" title="&#193;o D&#226;y TWIST DRAPE" aria-label="&#193;o D&#226;y TWIST DRAPE">Áo Dây TWIST DRAPE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.679.000₫</strong>
                    <del>1.880.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4174f0861eeb23441bf7eb6252bf190d-2129c67775e94d408f68a10a29ed7290-27c6d58deee14d4da12f1b70fc39ba235e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4174f0861eeb23441bf7eb6252bf190d-2129c67775e94d408f68a10a29ed7290-27c6d58deee14d4da12f1b70fc39ba235e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/5d4ca15607e32b7b43318865f3af4de9-ce8d912eb4474f5dacc8c54e82854020-f267f0e808d6435bbef82dc327eecbb65e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/5d4ca15607e32b7b43318865f3af4de9-ce8d912eb4474f5dacc8c54e82854020-f267f0e808d6435bbef82dc327eecbb65e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/46ca37424dabab3e8eaf50be81266100-6dae117d2f584904b0a623e6ba4db62d-53d035ecc8f041e587c57bfa6fadc9635e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/46ca37424dabab3e8eaf50be81266100-6dae117d2f584904b0a623e6ba4db62d-53d035ecc8f041e587c57bfa6fadc9635e0f.png?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                </div>
            </div>
        </div>
    </div>			</div>		
            </div>
            <a href="collections/all.html" title="Hot trong tuần" class="home-product-new-banner home-product-new-banner-2">
                <picture>
                    <img src="../bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/home_product_new_image_d__2b1ed.jpg?1724041824574"
                         alt="Hot trong tuần" title="Hot trong tuần" 
                         width="800" height="800"
                         loading="lazy" decoding="async" fetchpriority="auto">
                </picture>
            </a>
        </div>
    </section>
    <div class="home-banner-small container section-distance">
        <div class="home-banner-small-wrapper">
            <div class="home-banner-small-item">
                <a href="collections/all.html" title="Vẻ đẹp trường tồn" class="home-banner-small-image-holder face-background">
                    <img src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_banner_small_image_d__1b1ed.jpg?1724041824574"
                         alt="Vẻ đẹp trường tồn" title="Vẻ đẹp trường tồn" 
                         width="800" height="400" loading="lazy" decoding="async" fetchpriority="auto"> 
                </a>
                <div class="home-banner-small-item-info">
                    <h2>Vẻ đẹp trường tồn</h2>
                    <hr>
                    <h3>Sự đối lập trong xu hướng thời trang</h3>
                </div>
            </div>
            <div class="home-banner-small-item">
                <a href="collections/all.html" title="Xu hướng thời trang" class="home-banner-small-image-holder face-background">
                    <img src="../bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/home_banner_small_image_d__2b1ed.jpg?1724041824574"
                         alt="Xu hướng thời trang" title="Xu hướng thời trang" 
                         width="800" height="400" loading="lazy" decoding="async" fetchpriority="auto"> 
                </a>
                <div class="home-banner-small-item-info">
                    <h2>Xu hướng thời trang</h2>
                    <hr>
                    <h3>Khi phong cách retro lên ngôi</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="home-product-list container section-distance">
        <div class="home-product-list-header-wrapper">
            <hr>
            <a href="collections/all.html" title="Best Seller"><h2>Best Seller</h2></a>
            <hr>
        </div>
        <h3>Top các sản phẩm bán chạy nhất tuần</h3>
        <div class="home-product-list-wrapper">
            <div class="home-product-list-slider home-product-list-slider-1">
    
    
    
    
    
    <div class="product-item" data-id="120912723" data-handle="khan-choang-co-day">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="khan-choang-co-day.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053" 
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="khan-choang-co-day.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389542"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="khan-choang-co-day.html" title="Khăn cho&#224;ng cổ d&#226;y" aria-label="Khăn cho&#224;ng cổ d&#226;y">Khăn choàng cổ dây</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>2.180.000₫</strong>
                    <del>2.340.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/584e3757e9d23c18bcf0ed3b3aeb1911-333ab917ed794fffa8f93d2ccc873d1b-23f870f1a7434fd383e027ebab07dce009a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/584e3757e9d23c18bcf0ed3b3aeb1911-333ab917ed794fffa8f93d2ccc873d1b-23f870f1a7434fd383e027ebab07dce009a2.png?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/795f20bd0613da5580d04fb0d81b5329-0067b77979ba41a7a8ff3fcee1970adf-6267e172c47545e9a3ff6e2c7105e20809a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/795f20bd0613da5580d04fb0d81b5329-0067b77979ba41a7a8ff3fcee1970adf-6267e172c47545e9a3ff6e2c7105e20809a2.png?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/bd5deaee028b51b64590bd5b3c0f2205-31beadd730274ea3a0f65d9def3efe7a-e48cda6adcce47949cfa4ade274abcbc09a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bd5deaee028b51b64590bd5b3c0f2205-31beadd730274ea3a0f65d9def3efe7a-e48cda6adcce47949cfa4ade274abcbc09a2.jpg?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912667" data-handle="ribbon-jacquard-vintage">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-jacquard-vintage.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4ba734f8a25b5ec60601367e1a0d98375c29.jpg?v=1720423861723" 
                             alt='RIBBON JACQUARD VINTAGE'
                             title='RIBBON JACQUARD VINTAGE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-20%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
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
    
    
    
    
    <div class="product-item" data-id="120912697" data-handle="ao-thun-lop-tencel-m-gray">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-thun-lop-tencel-m-gray.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/bd256a2bf67cd65a7e27a6063acd42adbf34.jpg?v=1720423726307" 
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-3%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-thun-lop-tencel-m-gray.html"
                       title="GRAY"
                       aria-label="GRAY"><span>GRAY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389536"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-thun-lop-tencel-m-gray.html" title="&#193;O THUN LỚP Tencel M.GRAY" aria-label="&#193;O THUN LỚP Tencel M.GRAY">ÁO THUN LỚP Tencel M.GRAY</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.890.000₫</strong>
                    <del>1.950.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/bd256a2bf67cd65a7e27a6063acd42adbf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bd256a2bf67cd65a7e27a6063acd42adbf34.jpg?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/bbfdc561e54e1c834cfaa6209ea6b0d6-875fb93746f643339d49ff4a57966453-1b7e9240992a4126975aac72ce54c582bf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bbfdc561e54e1c834cfaa6209ea6b0d6-875fb93746f643339d49ff4a57966453-1b7e9240992a4126975aac72ce54c582bf34.jpg?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/25ceedbc96d2cf3c1ad3c886aa34a47c-acaa1f298460414e9b8946626725f79b-a39c7477c5264da88282e4eb9cfa9379bf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/25ceedbc96d2cf3c1ad3c886aa34a47c-acaa1f298460414e9b8946626725f79b-a39c7477c5264da88282e4eb9cfa9379bf34.jpg?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/55993647ddcd7bd7e4242d753de3b638-ab07b521a6574e0a84bce506c60f9de8-ae7a86455e0c437e91ae40c75b221787bf34.jpg?v=1720423726307">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/55993647ddcd7bd7e4242d753de3b638-ab07b521a6574e0a84bce506c60f9de8-ae7a86455e0c437e91ae40c75b221787bf34.png?v=1720423726307" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LỚP Tencel M.GRAY'
                             title='&#193;O THUN LỚP Tencel M.GRAY'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912716" data-handle="combi-knit-cardian">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="combi-knit-cardian.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013" 
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-38%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="combi-knit-cardian.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389540"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="combi-knit-cardian.html" title="COMBI KNIT CARDIAN" aria-label="COMBI KNIT CARDIAN">COMBI KNIT CARDIAN</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.790.000₫</strong>
                    <del>2.890.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/82a1d8db7ff06566befb94f4f403840b-52b892f880264cd3a231e101c6263ced-78237b1b7728476b917250385bfa283647c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/82a1d8db7ff06566befb94f4f403840b-52b892f880264cd3a231e101c6263ced-78237b1b7728476b917250385bfa283647c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/3605fea05456ef2050770982900148f4-b4c54c0d7f534c05a60d407ba7160a7b-6d3d6b7dd5b9444fb023215fdc45299947c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/3605fea05456ef2050770982900148f4-b4c54c0d7f534c05a60d407ba7160a7b-6d3d6b7dd5b9444fb023215fdc45299947c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/620218efaa165d56b7b62f54f1123367-c5bc88f41206456b90f8186c2a0b7015-1f9b0974880f48f2b7ca607c11d328ea47c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/620218efaa165d56b7b62f54f1123367-c5bc88f41206456b90f8186c2a0b7015-1f9b0974880f48f2b7ca607c11d328ea47c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912733" data-handle="ao-day-twist-drape">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-day-twist-drape.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557" 
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-day-twist-drape.html"
                       title="GRAY"
                       aria-label="GRAY"><span>GRAY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389545"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-day-twist-drape.html" title="&#193;o D&#226;y TWIST DRAPE" aria-label="&#193;o D&#226;y TWIST DRAPE">Áo Dây TWIST DRAPE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.679.000₫</strong>
                    <del>1.880.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4174f0861eeb23441bf7eb6252bf190d-2129c67775e94d408f68a10a29ed7290-27c6d58deee14d4da12f1b70fc39ba235e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4174f0861eeb23441bf7eb6252bf190d-2129c67775e94d408f68a10a29ed7290-27c6d58deee14d4da12f1b70fc39ba235e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/5d4ca15607e32b7b43318865f3af4de9-ce8d912eb4474f5dacc8c54e82854020-f267f0e808d6435bbef82dc327eecbb65e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/5d4ca15607e32b7b43318865f3af4de9-ce8d912eb4474f5dacc8c54e82854020-f267f0e808d6435bbef82dc327eecbb65e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/46ca37424dabab3e8eaf50be81266100-6dae117d2f584904b0a623e6ba4db62d-53d035ecc8f041e587c57bfa6fadc9635e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/46ca37424dabab3e8eaf50be81266100-6dae117d2f584904b0a623e6ba4db62d-53d035ecc8f041e587c57bfa6fadc9635e0f.png?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912660" data-handle="co-chu-u-tay-ao-xam">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="co-chu-u-tay-ao-xam.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" 
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="co-chu-u-tay-ao-xam.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389526"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="co-chu-u-tay-ao-xam.html" title="CỔ CHỮ U TAY &#193;O X&#193;M" aria-label="CỔ CHỮ U TAY &#193;O X&#193;M">CỔ CHỮ U TAY ÁO XÁM</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.489.000₫</strong>
                    <del>1.678.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912703" data-handle="ribbon-sleeveless-one-piece-white">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-sleeveless-one-piece-white.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" 
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-22%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ribbon-sleeveless-one-piece-white.html"
                       title="RIBBON"
                       aria-label="RIBBON"><span>RIBBON</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389537"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ribbon-sleeveless-one-piece-white.html" title="RIBBON SLEEVELESS ONE PIECE WHITE" aria-label="RIBBON SLEEVELESS ONE PIECE WHITE">RIBBON SLEEVELESS ONE PIECE WHITE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.459.000₫</strong>
                    <del>1.869.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.png?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                </div>
            </div>
        </div>
    </div>		</div>
            <div class="home-product-list-slider home-product-list-slider-2">
    
    
    
    
    
    <div class="product-item" data-id="120912709" data-handle="two-line-halter-neck-top">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="two-line-halter-neck-top.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" 
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-40%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="two-line-halter-neck-top.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389538"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="two-line-halter-neck-top.html" title="TWO LINE HALTER NECK TOP" aria-label="TWO LINE HALTER NECK TOP">TWO LINE HALTER NECK TOP</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.390.000₫</strong>
                    <del>2.300.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.png?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912703" data-handle="ribbon-sleeveless-one-piece-white">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-sleeveless-one-piece-white.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" 
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-22%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ribbon-sleeveless-one-piece-white.html"
                       title="RIBBON"
                       aria-label="RIBBON"><span>RIBBON</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389537"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ribbon-sleeveless-one-piece-white.html" title="RIBBON SLEEVELESS ONE PIECE WHITE" aria-label="RIBBON SLEEVELESS ONE PIECE WHITE">RIBBON SLEEVELESS ONE PIECE WHITE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.459.000₫</strong>
                    <del>1.869.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.png?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912667" data-handle="ribbon-jacquard-vintage">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-jacquard-vintage.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4ba734f8a25b5ec60601367e1a0d98375c29.jpg?v=1720423861723" 
                             alt='RIBBON JACQUARD VINTAGE'
                             title='RIBBON JACQUARD VINTAGE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-20%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
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
    
    
    
    
    <div class="product-item" data-id="120912723" data-handle="khan-choang-co-day">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="khan-choang-co-day.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053" 
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="khan-choang-co-day.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389542"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="khan-choang-co-day.html" title="Khăn cho&#224;ng cổ d&#226;y" aria-label="Khăn cho&#224;ng cổ d&#226;y">Khăn choàng cổ dây</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>2.180.000₫</strong>
                    <del>2.340.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/584e3757e9d23c18bcf0ed3b3aeb1911-333ab917ed794fffa8f93d2ccc873d1b-23f870f1a7434fd383e027ebab07dce009a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/584e3757e9d23c18bcf0ed3b3aeb1911-333ab917ed794fffa8f93d2ccc873d1b-23f870f1a7434fd383e027ebab07dce009a2.png?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/795f20bd0613da5580d04fb0d81b5329-0067b77979ba41a7a8ff3fcee1970adf-6267e172c47545e9a3ff6e2c7105e20809a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/795f20bd0613da5580d04fb0d81b5329-0067b77979ba41a7a8ff3fcee1970adf-6267e172c47545e9a3ff6e2c7105e20809a2.png?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/bd5deaee028b51b64590bd5b3c0f2205-31beadd730274ea3a0f65d9def3efe7a-e48cda6adcce47949cfa4ade274abcbc09a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bd5deaee028b51b64590bd5b3c0f2205-31beadd730274ea3a0f65d9def3efe7a-e48cda6adcce47949cfa4ade274abcbc09a2.jpg?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912660" data-handle="co-chu-u-tay-ao-xam">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="co-chu-u-tay-ao-xam.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" 
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="co-chu-u-tay-ao-xam.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389526"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="co-chu-u-tay-ao-xam.html" title="CỔ CHỮ U TAY &#193;O X&#193;M" aria-label="CỔ CHỮ U TAY &#193;O X&#193;M">CỔ CHỮ U TAY ÁO XÁM</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.489.000₫</strong>
                    <del>1.678.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912730" data-handle="corset-bung-len-quan-denim-mini">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="corset-bung-len-quan-denim-mini.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" 
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="corset-bung-len-quan-denim-mini.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389544"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="corset-bung-len-quan-denim-mini.html" title="Corset b&#249;ng l&#234;n quần denim mini" aria-label="Corset b&#249;ng l&#234;n quần denim mini">Corset bùng lên quần denim mini</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.249.000₫</strong>
                    <del>1.343.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.png?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912716" data-handle="combi-knit-cardian">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="combi-knit-cardian.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013" 
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-38%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="combi-knit-cardian.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389540"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="combi-knit-cardian.html" title="COMBI KNIT CARDIAN" aria-label="COMBI KNIT CARDIAN">COMBI KNIT CARDIAN</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.790.000₫</strong>
                    <del>2.890.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/82a1d8db7ff06566befb94f4f403840b-52b892f880264cd3a231e101c6263ced-78237b1b7728476b917250385bfa283647c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/82a1d8db7ff06566befb94f4f403840b-52b892f880264cd3a231e101c6263ced-78237b1b7728476b917250385bfa283647c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/3605fea05456ef2050770982900148f4-b4c54c0d7f534c05a60d407ba7160a7b-6d3d6b7dd5b9444fb023215fdc45299947c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/3605fea05456ef2050770982900148f4-b4c54c0d7f534c05a60d407ba7160a7b-6d3d6b7dd5b9444fb023215fdc45299947c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/620218efaa165d56b7b62f54f1123367-c5bc88f41206456b90f8186c2a0b7015-1f9b0974880f48f2b7ca607c11d328ea47c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/620218efaa165d56b7b62f54f1123367-c5bc88f41206456b90f8186c2a0b7015-1f9b0974880f48f2b7ca607c11d328ea47c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                </div>
            </div>
        </div>
    </div>		</div>
        </div>
    </div>
    <div class="home-banner-lg section-distance">
        <div class="home-banner-lg-wrapper">
    
            <div class="home-banner-lg-item">
                <a href="collections/all.html" title="Always Fashion" class="home-banner-lg-image-holder face-background">
                    <picture>
                        <source media="(max-width:767px)" srcset="../bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/home_banner_second_lg_image_mb1ed.jpg?1724041824574">
                        <img src="../bizweb.dktcdn.net/thumb/2048x2048/100/520/624/themes/959507/assets/home_banner_second_lg_image_db1ed.jpg?1724041824574"
                             alt="Always Fashion" title="Always Fashion" 
                             width="1880" height="720" loading="lazy" decoding="async" fetchpriority="auto">
                    </picture>
                </a>
            </div>
        </div>
    </div>
    <section class="home-vendor section-distance">
        <div class="container">
            <div class="home-vendor-wrapper">
                <div class="home-vendor-info" style="--home_vendor_bg: url(../f599a506.rocketcdn.me/wp_contents/uploads/2019/08/fashion.jpg)">
                    <h2>Thương hiệu</h2>
                    <hr>
                    <h3>Các thương hiệu tin dùng chúng tôi</h3>
                </div>
                <div class="home-vendor-item-wrapper">
                    <a class="home-vendor-item" href="collections/all.html" title="F1GENZ Fashion - SSENSE">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_vendor_image__1b1ed.png?1724041824574"
                             alt="F1GENZ Fashion - SSENSE" title="F1GENZ Fashion - SSENSE" 
                             width="400" height="165"
                             loading="lazy" decoding="async" fetchpriority="auto">
                    </a>
                    <a class="home-vendor-item" href="collections/all.html" title="F1GENZ Fashion - BURBERRY">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_vendor_image__2b1ed.png?1724041824574"
                             alt="F1GENZ Fashion - BURBERRY" title="F1GENZ Fashion - BURBERRY" 
                             width="400" height="165"
                             loading="lazy" decoding="async" fetchpriority="auto">
                    </a>
                    <a class="home-vendor-item" href="collections/all.html" title="F1GENZ Fashion - NIKE">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_vendor_image__3b1ed.png?1724041824574"
                             alt="F1GENZ Fashion - NIKE" title="F1GENZ Fashion - NIKE" 
                             width="400" height="165"
                             loading="lazy" decoding="async" fetchpriority="auto">
                    </a>
                    <a class="home-vendor-item" href="colelctions/all.html" title="F1GENZ Fashion - ASOS">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_vendor_image__4b1ed.png?1724041824574"
                             alt="F1GENZ Fashion - ASOS" title="F1GENZ Fashion - ASOS" 
                             width="400" height="165"
                             loading="lazy" decoding="async" fetchpriority="auto">
                    </a>
                    <a class="home-vendor-item" href="collections/all.html" title="F1GENZ Fashion - PULL & BEAR">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_vendor_image__5b1ed.png?1724041824574"
                             alt="F1GENZ Fashion - PULL & BEAR" title="F1GENZ Fashion - PULL & BEAR" 
                             width="400" height="165"
                             loading="lazy" decoding="async" fetchpriority="auto">
                    </a>
                    <a class="home-vendor-item" href="collections/all.html" title="F1GENZ Fashion - GILDAN">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_vendor_image__6b1ed.jpg?1724041824574"
                             alt="F1GENZ Fashion - GILDAN" title="F1GENZ Fashion - GILDAN" 
                             width="400" height="165"
                             loading="lazy" decoding="async" fetchpriority="auto">
                    </a>
                </div>
    
            </div>
        </div>
    </section>
    <div class="container">
        <div class="home-product-stylist section-distance">
            <div class="home-product-list-header-wrapper">
                <hr>
                <a href="collections/all.html" title="Hot Sale"><h2>Hot Sale</h2></a>
                <hr>
            </div>
            <h3>Các sản phẩm được ưa chuộng nhất</h3>
            <div class="home-product-stylist-wrapper home-product-stylist-wrapper-1">
                <a href="https://f1genz-luxury-fashion.mysapo.net/dam-bong-xoe-lpt" title="Hot Sale F1GENZ " class="home-product-stylist-sideBanner">
                    <img src="../bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/home_product_stylist_image_d__1b1ed.jpg?1724041824574"
                         alt="Hot Sale F1GENZ " title="Hot Sale F1GENZ " 
                         width="1024" height="1024"
                         loading="lazy" decoding="async" fetchpriority="auto">
                </a>
                <div class="home-product-stylist-item-wrapper">
    
    
    
    
    
    <div class="product-item" data-id="120912683" data-handle="ao-thun-logo-hai-tone-chacoal">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-thun-logo-hai-tone-chacoal.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723" 
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-21%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-thun-logo-hai-tone-chacoal.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389533"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-thun-logo-hai-tone-chacoal.html" title="&#193;O THUN LOGO HAI TONE CHACOAL" aria-label="&#193;O THUN LOGO HAI TONE CHACOAL">ÁO THUN LOGO HAI TONE CHACOAL</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.015.000₫</strong>
                    <del>1.279.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f517a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f5-9446a7de8e234d1dbb4014904a5d4234-aa05ce51f2d242e7af1ad5333cc0839f17a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/2ef5a7f2b23e3eb67636db97ecb631f5-9446a7de8e234d1dbb4014904a5d4234-aa05ce51f2d242e7af1ad5333cc0839f17a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/7a5f7eb96de9479b79c9ff6f47308bdb-bdd53c37011c45f8b48e1552a271497a-abda3b682578450b90c40f742288c2f417a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7a5f7eb96de9479b79c9ff6f47308bdb-bdd53c37011c45f8b48e1552a271497a-abda3b682578450b90c40f742288c2f417a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/3d47e0b70d0b318948f8bb351518d1ad-503c3ec4616745e5aeec758d395e8d47-5fd2beca1a7b4da9b8adfc0478bd3bf217a5.jpg?v=1720423781723">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/3d47e0b70d0b318948f8bb351518d1ad-503c3ec4616745e5aeec758d395e8d47-5fd2beca1a7b4da9b8adfc0478bd3bf217a5.jpg?v=1720423781723" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O THUN LOGO HAI TONE CHACOAL'
                             title='&#193;O THUN LOGO HAI TONE CHACOAL'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912676" data-handle="ao-phong-co-chu-v-logo-rosy">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-phong-co-chu-v-logo-rosy.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783" 
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-33%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-phong-co-chu-v-logo-rosy.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389531"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-phong-co-chu-v-logo-rosy.html" title="&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY" aria-label="&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY">ÁO PHÔNG CỔ CHỮ V LOGO ROSY</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.079.000₫</strong>
                    <del>1.599.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/65536d88f9c870da7da2d3fa9e38c7c40c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4dd219c98903a086bde50d13c63495a6-7acaf653592c4324bd10aa7153e4c717-6cdfb8c72d9641d3b4695632e76a2a3f0c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4dd219c98903a086bde50d13c63495a6-7acaf653592c4324bd10aa7153e4c717-6cdfb8c72d9641d3b4695632e76a2a3f0c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/7cf7d6e93a8df05c953620082dd542b8-88fa60110cd9455aaf9b4ce88dacf7f9-854c50d6b5214ae8959d6725da7544630c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7cf7d6e93a8df05c953620082dd542b8-88fa60110cd9455aaf9b4ce88dacf7f9-854c50d6b5214ae8959d6725da7544630c74.png?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/9a1a07b2fefae64f831bd55ca791c818-1e13a1c66e4c452fbc7a5c4d186bc472-6ca1f0e08b534994b87a19ffff4ff7e00c74.jpg?v=1720423820783">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/9a1a07b2fefae64f831bd55ca791c818-1e13a1c66e4c452fbc7a5c4d186bc472-6ca1f0e08b534994b87a19ffff4ff7e00c74.jpg?v=1720423820783" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'
                             title='&#193;O PH&#212;NG CỔ CHỮ V LOGO ROSY'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912730" data-handle="corset-bung-len-quan-denim-mini">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="corset-bung-len-quan-denim-mini.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" 
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="corset-bung-len-quan-denim-mini.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389544"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="corset-bung-len-quan-denim-mini.html" title="Corset b&#249;ng l&#234;n quần denim mini" aria-label="Corset b&#249;ng l&#234;n quần denim mini">Corset bùng lên quần denim mini</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.249.000₫</strong>
                    <del>1.343.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.png?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912709" data-handle="two-line-halter-neck-top">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="two-line-halter-neck-top.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" 
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-40%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="two-line-halter-neck-top.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389538"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="two-line-halter-neck-top.html" title="TWO LINE HALTER NECK TOP" aria-label="TWO LINE HALTER NECK TOP">TWO LINE HALTER NECK TOP</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.390.000₫</strong>
                    <del>2.300.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.png?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912703" data-handle="ribbon-sleeveless-one-piece-white">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-sleeveless-one-piece-white.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" 
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-22%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ribbon-sleeveless-one-piece-white.html"
                       title="RIBBON"
                       aria-label="RIBBON"><span>RIBBON</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389537"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ribbon-sleeveless-one-piece-white.html" title="RIBBON SLEEVELESS ONE PIECE WHITE" aria-label="RIBBON SLEEVELESS ONE PIECE WHITE">RIBBON SLEEVELESS ONE PIECE WHITE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.459.000₫</strong>
                    <del>1.869.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.png?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912660" data-handle="co-chu-u-tay-ao-xam">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="co-chu-u-tay-ao-xam.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" 
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="co-chu-u-tay-ao-xam.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389526"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="co-chu-u-tay-ao-xam.html" title="CỔ CHỮ U TAY &#193;O X&#193;M" aria-label="CỔ CHỮ U TAY &#193;O X&#193;M">CỔ CHỮ U TAY ÁO XÁM</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.489.000₫</strong>
                    <del>1.678.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912733" data-handle="ao-day-twist-drape">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ao-day-twist-drape.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557" 
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ao-day-twist-drape.html"
                       title="GRAY"
                       aria-label="GRAY"><span>GRAY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389545"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ao-day-twist-drape.html" title="&#193;o D&#226;y TWIST DRAPE" aria-label="&#193;o D&#226;y TWIST DRAPE">Áo Dây TWIST DRAPE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.679.000₫</strong>
                    <del>1.880.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/5d4ca15607e32b7b43318865f3af4de95e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4174f0861eeb23441bf7eb6252bf190d-2129c67775e94d408f68a10a29ed7290-27c6d58deee14d4da12f1b70fc39ba235e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4174f0861eeb23441bf7eb6252bf190d-2129c67775e94d408f68a10a29ed7290-27c6d58deee14d4da12f1b70fc39ba235e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/5d4ca15607e32b7b43318865f3af4de9-ce8d912eb4474f5dacc8c54e82854020-f267f0e808d6435bbef82dc327eecbb65e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/5d4ca15607e32b7b43318865f3af4de9-ce8d912eb4474f5dacc8c54e82854020-f267f0e808d6435bbef82dc327eecbb65e0f.jpg?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/46ca37424dabab3e8eaf50be81266100-6dae117d2f584904b0a623e6ba4db62d-53d035ecc8f041e587c57bfa6fadc9635e0f.jpg?v=1720423503557">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/46ca37424dabab3e8eaf50be81266100-6dae117d2f584904b0a623e6ba4db62d-53d035ecc8f041e587c57bfa6fadc9635e0f.png?v=1720423503557" width="50" height="50" loading="lazy" decoding="async"
                             alt='&#193;o D&#226;y TWIST DRAPE'
                             title='&#193;o D&#226;y TWIST DRAPE'>
                    </div>
                </div>
            </div>
        </div>
    </div>			</div>
            </div>
            <div class="home-product-stylist-wrapper home-product-stylist-wrapper-2">
                <a href="https://f1genz-luxury-fashion.mysapo.net/dam-eden-lpt" title="Big Sale" class="home-product-stylist-sideBanner">
                    <img src="../bizweb.dktcdn.net/thumb/1024x1024/100/520/624/themes/959507/assets/home_product_stylist_image_d__2b1ed.jpg?1724041824574"
                         alt="Big Sale" title="Big Sale" 
                         width="1024" height="1024"
                         loading="lazy" decoding="async" fetchpriority="auto">
                </a>
                <div class="home-product-stylist-item-wrapper">
    
    
    
    
    
    <div class="product-item" data-id="120912709" data-handle="two-line-halter-neck-top">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="two-line-halter-neck-top.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" 
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-40%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="two-line-halter-neck-top.html"
                       title="ROSY"
                       aria-label="ROSY"><span>ROSY</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389538"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="two-line-halter-neck-top.html" title="TWO LINE HALTER NECK TOP" aria-label="TWO LINE HALTER NECK TOP">TWO LINE HALTER NECK TOP</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.390.000₫</strong>
                    <del>2.300.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/49e351dd1e75924bee2faf7bb97cb15c-4b39b7c47982471fb0d1a4c03467bd5b-c498e64a6f60432ea88aa3d07282bfaa4d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/33feef65801c9715ffd1b4bb81267945-904a2125252f401ca4be8ab2caea225d-db03b4fd86d3466bbbef6e00968ff0d24d4c.jpg?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.jpg?v=1720423660143">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/99d8faecec9cdac208c1470556acacff-e4cde2c2b01b4d3c9694c940f14a00d3-909c53c93a144bbe9c1fac4211d4db644d4c.png?v=1720423660143" width="50" height="50" loading="lazy" decoding="async"
                             alt='TWO LINE HALTER NECK TOP'
                             title='TWO LINE HALTER NECK TOP'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912703" data-handle="ribbon-sleeveless-one-piece-white">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-sleeveless-one-piece-white.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" 
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-22%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="ribbon-sleeveless-one-piece-white.html"
                       title="RIBBON"
                       aria-label="RIBBON"><span>RIBBON</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389537"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="ribbon-sleeveless-one-piece-white.html" title="RIBBON SLEEVELESS ONE PIECE WHITE" aria-label="RIBBON SLEEVELESS ONE PIECE WHITE">RIBBON SLEEVELESS ONE PIECE WHITE</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.459.000₫</strong>
                    <del>1.869.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c9954d9ce37649c2a9a77f10a513244b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/6aab01998c0ead3baa5709ba30e3d200-490cdfbe14aa41b3acfdd347809ae9bb-e01366155c23413ebf1849f058d44b0cb81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/233f4d477b17798978f5e264c5bd9d01-5da82aad5df54896b6fd0d2223606a9f-abb59f01261746e2aba2a2f1305acc4eb81f.png?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/85027689dd64c8704418a9c605fd3ddc-15041daddeb743d2a112984f1f81742f-b766b4610f5b4af58618a0e5706c00a4b81f.jpg?v=1720423691120" width="50" height="50" loading="lazy" decoding="async"
                             alt='RIBBON SLEEVELESS ONE PIECE WHITE'
                             title='RIBBON SLEEVELESS ONE PIECE WHITE'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912667" data-handle="ribbon-jacquard-vintage">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="ribbon-jacquard-vintage.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4ba734f8a25b5ec60601367e1a0d98375c29.jpg?v=1720423861723" 
                             alt='RIBBON JACQUARD VINTAGE'
                             title='RIBBON JACQUARD VINTAGE' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-20%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
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
    
    
    
    
    <div class="product-item" data-id="120912723" data-handle="khan-choang-co-day">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="khan-choang-co-day.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053" 
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="khan-choang-co-day.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389542"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="khan-choang-co-day.html" title="Khăn cho&#224;ng cổ d&#226;y" aria-label="Khăn cho&#224;ng cổ d&#226;y">Khăn choàng cổ dây</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>2.180.000₫</strong>
                    <del>2.340.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/584e3757e9d23c18bcf0ed3b3aeb1911-333ab917ed794fffa8f93d2ccc873d1b-23f870f1a7434fd383e027ebab07dce009a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/584e3757e9d23c18bcf0ed3b3aeb1911-333ab917ed794fffa8f93d2ccc873d1b-23f870f1a7434fd383e027ebab07dce009a2.png?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/795f20bd0613da5580d04fb0d81b5329-0067b77979ba41a7a8ff3fcee1970adf-6267e172c47545e9a3ff6e2c7105e20809a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/795f20bd0613da5580d04fb0d81b5329-0067b77979ba41a7a8ff3fcee1970adf-6267e172c47545e9a3ff6e2c7105e20809a2.png?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/bd5deaee028b51b64590bd5b3c0f2205-31beadd730274ea3a0f65d9def3efe7a-e48cda6adcce47949cfa4ade274abcbc09a2.jpg?v=1720423576053">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/bd5deaee028b51b64590bd5b3c0f2205-31beadd730274ea3a0f65d9def3efe7a-e48cda6adcce47949cfa4ade274abcbc09a2.jpg?v=1720423576053" width="50" height="50" loading="lazy" decoding="async"
                             alt='Khăn cho&#224;ng cổ d&#226;y'
                             title='Khăn cho&#224;ng cổ d&#226;y'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912660" data-handle="co-chu-u-tay-ao-xam">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="co-chu-u-tay-ao-xam.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" 
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-11%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="co-chu-u-tay-ao-xam.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389526"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="co-chu-u-tay-ao-xam.html" title="CỔ CHỮ U TAY &#193;O X&#193;M" aria-label="CỔ CHỮ U TAY &#193;O X&#193;M">CỔ CHỮ U TAY ÁO XÁM</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.489.000₫</strong>
                    <del>1.678.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4c3b0df54321e4e9375151e390e815d1ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd72dd3496e4c8fc321089865c8dc3-fc6c0c62cc97407694f9e1779733e094-4708e838827f483caf158848465c1d33ee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/93e8ecac1ba5ab545446f0081d69ec89-adb49cfd4f934449aee9d661c830b0f0-1e669fbccfa04cf592ee765c987a800fee06.jpg?v=1720423442500" width="50" height="50" loading="lazy" decoding="async"
                             alt='CỔ CHỮ U TAY &#193;O X&#193;M'
                             title='CỔ CHỮ U TAY &#193;O X&#193;M'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912730" data-handle="corset-bung-len-quan-denim-mini">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="corset-bung-len-quan-denim-mini.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" 
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-7%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="corset-bung-len-quan-denim-mini.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389544"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="corset-bung-len-quan-denim-mini.html" title="Corset b&#249;ng l&#234;n quần denim mini" aria-label="Corset b&#249;ng l&#234;n quần denim mini">Corset bùng lên quần denim mini</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.249.000₫</strong>
                    <del>1.343.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd4034758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/be085cf2834ba77b3d8170e560247fa9-9c9c9776f90c4b548c390f69ebe8a048-07d405aeb80a4f1ca529677b34b819ec4758.png?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/57b9c99b8800ba8eda059ff6d1cbd403-650f78da0d5c4846951cba0527b181ad-22e2841df2894ce49e5807eaca8470a24758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/1259379de564f1da6c5d5d013cd19470-097123b0b7934b33bd8bc752adc45d23-a1657f72b5844223b94779e738e681c84758.jpg?v=1720423539980" width="50" height="50" loading="lazy" decoding="async"
                             alt='Corset b&#249;ng l&#234;n quần denim mini'
                             title='Corset b&#249;ng l&#234;n quần denim mini'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="product-item" data-id="120912716" data-handle="combi-knit-cardian">
        <div class="product-item-wrap">
            <div class="product-item-top">
                <div class="product-item-top-image">
                    <a href="combi-knit-cardian.html" class="product-item-top-image-showcase">
                        <img src="../bizweb.dktcdn.net/thumb/large/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013" 
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN' width="480" height="480" loading="lazy" decoding="async">
                    </a>
                </div>
                <div class="product-item-label-sale"><span>-38%</span></div>
                <button type="button" title="Yêu thích" class="shop-wishlist-button-add" data-type="shop-wishlist-button-add">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M359.511,37.984c-38.907,0-75.282,14.653-103.511,41.478c-28.229-26.825-64.605-41.478-103.511-41.478 C68.406,37.984,0,108.033,0,194.135c0,49.918,42.543,112.126,126.449,184.895c61.346,53.204,123.555,93.023,124.176,93.419 c1.639,1.045,3.507,1.567,5.375,1.567c1.868,0,3.736-0.523,5.376-1.568c0.621-0.396,62.83-40.215,124.176-93.419 C469.457,306.26,512,244.052,512,194.135C512,108.033,443.594,37.984,359.511,37.984z M372.62,363.771 c-49.885,43.284-100.379,77.567-116.62,88.301c-16.216-10.715-66.578-44.903-116.448-88.153C61.34,296.089,20,237.378,20,194.135 C20,119.06,79.435,57.984,152.489,57.984c36.726,0,70.877,15.094,96.161,42.501c1.893,2.052,4.558,3.219,7.35,3.219 s5.457-1.167,7.35-3.219c25.285-27.406,59.435-42.5,96.161-42.5C432.565,57.984,492,119.06,492,194.135 C492,237.344,450.719,296.003,372.62,363.771z" fill="#000000" data-original="#000000"></path> <path d="M347.379,93.307l-0.376,0.065c-5.438,0.966-9.063,6.157-8.097,11.595c0.861,4.846,5.078,8.252,9.834,8.252 c0.581,0,1.17-0.051,1.76-0.156l0.199-0.034c5.446-0.917,9.118-6.075,8.201-11.521C357.983,96.06,352.82,92.393,347.379,93.307z" fill="#000000" data-original="#000000"></path> <path d="M439.056,131.382c-12.278-16.867-29.718-29.43-49.106-35.375c-5.281-1.621-10.873,1.349-12.492,6.629 c-1.619,5.28,1.349,10.873,6.629,12.492c31.959,9.8,54.279,41.078,54.279,76.063c0,5.523,4.477,10,10,10s10-4.477,9.999-10.001 C458.365,169.416,451.688,148.735,439.056,131.382z" fill="#000000" data-original="#000000"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#fc4f4f" d="M198 32.5c-3.4-1.1-7-1.8-10.7-2.2-47.2-4.8-59.3 40.2-59.3 40.2s-12.1-45-59.2-40.2C25 34.7 2 89.9 30.7 136.3c8.2 13.3 21 27.6 34.7 40.9 27.5 26.7 58.5 48.9 62.6 48.9 6.2 0 72.5-49.7 97.3-89.7C251.6 93.9 234.6 44 198 32.5z" opacity="1" data-original="#fc4f4f" class="hovered-path"></path><path d="M225.3 136.3C251.6 93.9 234.6 44 198 32.5c0 0 36.5 35.2 15.5 71.4s-91.2 81.2-101.1 82.8c-8.2 1.3-29-.6-47-9.4 27.5 26.7 58.5 48.9 62.6 48.9 6.2-.1 72.5-49.8 97.3-89.9z" opacity="1" fill="#00000015" data-original="#00000015" class=""></path><ellipse cx="50.6" cy="65.5" fill="#fff" opacity=".3" rx="24.9" ry="12.6" transform="rotate(-49.83 50.593 65.492)"></ellipse></g></svg>
                </button>
                <div class="product-item-actions">
                    <button type="button" title="Thêm vào giỏ" class="shop-addLoop-button" data-type="shop-addLoop-button">Thêm vào giỏ</button>
                    <button type="button" title="Xem nhanh" class="shop-quickview-button" data-type="shop-quickview-button">Xem nhanh</button>
                </div>
            </div>
            <div class="product-item-detail">
                <div class="product-item-detail-flex">
                    <a class="product-item-detail-vendor" href="combi-knit-cardian.html"
                       title="CHACOAL"
                       aria-label="CHACOAL"><span>CHACOAL</span></a>
                    <div class="sapo-product-reviews-badge" data-id="36389540"></div>
                </div>
                <h3 class="product-item-detail-title"><a  href="combi-knit-cardian.html" title="COMBI KNIT CARDIAN" aria-label="COMBI KNIT CARDIAN">COMBI KNIT CARDIAN</a></h3>
                <div class="product-item-detail-price">
                    
                    <strong>1.790.000₫</strong>
                    <del>2.890.000₫</del>
                    
                </div>
                <div class="product-item-detail-gallery-items">
                    <div class="product-item-detail-gallery-item active" data-image="../bizweb.dktcdn.net/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/4cfd7b949710d5bcbbd6a053d7d3bf4f47c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/82a1d8db7ff06566befb94f4f403840b-52b892f880264cd3a231e101c6263ced-78237b1b7728476b917250385bfa283647c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/82a1d8db7ff06566befb94f4f403840b-52b892f880264cd3a231e101c6263ced-78237b1b7728476b917250385bfa283647c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/3605fea05456ef2050770982900148f4-b4c54c0d7f534c05a60d407ba7160a7b-6d3d6b7dd5b9444fb023215fdc45299947c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/3605fea05456ef2050770982900148f4-b4c54c0d7f534c05a60d407ba7160a7b-6d3d6b7dd5b9444fb023215fdc45299947c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                    <div class="product-item-detail-gallery-item" data-image="../bizweb.dktcdn.net/100/520/624/products/620218efaa165d56b7b62f54f1123367-c5bc88f41206456b90f8186c2a0b7015-1f9b0974880f48f2b7ca607c11d328ea47c5.jpg?v=1720423611013">
                        <img src="../bizweb.dktcdn.net/thumb/small/100/520/624/products/620218efaa165d56b7b62f54f1123367-c5bc88f41206456b90f8186c2a0b7015-1f9b0974880f48f2b7ca607c11d328ea47c5.jpg?v=1720423611013" width="50" height="50" loading="lazy" decoding="async"
                             alt='COMBI KNIT CARDIAN'
                             title='COMBI KNIT CARDIAN'>
                    </div>
                </div>
            </div>
        </div>
    </div>			</div>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="home-product-pos section-distance">
            <div class="home-product-pos-wrap">
                <picture title="F1GENZ Model Fashion">
                    <source media="(max-width: 480px)" srcset="../bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/home_product_pos_imageb1ed.png?1724041824574">
                    <source media="(min-width: 481px)" srcset="../bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_product_pos_imageb1ed.png?1724041824574">
                    <img class="w-100" width="1920" height="640" loading="lazy" decoding="async"
                         src="../bizweb.dktcdn.net/100/520/624/themes/959507/assets/home_product_pos_imageb1ed.png?1724041824574" alt="/">
                </picture>
                <div class="home-product-pos-item" style="top: 40%; left: 23%">
                    <span class="home-product-pos-item-dots"></span>
                    <div class="home-product-pos-item-contents">
                        <picture>
                            <source media="(max-width: 480px)" srcset="//bizweb.dktcdn.net/thumb/grande/100/520/624/products/538fd3e943ab559644486203b807d8af.jpg?v=1720423576053" width="600" height="600">
                            <source media="(min-width: 481px)" srcset="//bizweb.dktcdn.net/thumb/large/100/520/624/products/538fd3e943ab559644486203b807d8af.jpg?v=1720423576053" width="480" height="480">
                            <img loading="lazy" decoding="async" width="480" height="480" 
                                 src="../bizweb.dktcdn.net/thumb/compact/100/520/624/products/538fd3e943ab559644486203b807d8af09a2.jpg?v=1720423576053"  alt="Khăn choàng cổ dây" >
                        </picture>
                        <a href="khan-choang-co-day.html" title="Khăn choàng cổ dây">
                            <h3>Khăn choàng cổ dây<br>
    <small>Xanh nhạt / S</small>						</h3>
                            <span>2.180.000₫</span>
                        </a>
                    </div>
                </div>
                <div class="home-product-pos-item" style="top: 41%; left: 80%">
                    <span class="home-product-pos-item-dots"></span>
                    <div class="home-product-pos-item-contents">
                        <picture>
                            <source media="(max-width: 480px)" srcset="//bizweb.dktcdn.net/thumb/grande/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b9.jpg?v=1720423660143" width="600" height="600">
                            <source media="(min-width: 481px)" srcset="//bizweb.dktcdn.net/thumb/large/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b9.jpg?v=1720423660143" width="480" height="480">
                            <img loading="lazy" decoding="async" width="480" height="480" 
                                 src="../bizweb.dktcdn.net/thumb/compact/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b94d4c.jpg?v=1720423660143"  alt="TWO LINE HALTER NECK TOP" >
                        </picture>
                        <a href="two-line-halter-neck-top.html" title="TWO LINE HALTER NECK TOP">
                            <h3>TWO LINE HALTER NECK TOP<br>
    <small>Trắng / S</small>						</h3>
                            <span>1.390.000₫</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>    
    </div>
    <div class="home-blogs section-distance">
        <div class="container">
            <div class="home-blogs-wrapper">
                <div class="home-product-list-header-wrapper">
                    <hr>
                    <a href="collections/all.html" title="Xu hướng thời trang"><h2>Xu hướng thời trang</h2></a>
                    <hr>
                </div>
                <h3>
                    Top các bài viết xu hướng hiện nay
                </h3>
                <div class="home-blogs-bottom">
    <div class="home-blogs-items">
    
    
    <div class="article-item " data-index="2"> 
        <div class="article-item-wrap">
            <a href= "ve-dep-truong-ton-duoc-tai-tao-nghien-cuu-su-doi-lap-trong-xu-huong-thoi-trang-mua-thu-2024.html" class="article-item-image" title="Vẻ Đẹp Trường Tồn Được Tái Tạo: Nghiên Cứu Sự Đối Lập trong Xu Hướng Thời Trang Mùa Thu 2024">
                <img loading="lazy" decoding="async" width="600" height="400"
                     src="../bizweb.dktcdn.net/thumb/grande/100/520/624/articles/dip-holding3-da21e5c4d4274ab2a94f6f5917600bfb7879.jpg?v=1719832066150" alt="Vẻ Đẹp Trường Tồn Được Tái Tạo: Nghiên Cứu Sự Đối Lập trong Xu Hướng Thời Trang Mùa Thu 2024" title="Vẻ Đẹp Trường Tồn Được Tái Tạo: Nghiên Cứu Sự Đối Lập trong Xu Hướng Thời Trang Mùa Thu 2024"> 
            </a>
            <div class="article-item-detail">
                <h3 class="article-item-detail-title"><a title="Vẻ Đẹp Trường Tồn Được Tái Tạo: Nghiên Cứu Sự Đối Lập trong Xu Hướng Thời Trang Mùa Thu 2024" href="ve-dep-truong-ton-duoc-tai-tao-nghien-cuu-su-doi-lap-trong-xu-huong-thoi-trang-mua-thu-2024.html">Vẻ Đẹp Trường Tồn Được Tái Tạo: Nghiên Cứu Sự Đối Lập trong Xu Hướng Thời Trang Mùa Thu 2024</a></h3>
                <div class="article-item-detail-info">
                    <span class="article-item-detail-info-date" style="color: rgb(160, 62, 44);"><i class="fal fa-calendar"></i> 01.07.2024</span>
                    <span class="article-item-detail-info-author" style="color: rgb(42, 161, 161);"><i class='fal fa-edit' ></i> Công Ty TNHH KTCN F1GENZ</span> 
                    <span class="article-item-detail-info-comment" style="color: rgb(35, 153, 35);"><i class='fal fa-comments' ></i> 1 Comments</span>
                </div>
                <div class="article-item-detail-content">
                    Xu Hướng Thời Trang Mùa Thu 2024
    1. Sự Đối Lập Giữa Cổ Điển và Hiện Đại
    Mùa thu 2024 đang mang đến những xu hướng thời trang đầy sức sống và cá tính trên các sàn diễn thời trang châu Âu. Tại Tuần lễ Thời trang Milan vừa qua, các nhà thiết kế đã trình làng...
                </div>
                
                <a title="Xem thêm" href="ve-dep-truong-ton-duoc-tai-tao-nghien-cuu-su-doi-lap-trong-xu-huong-thoi-trang-mua-thu-2024.html" class="article-item-detail-more" >Xem thêm</a>
                
            </div>
        </div>
    </div>
    
    <div class="article-item " data-index="2"> 
        <div class="article-item-wrap">
            <a href= "hoai-co-gap-hien-dai-kham-pha-suc-quyen-ru-cua-tuan-le-thoi-trang-milan-2024.html" class="article-item-image" title="Hoài Cổ Gặp Hiện Đại: Khám Phá Sức Quyến Rũ của Tuần Lễ Thời Trang Milan 2024">
                <img loading="lazy" decoding="async" width="600" height="400"
                     src="../bizweb.dktcdn.net/thumb/grande/100/520/624/articles/img-218969-milanfashionweek-e58749bab71546ad8f996057a2bd4efb8af3.jpg?v=1719832066167" alt="Hoài Cổ Gặp Hiện Đại: Khám Phá Sức Quyến Rũ của Tuần Lễ Thời Trang Milan 2024" title="Hoài Cổ Gặp Hiện Đại: Khám Phá Sức Quyến Rũ của Tuần Lễ Thời Trang Milan 2024"> 
            </a>
            <div class="article-item-detail">
                <h3 class="article-item-detail-title"><a title="Hoài Cổ Gặp Hiện Đại: Khám Phá Sức Quyến Rũ của Tuần Lễ Thời Trang Milan 2024" href="hoai-co-gap-hien-dai-kham-pha-suc-quyen-ru-cua-tuan-le-thoi-trang-milan-2024.html">Hoài Cổ Gặp Hiện Đại: Khám Phá Sức Quyến Rũ của Tuần Lễ Thời Trang Milan 2024</a></h3>
                <div class="article-item-detail-info">
                    <span class="article-item-detail-info-date" style="color: rgb(160, 62, 44);"><i class="fal fa-calendar"></i> 01.07.2024</span>
                    <span class="article-item-detail-info-author" style="color: rgb(42, 161, 161);"><i class='fal fa-edit' ></i> Công Ty TNHH KTCN F1GENZ</span> 
                    <span class="article-item-detail-info-comment" style="color: rgb(35, 153, 35);"><i class='fal fa-comments' ></i> 0 Comments</span>
                </div>
                <div class="article-item-detail-content">
                    Xu Hướng Thời Trang Mùa Thu 2024
    1. Sự Đối Lập Giữa Cổ Điển và Hiện Đại
    Mùa thu 2024 đang mang đến những xu hướng thời trang đầy sức sống và cá tính trên các sàn diễn thời trang châu Âu. Tại Tuần lễ Thời trang Milan vừa qua, các nhà thiết kế đã trình làng...
                </div>
                
                <a title="Xem thêm" href="hoai-co-gap-hien-dai-kham-pha-suc-quyen-ru-cua-tuan-le-thoi-trang-milan-2024.html" class="article-item-detail-more" >Xem thêm</a>
                
            </div>
        </div>
    </div>
    
    <div class="article-item " data-index="2"> 
        <div class="article-item-wrap">
            <a href= "tuan-le-thoi-trang-milan-2024-khi-phong-cach-retro-gap-go-su-hien-dai.html" class="article-item-image" title="Tuần Lễ Thời Trang Milan 2024: Khi Phong Cách Retro Gặp Gỡ Sự Hiện Đại">
                <img loading="lazy" decoding="async" width="600" height="400"
                     src="../bizweb.dktcdn.net/thumb/grande/100/520/624/articles/qy7isfn4uffqrngt3o3zkzik7m-24d2283291034e8ba418e4027b9d242e3c6c.jpg?v=1719832066097" alt="Tuần Lễ Thời Trang Milan 2024: Khi Phong Cách Retro Gặp Gỡ Sự Hiện Đại" title="Tuần Lễ Thời Trang Milan 2024: Khi Phong Cách Retro Gặp Gỡ Sự Hiện Đại"> 
            </a>
            <div class="article-item-detail">
                <h3 class="article-item-detail-title"><a title="Tuần Lễ Thời Trang Milan 2024: Khi Phong Cách Retro Gặp Gỡ Sự Hiện Đại" href="tuan-le-thoi-trang-milan-2024-khi-phong-cach-retro-gap-go-su-hien-dai.html">Tuần Lễ Thời Trang Milan 2024: Khi Phong Cách Retro Gặp Gỡ Sự Hiện Đại</a></h3>
                <div class="article-item-detail-info">
                    <span class="article-item-detail-info-date" style="color: rgb(160, 62, 44);"><i class="fal fa-calendar"></i> 01.07.2024</span>
                    <span class="article-item-detail-info-author" style="color: rgb(42, 161, 161);"><i class='fal fa-edit' ></i> Công Ty TNHH KTCN F1GENZ</span> 
                    <span class="article-item-detail-info-comment" style="color: rgb(35, 153, 35);"><i class='fal fa-comments' ></i> 0 Comments</span>
                </div>
                <div class="article-item-detail-content">
                    Xu Hướng Thời Trang Mùa Thu 2024
    1. Sự Đối Lập Giữa Cổ Điển và Hiện Đại
    Mùa thu 2024 đang mang đến những xu hướng thời trang đầy sức sống và cá tính trên các sàn diễn thời trang châu Âu. Tại Tuần lễ Thời trang Milan vừa qua, các nhà thiết kế đã trình làng...
                </div>
                
                <a title="Xem thêm" href="tuan-le-thoi-trang-milan-2024-khi-phong-cach-retro-gap-go-su-hien-dai.html" class="article-item-detail-more" >Xem thêm</a>
                
            </div>
        </div>
    </div>
    
    <div class="article-item " data-index="2"> 
        <div class="article-item-wrap">
            <a href= "xu-huong-thoi-trang-mua-thu-2024-su-doi-lap-giua-co-dien-va-hien-dai.html" class="article-item-image" title="Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại">
                <img loading="lazy" decoding="async" width="600" height="400"
                     src="../bizweb.dktcdn.net/thumb/grande/100/520/624/articles/how-to-build-a-sustainable-wardr-1642e50652b4400ca95599d83cfe3105c5b5.jpg?v=1719832066063" alt="Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại" title="Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại"> 
            </a>
            <div class="article-item-detail">
                <h3 class="article-item-detail-title"><a title="Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại" href="xu-huong-thoi-trang-mua-thu-2024-su-doi-lap-giua-co-dien-va-hien-dai.html">Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại</a></h3>
                <div class="article-item-detail-info">
                    <span class="article-item-detail-info-date" style="color: rgb(160, 62, 44);"><i class="fal fa-calendar"></i> 01.07.2024</span>
                    <span class="article-item-detail-info-author" style="color: rgb(42, 161, 161);"><i class='fal fa-edit' ></i> Công Ty TNHH KTCN F1GENZ</span> 
                    <span class="article-item-detail-info-comment" style="color: rgb(35, 153, 35);"><i class='fal fa-comments' ></i> 0 Comments</span>
                </div>
                <div class="article-item-detail-content">
                    Xu Hướng Thời Trang Mùa Thu 2024
    1. Sự Đối Lập Giữa Cổ Điển và Hiện Đại
    Mùa thu 2024 đang mang đến những xu hướng thời trang đầy sức sống và cá tính trên các sàn diễn thời trang châu Âu. Tại Tuần lễ Thời trang Milan vừa qua, các nhà thiết kế đã trình làng...
                </div>
                
                <a title="Xem thêm" href="xu-huong-thoi-trang-mua-thu-2024-su-doi-lap-giua-co-dien-va-hien-dai.html" class="article-item-detail-more" >Xem thêm</a>
                
            </div>
        </div>
    </div>				</div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-tiktok section-distance">
        <div class="container">
            <div class="home-tiktok-data">
                <div class="home-tiktok-icon">
                    <div class="home-tiktok-left-header home-product-list-header-wrapper">
                        <hr>
                        <a href="#" title="F1GENZ Model Fashion TikTok">
                            <h2>F1GENZ Model Fashion TikTok</h2>
                        </a>
                        <hr>
                    </div>
                    <h3>Theo dõi chúng tôi trên TikTok</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g fill="#f00044"><path d="M182.1 265.4c-40.6 0-73.4 32.8-72.8 73 .4 25.8 14.6 48.2 35.5 60.7-7.1-10.9-11.3-23.8-11.5-37.7-.6-40.2 32.2-73 72.8-73 8 0 15.7 1.3 22.9 3.6v-80.5c-7.5-1.1-15.2-1.7-22.9-1.7H205V269c-7.2-2.3-14.9-3.6-22.9-3.6zM357.6 24H336.2c6 30.1 22.9 56.3 46.5 74.1C367.2 77.6 357.8 52 357.6 24z" fill="#f00044" opacity="1" data-original="#f00044" class=""></path><path d="M480 146.5c-7.9 0-15.5-.8-23-2.2V202c-27.2 0-53.6-5.3-78.4-15.9-16-6.8-30.9-15.5-44.6-26l.4 177.9c-.2 40-16 77.5-44.6 105.8-23.3 23-52.8 37.7-84.8 42.4-7.5 1.1-15.2 1.7-22.9 1.7-34.2 0-66.8-11.1-93.3-31.6 3 3.6 6.2 7.1 9.7 10.5 28.8 28.4 67 44.1 107.7 44.1 7.7 0 15.4-.6 22.9-1.7 32-4.7 61.5-19.4 84.8-42.4 28.6-28.3 44.4-65.8 44.6-105.8L357 183.1c13.6 10.5 28.5 19.3 44.6 26 24.9 10.5 51.3 15.9 78.4 15.9" fill="#f00044" opacity="1" data-original="#f00044" class=""></path></g><path fill="#08fff9" d="M98.2 254.1c28.5-28.3 66.4-44 106.8-44.3v-21.3c-7.5-1.1-15.2-1.7-22.9-1.7-40.8 0-79.1 15.7-107.9 44.3-28.3 28.1-44.5 66.5-44.4 106.4 0 40.2 15.9 77.9 44.6 106.4 4.6 4.5 9.3 8.7 14.3 12.5-22.6-26.9-34.9-60.5-35-95.9.1-39.9 16.2-78.3 44.5-106.4zM457 144.3v-21.4h-.2c-27.8 0-53.4-9.2-74-24.8 17.9 23.6 44.1 40.4 74.2 46.2z" opacity="1" data-original="#08fff9"></path><path fill="#08fff9" d="M202 432.2c9.5.5 18.6-.8 27-3.5 29-9.5 49.9-36.5 49.9-68.3l.1-119V24h57.2c-1.5-7.5-2.3-15.1-2.4-23H255v217.3l-.1 119c0 31.8-20.9 58.8-49.9 68.3-8.4 2.8-17.5 4.1-27 3.5-12.1-.7-23.4-4.3-33.2-10.1 12.3 19 33.3 31.9 57.2 33.2z" opacity="1" data-original="#08fff9"></path><path d="M205 486.2c32-4.7 61.5-19.4 84.8-42.4 28.6-28.3 44.4-65.8 44.6-105.8l-.4-177.9c13.6 10.5 28.5 19.3 44.6 26 24.9 10.5 51.3 15.9 78.4 15.9v-57.7c-30.1-5.8-56.3-22.6-74.2-46.2-23.6-17.8-40.6-44-46.5-74.1H279v217.3l-.1 119c0 31.8-20.9 58.8-49.9 68.3-8.4 2.8-17.5 4.1-27 3.5-24-1.3-44.9-14.2-57.2-33.1-20.9-12.4-35.1-34.9-35.5-60.7-.6-40.2 32.2-73 72.8-73 8 0 15.7 1.3 22.9 3.6v-59.2c-40.4.3-78.3 16-106.8 44.3-28.3 28.1-44.5 66.5-44.4 106.3 0 35.4 12.3 69 35 95.9 26.6 20.5 59.1 31.6 93.3 31.6 7.7.1 15.4-.5 22.9-1.6z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                </div>
                <div class="home-tiktok-embed">
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/tag/fashion" data-tag-id="fashion" data-embed-from="embed_page" data-embed-type="tag" style="max-width:780px; min-width:288px;"> <section> <a target="_blank" href="https://www.tiktok.com/tag/fashion?refer=hashtag_embed">#fashion</a> </section> </blockquote>  
                </div>
            </div>
        </div> 
    </div>
</main>
@endsection