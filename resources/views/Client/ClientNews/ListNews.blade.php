@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="main-blog" data-blog-id="668498">
            <div class="main-blog-breadcrumb" title="Xu hướng thời trang">
                <div class="container">
                    <div hidden class="section-title-all">
                        <h1>Xu hướng thời trang</h1>
                    </div>
                    <div class="breadcrumb-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" aria-label="Trang chủ" title="Trang chủ">Trang
                                    chủ</a></li>


                            <li class="breadcrumb-item active"><span>Blog - Xu hướng thời trang</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="main-blog-wrap">
                    <div class="main-blog-left">
                        <div class="main-blog-left-data">


                            @foreach ($data as $item)
                                <div class="article-item" data-index="{{ $loop->index }}">
                                    <div class="article-item-wrap">
                                        <a href="{{ route('client-news.show', $item->id) }}" class="article-item-image"
                                            title="{{ $item->title }}">
                                            <img loading="lazy" decoding="async" width="600" height="400"
                                                src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                                title="{{ $item->title }}">
                                        </a>
                                        <div class="article-item-detail">
                                            <h3 class="article-item-detail-title">
                                                <a title="{{ $item->title }}"
                                                    href="{{ route('client-news.show', $item->id) }}">{{ $item->title }}</a>
                                            </h3>
                                            {{-- <div class="article-item-detail-info">
                                                <span class="article-item-detail-info-date"
                                                    style="color: rgb(160, 62, 44);">
                                                    <i class="fal fa-calendar"></i> {{ $item->created_at->format('d.m.Y') }}
                                                </span>
                                                <span class="article-item-detail-info-author"
                                                    style="color: rgb(42, 161, 161);">
                                                    <i class="fal fa-edit"></i> {{ $item->author ?? 'Admin' }}
                                                </span>
                                                <span class="article-item-detail-info-comment"
                                                    style="color: rgb(35, 153, 35);">
                                                    <i class="fal fa-comments"></i> {{ $item->comments_count ?? 0 }}
                                                    Comments
                                                </span>
                                            </div> --}}
                                            <div class="article-item-detail-content">
                                                {{ \Illuminate\Support\Str::limit($item->content, 150) }}
                                            </div>
                                            <a title="Xem thêm" href="{{ route('client-news.show', $item->id) }}"
                                                class="article-item-detail-more">
                                                Xem thêm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="shop-pagination">

                        </div>
                    </div>
                    <div class="main-blog-right">
                        <div class="main-blog-right-newest">
                            <div class="section-title-all">
                                <span>Đừng bỏ lỡ.</span>
                            </div>

                            @foreach ($data as $key => $item)
                                <div class="article-item layout-small">{{ $key + 1 }}
                                    <div class="article-item-wrap">
                                        <a href="{{ route('client-news.show', $item->id) }}" class="article-item-image"
                                            title="{{ $item->title }}">
                                            <img loading="lazy" decoding="async" width="600" height="400"
                                                src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                                title="{{ $item->title }}">
                                        </a>
                                        <div class="article-item-detail">
                                            <h3 class="article-item-detail-title">
                                                <a title="{{ $item->title }}"
                                                    href="{{ route('client-news.show', $item->id) }}">{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="main-blog-right-menu">
                            <div class="section-title-all">
                                <span>Danh mục Blog</span>
                            </div>
                            <ul class="main-blog-right-menu-data">
                                <li class="">
                                    <a href="index.html" title="Trang chủ" aria-label="Trang chủ">Trang chủ</a>
                                </li>
                                <li class="hasChild">
                                    <a href="formal-pantsfc2c.html?view=vertical" title="Danh mục sản phẩm"
                                        aria-label="Danh mục sản phẩm">Danh mục sản phẩm<span>›</span></a>
                                    <ul class="menu1">
                                        <li class="">
                                            <a href="cocktail-dressesfc2c.html?view=vertical" title="Cocktail Dresses"
                                                aria-label="Cocktail Dresses">Cocktail Dresses</a>
                                        </li>
                                        <li class="">
                                            <a href="casual-jumpsuits.html" title="Casual Jumpsuits"
                                                aria-label="Casual Jumpsuits">Casual Jumpsuits</a>
                                        </li>
                                        <li class="">
                                            <a href="formal-pantsfc2c.html?view=vertical" title="Formal Pants"
                                                aria-label="Formal Pants">Formal Pants</a>
                                        </li>
                                        <li class="">
                                            <a href="collections/all.html" title="Knitted Sweaters"
                                                aria-label="Knitted Sweaters">Knitted Sweaters</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hasChild">
                                    <a href="ao-thun-lop-tencel-m-gray.html" title="Sản phẩm nổi bật"
                                        aria-label="Sản phẩm nổi bật">Sản phẩm nổi bật<span>›</span></a>
                                    <ul class="menu1">
                                        <li class="">
                                            <a href="two-line-halter-neck-topdda0.html?view=style1"
                                                title="TWO LINE HALTER NECK TOP" aria-label="TWO LINE HALTER NECK TOP">TWO
                                                LINE HALTER NECK TOP</a>
                                        </li>
                                        <li class="">
                                            <a href="combi-knit-cardian1848.html?view=style2" title="COMBI KNIT CARDIAN"
                                                aria-label="COMBI KNIT CARDIAN">COMBI KNIT CARDIAN</a>
                                        </li>
                                        <li class="">
                                            <a href="corset-bung-len-quan-denim-mini089e.html?view=style3"
                                                title="Corset bùng lên quần denim mini"
                                                aria-label="Corset bùng lên quần denim mini">Corset bùng lên quần denim
                                                mini</a>
                                        </li>
                                        <li class="">
                                            <a href="ao-thun-lop-tencel-m-gray.html" title="ÁO THUN LỚP Tencel M.GRAY"
                                                aria-label="ÁO THUN LỚP Tencel M.GRAY">ÁO THUN LỚP Tencel M.GRAY</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="xu-huong-thoi-trang.html" title="Xu hướng thời trang"
                                        aria-label="Xu hướng thời trang">Xu hướng thời trang</a>
                                </li>
                                <li class="">
                                    <a href="lien-he.html" title="Liên hệ" aria-label="Liên hệ">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-blog-right-banner">
                            <a href="index.html" aria-label="Bạn cần tư vấn?" title="Bạn cần tư vấn?">
                                <div class="section-title-all">
                                    <span>Bạn cần tư vấn?</span>
                                </div>
                                <picture>
                                    <source media="(max-width: 480px)" width="480" height="480"
                                        srcset="{{ asset('assets/bizweb.dktcdn.net/thumb/large/100/520/624/themes/959507/assets/main_blog_banner_imageb1ed.jpg') }}">
                                    <source media="(min-width: 481px)" width="600" height="600"
                                        srcset="{{ asset('assets/bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/main_blog_banner_imageb1ed.jpg') }}">
                                    <img width="600" height="600" loading="lazy" title="Bạn cần tư vấn?"
                                        src="{{ asset('assets/bizweb.dktcdn.net/thumb/grande/100/520/624/themes/959507/assets/main_blog_banner_imageb1ed.jpg') }}"
                                        alt="F1GENZ Model Fashion - main_blog_banner_title">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
