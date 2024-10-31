@extends('Admin1.layouts.master')
@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">

                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <!-- Sherah Breadcrumb -->
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Chi tiết sản phẩm</Details>
                                        </h2>
                                        
                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                </div>
                            </div>

                            <div class="product-detail-body sherah-default-bg sherah-border mg-top-30">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <!-- Product Slider -->
                                        <div class="product-gallery">
                                            <!-- product details image -->
                                            <div class="product-details-image">

                                                <ul class="nav-pills nav flex-nowrap product-thumbs" id="pills-tab"
                                                    role="tablist">
                                                    <li class="single-thumbs" role="presentation">
                                                        <a class="active" id="pills-home-tab" data-bs-toggle="pill"
                                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                                            aria-selected="true">
                                                            <img src="img/product-detail.png" alt="thumbs">
                                                        </a>
                                                    </li>
                                                    <li class="single-thumbs" role="presentation">
                                                        <a id="pills-profile-tab" data-bs-toggle="pill"
                                                            href="#pills-profile" role="tab"
                                                            aria-controls="pills-profile" aria-selected="false">
                                                            <img src="img/product-detail.png" alt="thumbs">
                                                        </a>
                                                    </li>
                                                    <li class="single-thumbs" role="presentation">
                                                        <a id="pills-contact-tab" data-bs-toggle="pill"
                                                            href="#pills-contact" role="tab"
                                                            aria-controls="pills-contact" aria-selected="false">
                                                            <img src="img/product-detail.png" alt="thumbs">
                                                        </a>
                                                    </li>
                                                    <li class="single-thumbs" role="presentation">
                                                        <a id="pills-four-tab" data-bs-toggle="pill" href="#pills-four"
                                                            role="tab" aria-controls="pills-four" aria-selected="false">
                                                            <img src="img/product-detail.png" alt="thumbs">
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="main-preview-image">
                                                    <div class="tab-content product-image" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-home"
                                                            role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="single-product-image">
                                                                <img src="img/product-detail.png" alt="product">
                                                            </div>
                                                            <!-- single product image -->
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                            aria-labelledby="pills-profile-tab">
                                                            <div class="single-product-image">
                                                                <img src="img/product-detail.png" alt="product">
                                                            </div>
                                                            <!-- single product image -->
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                            aria-labelledby="pills-contact-tab">
                                                            <div class="single-product-image">
                                                                <img src="img/product-detail.png" alt="product">
                                                            </div>
                                                            <!-- single product image -->
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-four" role="tabpanel"
                                                            aria-labelledby="pills-four-tab">
                                                            <div class="single-product-image">
                                                                <img src="img/product-detail.png" alt="product">
                                                            </div>
                                                            <!-- single product image -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product details image -->
                                        </div>
                                        <!-- End Product slider -->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="product-detail-body__content">
                                            <h2 class="product-detail-body__title">Atu Body Couture Bow Front Dress</h2>
                                            <p class="product-detail-body__stats">Sold 21 Products in last 10 Hours</p>
                                            <div class="product-detail-body__deal--rating">
                                                <h5 class="sherah-product-card__price"><del>$155</del>$135</h5>
                                                <div class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                    <div
                                                        class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                        <span class="sherah-color4"><i class="fa fa-star"></i></span>
                                                        <span class="sherah-color4"><i class="fa fa-star"></i></span>
                                                        <span class="sherah-color4"><i class="fa fa-star"></i></span>
                                                        <span class="sherah-color4"><i class="fa fa-star"></i></span>
                                                        <span class="sherah-color4"><i class="fa fa-star"></i></span>
                                                        (33)
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="product-detail-body__stock sherah-color3">45 In stock</p>
                                            <div class="product-detail-body__text">
                                                To achieve this, it would be necessary to have uniform grammar pronunciation
                                                and more our common words If several languages coalesce
                                            </div>

                                            <div class="sherah-border-btm pd-top-40 mg-btm-40"></div>
                                            <div class="sherah-products-meta">
                                                <ul class="sherah-products-meta__list">
                                                    <li><span class="p-list-title">SKU :</span> KE-91039 </li>
                                                    <li><span class="p-list-title">Category : </span> Cloth</li>
                                                    <li><span class="p-list-title">Tags :</span> Grown Dress, Dress, Party
                                                        Dress </li>
                                                    <li>
                                                        <span class="p-list-title">Share:</span>
                                                        <ul class="sherah-contact-info sherah-contact-social">
                                                            <li class="sherah-border"><a href="#"><span
                                                                        class="sherah-color1__bg--offset"><i
                                                                            class="fa-brands fa-facebook-f"></i></span></a>
                                                            </li>
                                                            <li class="sherah-border"><a href="#"><span
                                                                        class="sherah-color1__bg--offset"><i
                                                                            class="fa-brands fa-twitter"></i></span></a>
                                                            </li>
                                                            <li class="sherah-border"><a href="#"><span
                                                                        class="sherah-color1__bg--offset"><i
                                                                            class="fa-brands fa-linkedin"></i></span></a>
                                                            </li>
                                                            <li class="sherah-border"><a href="#"><span
                                                                        class="sherah-color1__bg--offset"><i
                                                                            class="fa-brands fa-instagram"></i></span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-detail-body sherah-default-bg sherah-border mg-top-30">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sherah-product-tabs mg-btm-30">
                                            <div class="sherah-product-tabs__list list-group " id="list-tab"
                                                role="tablist">
                                                <a class="list-group-item active" data-bs-toggle="list" href="#p_tab_1"
                                                    role="tab" href="#">Specifications</a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#p_tab_2"
                                                    role="tab">Features</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="p_tab_1" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <div class="sherah-product-tabs__text">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which don't look even slightly
                                                        believable. If you aare going to use a passage of Lorem Ipsum, you
                                                        need to be sure there isn't anything embarrassing hidden in the
                                                        middle of text. All the Lorem Ipsum generators on the Internet tend
                                                        to repeat predefined chunks as necessary, making this the first true
                                                        generator on the Internet. It uses a dictionary of over 200 Latin
                                                        words,</p>
                                                </div>
                                                <div class="sherah-table p-0">
                                                    <table class="product-overview-table mg-top-30">
                                                        <tbody>
                                                            <tr>
                                                                <td><span class="product-overview-table_title">Package
                                                                        Dimensions</span></td>
                                                                <td><span class="product-overview-table_text">44 x 32 x 4
                                                                        cm, 560 Grams</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        class="product-overview-table_title">Manufacturer</span>
                                                                </td>
                                                                <td><span class="product-overview-table_text">Badgley
                                                                        Mischka</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="product-overview-table_title">Product Part
                                                                        Number</span></td>
                                                                <td><span
                                                                        class="product-overview-table_text">JKGHNBKJG-MN563205</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="product-overview-table_title">Best Sellers
                                                                        Rank</span></td>
                                                                <td><span class="product-overview-table_text">#561 in
                                                                        Clothing and Accessories</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="product-overview-table_title">Customer
                                                                        Reviews</span></td>
                                                                <td>
                                                                    <div
                                                                        class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                                        <div
                                                                            class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa-regular fa-star"></i></span>
                                                                            2,580 Ratings
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="p_tab_2" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <ul class="sherah-features-list">
                                                    <li><svg class="sherah-offset__fill"
                                                            xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="11" viewBox="0 0 12 11">
                                                            <g id="Group_1022" data-name="Group 1022"
                                                                transform="translate(-165.75 -19.435)">
                                                                <path id="Path_550" data-name="Path 550"
                                                                    d="M165.75,24.587c.03-.212.052-.424.091-.634a5.39,5.39,0,0,1,7.9-3.832c.034.018.067.039.112.065l-.594,1.028a4.214,4.214,0,0,0-4.085-.04,4.027,4.027,0,0,0-2.048,2.56,4.254,4.254,0,0,0,3.005,5.353,4.023,4.023,0,0,0,3.607-.767,4.223,4.223,0,0,0,1.622-3.369h1.212c-.03.3-.042.6-.09.892a5.39,5.39,0,0,1-1.64,3.124,5.363,5.363,0,0,1-7.062.271,5.344,5.344,0,0,1-1.932-3.29c-.039-.214-.062-.43-.092-.646Z" />
                                                                <path id="Path_551" data-name="Path 551"
                                                                    d="M271.957,39.458a1.187,1.187,0,0,0-.106.085l-5.782,5.782a1.168,1.168,0,0,0-.08.1L263,42.428l.807-.8,2.126,2.127,5.18-5.18.848.857Z"
                                                                    transform="translate(-94.207 -18.545)" />
                                                            </g>
                                                        </svg>
                                                        Fiber or filament: type, size, length
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
