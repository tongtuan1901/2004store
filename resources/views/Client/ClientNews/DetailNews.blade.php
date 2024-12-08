@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="main-article">
            <div class="main-article-share">
                <button class="main-article-share-cta" data-type="main-article-share-menu" title="Mục lục">
                    <svg version="1.1" x="0px" y="0px" viewBox="0 0 377 377" style="enable-background:new 0 0 377 377;"
                        xml:space="preserve">
                        <g>
                            <circle cx="15" cy="88.5" r="15" />
                            <rect x="75" y="73.5" width="302" height="30" />
                            <circle cx="15" cy="288.5" r="15" />
                            <rect x="75" y="273.5" width="302" height="30" />
                            <circle cx="15" cy="188.5" r="15" />
                            <rect x="75" y="173.5" width="302" height="30" />
                        </g>
                    </svg>
                </button>
                <button class="main-article-share-cta" title="Chia sẻ" data-type="main-article-share-open-popup">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="#595959"
                            d="M19 3c-1.652 0-3 1.348-3 3 0 .46.113.895.3 1.285L12.587 11h-4.77A2.999 2.999 0 005 9c-1.652 0-3 1.348-3 3s1.348 3 3 3c1.3 0 2.402-.84 2.816-2h4.77l3.715 3.715c-.188.39-.301.824-.301 1.285 0 1.652 1.348 3 3 3s3-1.348 3-3-1.348-3-3-3c-.46 0-.895.113-1.285.3l-3.3-3.3 3.3-3.3c.39.187.824.3 1.285.3 1.652 0 3-1.348 3-3s-1.348-3-3-3z">
                        </path>
                    </svg>
                </button>
                <button class="main-article-share-cta" title="Bình luận" data-type="main-article-share-comment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        class="">
                        <path fill="#595959"
                            d="M12.5 16c.277 0 .5-.223.5-.5v-1c0-.277-.223-.5-.5-.5h-1c-.277 0-.5.223-.5.5v1c0 .277.223.5.5.5h1zM11 13h2c0-.447.412-1.02.863-1.645C14.404 10.603 15 9.776 15 9c0-1.477-1.121-3-3-3-2.047 0-3 1.79-3 3 0 .55.45 1 1 1s1-.45 1-1c0-.164.176-1 1-1 .988 0 1 .988 1 1 0 .537-.52 1.312-1.029 2.072-.49.732-.971 1.45-.971 1.928z">
                        </path>
                        <path fill="#595959" fill-rule="evenodd"
                            d="M2 11c0-5.027 4.547-9 10-9s10 3.973 10 9c0 .324-.02.637-.059.945-.554 5.172-5.238 8.774-7.398 10.16L13 23.095v-3.196c-.12.012-.239.028-.356.044-.211.03-.421.058-.644.058-5.453 0-10-3.973-10-9zm18 0c0-3.809-3.508-7-8-7s-8 3.191-8 7 3.508 7 8 7c.617 0 1.219-.066 1.8-.188l1.2-.238v1.508c2.047-1.637 4.61-4.152 4.953-7.352l.004-.003v-.004c.027-.243.043-.48.043-.723z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>0</span>
                </button>
                <button class="main-article-share-cta" data-type="main-article-share-font" title="Kích cỡ chữ"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#595959"
                            d="M9 5.5c0 .83.67 1.5 1.5 1.5H14v10.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V7h3.5c.83 0 1.5-.67 1.5-1.5S21.33 4 20.5 4h-10C9.67 4 9 4.67 9 5.5zM4.5 12H6v5.5c0 .83.67 1.5 1.5 1.5S9 18.33 9 17.5V12h1.5c.83 0 1.5-.67 1.5-1.5S11.33 9 10.5 9h-6C3.67 9 3 9.67 3 10.5S3.67 12 4.5 12z">
                        </path>
                    </svg></button>
                <div class="main-article-share-popup">
                    <div class="main-article-share-popup-head">
                        <label>Chia sẻ</label>
                        <a target="_blank" title="Chia sẻ Facebook" aria-label="Chia sẻ Facebook" href=""><svg
                                width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27 0H5a5 5 0 00-5 5v22a5 5 0 005 5h22a5 5 0 005-5V5a5 5 0 00-5-5z" fill="#1778F2">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.314 32V19.499h3.255L24 15.19h-3.686l.006-2.156c0-1.123.1-1.725 1.623-1.725h2.034V7h-3.255c-3.91 0-5.285 2.09-5.285 5.604v2.587H13v4.308h2.437V32h4.877z"
                                    fill="#fff"></path>
                            </svg></a>
                        <a target="_blank" title="Chia sẻ Twitter" aria-label="Chia sẻ Twitter" href=""><svg
                                width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="4" fill="#1FA1F3"></rect>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.73 13.235l.04.634-.674-.077c-2.455-.298-4.6-1.308-6.42-3.004l-.89-.841-.23.621c-.485 1.385-.175 2.848.836 3.832.54.544.419.622-.512.298-.324-.104-.607-.181-.634-.143-.094.091.23 1.27.486 1.735.35.648 1.065 1.282 1.847 1.657l.661.298-.782.013c-.755 0-.782.013-.701.285.27.841 1.335 1.735 2.522 2.123l.836.272-.728.414a7.894 7.894 0 01-3.615.958c-.607.013-1.106.065-1.106.104 0 .13 1.646.854 2.603 1.14 2.873.84 6.285.478 8.848-.959 1.82-1.023 3.642-3.055 4.491-5.023.459-1.049.918-2.965.918-3.884 0-.596.04-.673.795-1.385.445-.415.864-.868.945-.997.134-.246.12-.246-.567-.026-1.146.388-1.308.337-.742-.246.418-.414.917-1.165.917-1.385 0-.04-.202.026-.431.142-.243.13-.783.324-1.187.44l-.729.22-.66-.427c-.364-.233-.877-.492-1.147-.57-.688-.18-1.74-.155-2.36.052-1.686.583-2.752 2.085-2.63 3.729z"
                                    fill="#fff"></path>
                            </svg></a>
                        <a target="_blank" title="Chia sẻ WhatsApp" aria-label="Chia sẻ WhatsApp" href=""><svg
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
                        <a target="_blank" title="Chia sẻ Linkedin" aria-label="Chia sẻ Linkedin"
                            href="https://www.linkedin.com/sharing/share-offsite/?url=/xu-huong-thoi-trang-mua-thu-2024-su-doi-lap-giua-co-dien-va-hien-dai"><svg
                                width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="4" fill="#0077B5"></rect>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.857 9.07c-.022-1.094-.744-1.927-1.917-1.927S7 7.976 7 9.07C7 10.142 7.744 11 8.895 11h.022c1.196 0 1.94-.858 1.94-1.93zm0 3.216H7v11.571h3.857V12.286zm9.294 0c2.771 0 4.849 1.616 4.849 5.089v6.482h-4.212V17.81c0-1.52-.609-2.556-2.134-2.556-1.163 0-1.856.698-2.16 1.373-.112.242-.14.58-.14.917v6.314h-4.211s.055-10.244 0-11.305h4.212v1.601c.559-.77 1.56-1.867 3.796-1.867z"
                                    fill="#fff"></path>
                            </svg></a>
                    </div>
                    <hr>
                    <div class="main-article-share-popup-body">
                        <label>Sao chép đường dẫn</label>
                        <form>
                            <input
                                value="//f1genz-model-fashion.mysapo.net/xu-huong-thoi-trang-mua-thu-2024-su-doi-lap-giua-co-dien-va-hien-dai"
                                readonly id="main-article-share-copy">
                            <button type="button" data-type="main-article-share-copy" title="Sao chép">Sao chép</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main-article-breadcrumb"
                title="Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại">
                <div class="container">
                    <!--<div hidden class="section-title-all">
                                <h1>Xu Hướng Thời Trang Mùa Thu 2024: Sự Đối Lập Giữa Cổ Điển và Hiện Đại</h1>
                                </div>-->
                    <div class="breadcrumb-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" aria-label="Trang chủ"
                                    title="Trang chủ">Trang chủ</a></li>

                            <li class="breadcrumb-item"><a href="blogs/xu-huong-thoi-trang.html"
                                    aria-label="Blog - Xu hướng thời trang" title="Blog - Xu hướng thời trang">Blog - Xu
                                    hướng thời trang</a></li>

                            <li class="breadcrumb-item active"><span>{{ $news->title }}</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="main-article-menu sidebar">
                    <label>Mục lục bài viết</label>
                    <div class="main-article-menu-data"></div>
                </div>
                <div class="main-article-wrap">

                    <h1>{{ $news->title }}</h1>

                    <div class="main-article-wrap-author">
                        Tác giả: 2004store - đăng vào 17:53 ngày 01.07.2024
                    </div>
                    <div class="main-article-menu">
                        <label>Mục lục bài viết
                            <span>
                                <svg version="1.1" x="0px" y="0px" viewBox="0 0 377 377"
                                    style="enable-background:new 0 0 377 377;" xml:space="preserve">
                                    <g>
                                        <circle cx="15" cy="88.5" r="15" />
                                        <rect x="75" y="73.5" width="302" height="30" />
                                        <circle cx="15" cy="288.5" r="15" />
                                        <rect x="75" y="273.5" width="302" height="30" />
                                        <circle cx="15" cy="188.5" r="15" />
                                        <rect x="75" y="173.5" width="302" height="30" />
                                    </g>
                                </svg>
                            </span>
                        </label>
                        <div class="main-article-menu-data"></div>
                    </div>
                    <div class="main-article-content" data-size="16" style="--share_font: 16px">
                        <h2>Xu Hướng Thời Trang Mùa Thu 2024</h2>
                        <div class="main-article-wrap-avatar">
                            <img loading="lazy" decoding="async" width="600" height="400"
                                src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                title="{{ $news->title }}">
                        </div>
                        <p>{{ $news->content }}</p>
                    </div>

                    <div class="main-article-comment">
                        <!-- <div class="main-article-comment-form">
                            <div class="section-title-all">
                                <span>Viết bình luận</span>
                            </div>
                            <form method="post"
                                action="https://f1genz-model-fashion.mysapo.net/posts/xu-huong-thoi-trang-mua-thu-2024-su-doi-lap-giua-co-dien-va-hien-dai/comments"
                                id="article_comments" accept-charset="UTF-8"><input name="FormType" type="hidden"
                                    value="article_comments" /><input name="utf8" type="hidden"
                                    value="true" /><input type="hidden" id="Token-b77b4cc9852243fea3b35f338cc5a0a6"
                                    name="Token" /><noscript
                                    data-src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></noscript><noscript>grecaptcha.ready(function()
                                    {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action:
                                    "article_comments"}).then(function(token)
                                    {document.getElementById("Token-b77b4cc9852243fea3b35f338cc5a0a6").value =
                                    token});});</noscript> <input required type="text" name="Author"
                                    placeholder="Tên của bạn " value="">
                                <input required type="email" name="Email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" placeholder="Email của bạn">
                                <textarea required name="Body" placeholder="Viết bình luận ..."></textarea>
                                <button type="submit">Gửi bình luận</button>
                            </form>
                        </div> -->
                    </div>

                </div>
                <div class="main-article-right">

                    <div class="main-article-right-newest">
                        <div class="section-title-all">
                            <span>Bài viết liên quan</span>
                        </div>



                        <div class="article-item layout-small" data-index="{{ $news->id }}">
                            <div class="article-item-wrap">
                                <a href="{{ route('client-news.show', $news->id) }}" class="article-item-image"
                                    title="{{ $news->title }}">
                                    <img loading="lazy" decoding="async" width="600" height="400"
                                        src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        title="{{ $news->title }}">
                                </a>
                                <div class="article-item-detail">
                                    <h3 class="article-item-detail-title">
                                        <a title="{{ $news->title }}"
                                            href="{{ route('client-news.show', $news->id) }}">
                                            {{ $news->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- <div class="main-article-right-menu">
                        <div class="section-title-all">
                            <span>Danh mục Blog</span>
                        </div>
                        <ul class="main-article-right-menu-data">
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
                            <li class="">
                                <a href="xu-huong-thoi-trang.html" title="Xu hướng thời trang"
                                    aria-label="Xu hướng thời trang">Xu hướng thời trang</a>
                            </li>
                            <li class="">
                                <a href="lien-he.html" title="Liên hệ" aria-label="Liên hệ">Liên hệ</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
@endsection
