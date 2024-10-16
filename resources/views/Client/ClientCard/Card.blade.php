@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="main-cart">
            <div class="main-cart-breadcrumb" title="Giỏ hàng">
                <div class="container">
                    <div hidden class="section-title-all">
                        <h1>Giỏ hàng</h1>
                    </div>
                    <div class="breadcrumb-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" aria-label="Trang chủ" title="Trang chủ">Trang
                                    chủ</a></li>

                            <li class="breadcrumb-item active"><span>Giỏ hàng</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="main-cart-wrap">
                <div class="container">
                    <div class="main-cart-data">
                        <div class="main-cart-data-head section-title-all">
                            <span>Giỏ hàng của bạn</span>
                            <p>Bạn đang có <strong>2</strong> sản phẩm trong giỏ hàng</p>
                        </div>
                        <div class="main-cart-data-full">
                            <div class="main-cart-data-full-list">
                                <div class="main-cart-data-full-item" data-id="120912660">
                                    <div class="main-cart-data-full-item-image">
                                        <a href="/co-chu-u-tay-ao-xam">
                                            <img title="CỔ CHỮ U TAY ÁO XÁM"
                                                src="https://bizweb.dktcdn.net/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3f.jpg?v=1720423442500"
                                                alt="CỔ CHỮ U TAY ÁO XÁM" />
                                        </a>
                                    </div>
                                    <div class="main-cart-data-full-item-info">
                                        <h3 class="main-cart-data-full-item-info-title"><a
                                                href="Lỗi liquid: Exception has been thrown by the target of an invocation."
                                                title="CỔ CHỮ U TAY ÁO XÁM">CỔ CHỮ U TAY ÁO XÁM </a></h3>
                                        <div class="main-cart-data-full-item-info-price">
                                            <label>Giá: </label>

                                            1.489.000₫
                                            <del>(1.678.000₫)</del>
                                        </div>

                                        <div class="main-cart-data-full-item-info-variant">
                                            <label>Phiên bản: </label>
                                            <span>Xám / S</span>
                                        </div>

                                        <div class="main-cart-data-full-item-info-quantity shop-quantity-wrap">
                                            <label>Số lượng</label>
                                            <div class="shop-quantity">
                                                <button type="button" data-type="shop-quantity-minus"
                                                    title="Giảm">-</button>
                                                <input type="number" name="quantity_120912660" value="1"
                                                    min="1" readonly data-vid="120912660">
                                                <button type="button" data-type="shop-quantity-plus"
                                                    title="Tăng">+</button>
                                            </div>
                                        </div>


                                        <div class="main-cart-data-full-item-info-total hidden d-none" hidden>

                                            <label>Thành tiền: </label>
                                            <span>1.489.000₫</span>

                                        </div>
                                        <div class="main-cart-data-full-item-info-remove">
                                            <a href="/cart/change?line=1&quantity=0" title="Xóa sản phẩm">Xoá sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="main-cart-data-full-item-action">
                                        <a href="/cart/change?line=1&quantity=0" title="Xóa sản phẩm"><svg version="1.1"
                                                x="0px" y="0px" viewBox="0 0 325.284 325.284"
                                                style="enable-background:new 0 0 325.284 325.284;" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M289.782,63.456H35.502c-7.04,0-12.768,5.732-12.768,12.768s5.732,12.768,12.768,12.768h2.828l25.856,206.644 c0,16.348,13.3,29.648,29.648,29.648h137.62c16.348,0,29.648-13.3,29.616-29.192l25.888-207.1h2.824 c7.04,0,12.768-5.732,12.768-12.768S296.822,63.456,289.782,63.456z M253.738,295.64c0,12.288-9.996,22.284-22.284,22.284H93.834 c-12.288,0-22.284-9.996-22.316-22.74L45.742,88.996h233.796L253.738,295.64z M289.782,81.632H35.502 c-2.98,0-5.404-2.424-5.404-5.404c0-2.98,2.424-5.404,5.404-5.404h254.28c2.98,0,5.404,2.424,5.404,5.404 C295.186,79.208,292.762,81.632,289.782,81.632z" />
                                                    <path
                                                        d="M91.67,110.828c5.976,0,10.836,4.512,10.848,10.312l15.568,162.288c0,5.556-4.864,10.068-10.836,10.068 c-2.4,0-4.716-0.772-6.688-2.232c-1.148-0.86-2.76-0.616-3.6,0.536c-0.848,1.14-0.608,2.756,0.536,3.6 c2.864,2.128,6.236,3.244,9.752,3.244c8.82,0,15.992-6.824,15.98-15.46l-15.568-162.288c0-8.392-7.172-15.22-15.992-15.22 c-1.424,0-2.576,1.152-2.576,2.58C89.094,109.676,90.246,110.828,91.67,110.828z" />
                                                    <path
                                                        d="M95.254,259.668c0.072,0,0.14-0.004,0.216-0.012c1.42-0.112,2.476-1.352,2.356-2.776l-7.976-98.652 c-0.112-1.42-1.4-2.448-2.776-2.356c-1.42,0.112-2.476,1.352-2.36,2.772l7.98,98.652 C92.798,258.648,93.926,259.668,95.254,259.668z" />
                                                    <path
                                                        d="M176.058,177.516c-1.424,0-2.576,1.152-2.576,2.576v103.336c0,5.556-4.864,10.068-10.84,10.068 c-2.4,0-4.72-0.772-6.692-2.232c-1.14-0.856-2.76-0.612-3.6,0.54c-0.848,1.14-0.608,2.752,0.54,3.6 c2.864,2.124,6.24,3.24,9.752,3.24c8.82,0,15.992-6.824,15.992-15.22V180.088C178.634,178.664,177.482,177.516,176.058,177.516z" />
                                                    <path
                                                        d="M154.418,254.94c1.424,0,2.576-1.152,2.576-2.576V112.368c1.724-1.008,3.656-1.54,5.652-1.54 c5.976,0,10.836,4.512,10.836,10.064v25.44c0,1.428,1.152,2.576,2.58,2.576c1.424,0,2.576-1.148,2.576-2.576v-25.44 c0-8.392-7.172-15.22-15.992-15.22c-3.516,0-6.892,1.12-9.76,3.248c-0.656,0.48-1.044,1.252-1.044,2.068v141.376 C151.842,253.788,152.994,254.94,154.418,254.94z" />
                                                    <path
                                                        d="M219.05,132.444c1.432,0.156,2.636-1.012,2.708-2.436l0.948-17.592c1.744-1.044,3.704-1.588,5.72-1.588 c5.972,0,10.836,4.512,10.844,9.908l-10.392,162.692c0,5.552-4.864,10.064-10.836,10.064c-1.428,0-2.58,1.152-2.58,2.58 c0,1.424,1.152,2.576,2.58,2.576c8.82,0,15.988-6.828,15.984-15.06l10.392-162.692c0-8.392-7.172-15.22-15.992-15.22 c-3.516,0-6.892,1.12-9.76,3.248c-0.616,0.456-1,1.168-1.04,1.932l-1.016,18.88C216.538,131.156,217.63,132.368,219.05,132.444z" />
                                                    <path
                                                        d="M210.754,275.728c0.052,0.004,0.1,0.004,0.152,0.004c1.356,0,2.488-1.056,2.572-2.424l6.436-109.056 c0.084-1.42-0.996-2.64-2.42-2.724c-1.36-0.092-2.636,1-2.72,2.42l-6.44,109.056 C208.246,274.428,209.334,275.648,210.754,275.728z" />
                                                    <path
                                                        d="M43.614,56.54c2.032,0,3.684-1.648,3.684-3.684c0-12.288,9.996-22.288,22.284-22.288H255.71 c12.288,0,22.284,9.996,22.284,22.288c0,2.032,1.648,3.684,3.684,3.684c2.036,0,3.684-1.648,3.684-3.684 c0-16.348-13.3-29.648-29.648-29.648h-61.692C194.018,10.408,183.61,0,170.81,0h-16.336c-12.796,0-23.208,10.408-23.212,23.208 H69.578c-16.348,0-29.648,13.3-29.648,29.648C39.93,54.892,41.578,56.54,43.614,56.54z M154.474,7.364h16.336 c8.736,0,15.844,7.108,15.848,15.844h-48.032C138.63,14.472,145.738,7.364,154.474,7.364z" />
                                                    <path
                                                        d="M258.734,41.384c-1.284-0.608-2.824-0.064-3.432,1.224c-0.608,1.284-0.06,2.82,1.224,3.432 c3.032,1.44,5.016,3.536,6.068,6.4c0.384,1.044,1.372,1.688,2.42,1.688c0.296,0,0.596-0.052,0.888-0.156 c1.34-0.492,2.024-1.972,1.532-3.308C265.91,46.528,262.982,43.404,258.734,41.384z" />
                                                    <path
                                                        d="M220.206,38.056c-3.748,0.056-7.324,0.112-10.616,0.112c-1.424,0-2.576,1.152-2.576,2.58 c0,1.424,1.152,2.576,2.576,2.576c3.312,0,6.92-0.056,10.692-0.112c8.472-0.124,18.056-0.264,27.016,0.18 c0.044,0.004,0.092,0.004,0.132,0.004c1.364,0,2.504-1.072,2.572-2.444c0.08-1.42-1.02-2.632-2.44-2.704 C238.422,37.784,228.746,37.932,220.206,38.056z" />
                                                </g>
                                            </svg></a>
                                    </div>
                                </div>
                                <div class="main-cart-data-full-item" data-id="120912709">
                                    <div class="main-cart-data-full-item-image">
                                        <a href="/two-line-halter-neck-top">
                                            <img title="TWO LINE HALTER NECK TOP"
                                                src="https://bizweb.dktcdn.net/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b9.jpg?v=1720423660143"
                                                alt="TWO LINE HALTER NECK TOP" />
                                        </a>
                                    </div>
                                    <div class="main-cart-data-full-item-info">
                                        <h3 class="main-cart-data-full-item-info-title"><a
                                                href="Lỗi liquid: Exception has been thrown by the target of an invocation."
                                                title="TWO LINE HALTER NECK TOP">TWO LINE HALTER NECK TOP </a></h3>
                                        <div class="main-cart-data-full-item-info-price">
                                            <label>Giá: </label>

                                            1.390.000₫
                                            <del>(2.300.000₫)</del>
                                        </div>

                                        <div class="main-cart-data-full-item-info-variant">
                                            <label>Phiên bản: </label>
                                            <span>Trắng / S</span>
                                        </div>

                                        <div class="main-cart-data-full-item-info-quantity shop-quantity-wrap">
                                            <label>Số lượng</label>
                                            <div class="shop-quantity">
                                                <button type="button" data-type="shop-quantity-minus"
                                                    title="Giảm">-</button>
                                                <input type="number" name="quantity_120912709" value="1"
                                                    min="1" readonly data-vid="120912709">
                                                <button type="button" data-type="shop-quantity-plus"
                                                    title="Tăng">+</button>
                                            </div>
                                        </div>


                                        <div class="main-cart-data-full-item-info-total hidden d-none" hidden>

                                            <label>Thành tiền: </label>
                                            <span>1.390.000₫</span>

                                        </div>
                                        <div class="main-cart-data-full-item-info-remove">
                                            <a href="/cart/change?line=2&quantity=0" title="Xóa sản phẩm">Xoá sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="main-cart-data-full-item-action">
                                        <a href="/cart/change?line=2&quantity=0" title="Xóa sản phẩm"><svg version="1.1"
                                                x="0px" y="0px" viewBox="0 0 325.284 325.284"
                                                style="enable-background:new 0 0 325.284 325.284;" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M289.782,63.456H35.502c-7.04,0-12.768,5.732-12.768,12.768s5.732,12.768,12.768,12.768h2.828l25.856,206.644 c0,16.348,13.3,29.648,29.648,29.648h137.62c16.348,0,29.648-13.3,29.616-29.192l25.888-207.1h2.824 c7.04,0,12.768-5.732,12.768-12.768S296.822,63.456,289.782,63.456z M253.738,295.64c0,12.288-9.996,22.284-22.284,22.284H93.834 c-12.288,0-22.284-9.996-22.316-22.74L45.742,88.996h233.796L253.738,295.64z M289.782,81.632H35.502 c-2.98,0-5.404-2.424-5.404-5.404c0-2.98,2.424-5.404,5.404-5.404h254.28c2.98,0,5.404,2.424,5.404,5.404 C295.186,79.208,292.762,81.632,289.782,81.632z" />
                                                    <path
                                                        d="M91.67,110.828c5.976,0,10.836,4.512,10.848,10.312l15.568,162.288c0,5.556-4.864,10.068-10.836,10.068 c-2.4,0-4.716-0.772-6.688-2.232c-1.148-0.86-2.76-0.616-3.6,0.536c-0.848,1.14-0.608,2.756,0.536,3.6 c2.864,2.128,6.236,3.244,9.752,3.244c8.82,0,15.992-6.824,15.98-15.46l-15.568-162.288c0-8.392-7.172-15.22-15.992-15.22 c-1.424,0-2.576,1.152-2.576,2.58C89.094,109.676,90.246,110.828,91.67,110.828z" />
                                                    <path
                                                        d="M95.254,259.668c0.072,0,0.14-0.004,0.216-0.012c1.42-0.112,2.476-1.352,2.356-2.776l-7.976-98.652 c-0.112-1.42-1.4-2.448-2.776-2.356c-1.42,0.112-2.476,1.352-2.36,2.772l7.98,98.652 C92.798,258.648,93.926,259.668,95.254,259.668z" />
                                                    <path
                                                        d="M176.058,177.516c-1.424,0-2.576,1.152-2.576,2.576v103.336c0,5.556-4.864,10.068-10.84,10.068 c-2.4,0-4.72-0.772-6.692-2.232c-1.14-0.856-2.76-0.612-3.6,0.54c-0.848,1.14-0.608,2.752,0.54,3.6 c2.864,2.124,6.24,3.24,9.752,3.24c8.82,0,15.992-6.824,15.992-15.22V180.088C178.634,178.664,177.482,177.516,176.058,177.516z" />
                                                    <path
                                                        d="M154.418,254.94c1.424,0,2.576-1.152,2.576-2.576V112.368c1.724-1.008,3.656-1.54,5.652-1.54 c5.976,0,10.836,4.512,10.836,10.064v25.44c0,1.428,1.152,2.576,2.58,2.576c1.424,0,2.576-1.148,2.576-2.576v-25.44 c0-8.392-7.172-15.22-15.992-15.22c-3.516,0-6.892,1.12-9.76,3.248c-0.656,0.48-1.044,1.252-1.044,2.068v141.376 C151.842,253.788,152.994,254.94,154.418,254.94z" />
                                                    <path
                                                        d="M219.05,132.444c1.432,0.156,2.636-1.012,2.708-2.436l0.948-17.592c1.744-1.044,3.704-1.588,5.72-1.588 c5.972,0,10.836,4.512,10.844,9.908l-10.392,162.692c0,5.552-4.864,10.064-10.836,10.064c-1.428,0-2.58,1.152-2.58,2.58 c0,1.424,1.152,2.576,2.58,2.576c8.82,0,15.988-6.828,15.984-15.06l10.392-162.692c0-8.392-7.172-15.22-15.992-15.22 c-3.516,0-6.892,1.12-9.76,3.248c-0.616,0.456-1,1.168-1.04,1.932l-1.016,18.88C216.538,131.156,217.63,132.368,219.05,132.444z" />
                                                    <path
                                                        d="M210.754,275.728c0.052,0.004,0.1,0.004,0.152,0.004c1.356,0,2.488-1.056,2.572-2.424l6.436-109.056 c0.084-1.42-0.996-2.64-2.42-2.724c-1.36-0.092-2.636,1-2.72,2.42l-6.44,109.056 C208.246,274.428,209.334,275.648,210.754,275.728z" />
                                                    <path
                                                        d="M43.614,56.54c2.032,0,3.684-1.648,3.684-3.684c0-12.288,9.996-22.288,22.284-22.288H255.71 c12.288,0,22.284,9.996,22.284,22.288c0,2.032,1.648,3.684,3.684,3.684c2.036,0,3.684-1.648,3.684-3.684 c0-16.348-13.3-29.648-29.648-29.648h-61.692C194.018,10.408,183.61,0,170.81,0h-16.336c-12.796,0-23.208,10.408-23.212,23.208 H69.578c-16.348,0-29.648,13.3-29.648,29.648C39.93,54.892,41.578,56.54,43.614,56.54z M154.474,7.364h16.336 c8.736,0,15.844,7.108,15.848,15.844h-48.032C138.63,14.472,145.738,7.364,154.474,7.364z" />
                                                    <path
                                                        d="M258.734,41.384c-1.284-0.608-2.824-0.064-3.432,1.224c-0.608,1.284-0.06,2.82,1.224,3.432 c3.032,1.44,5.016,3.536,6.068,6.4c0.384,1.044,1.372,1.688,2.42,1.688c0.296,0,0.596-0.052,0.888-0.156 c1.34-0.492,2.024-1.972,1.532-3.308C265.91,46.528,262.982,43.404,258.734,41.384z" />
                                                    <path
                                                        d="M220.206,38.056c-3.748,0.056-7.324,0.112-10.616,0.112c-1.424,0-2.576,1.152-2.576,2.58 c0,1.424,1.152,2.576,2.576,2.576c3.312,0,6.92-0.056,10.692-0.112c8.472-0.124,18.056-0.264,27.016,0.18 c0.044,0.004,0.092,0.004,0.132,0.004c1.364,0,2.504-1.072,2.572-2.444c0.08-1.42-1.02-2.632-2.44-2.704 C238.422,37.784,228.746,37.932,220.206,38.056z" />
                                                </g>
                                            </svg></a>
                                    </div>
                                </div>
                                <div class="main-cart-data-full-note">
                                    <label>Ghi chú đơn hàng</label>
                                    <textarea id="main-cart-data-full-note" name="note" rows="4" placeholder="Nhập thông tin ghi chú của bạn ..."></textarea>
                                </div>
                            </div>
                            <div class="main-cart-data-full-total">
                                <h2>Thông tin đơn hàng</h2>
                                <div class="main-cart-data-full-total-sub">
                                    <div class="main-cart-data-full-total-sub-price">

                                        <label>Tổng tiền:</label>
                                        <span>2.879.000₫</span>

                                    </div>
                                    <div class="main-cart-data-full-total-text">Phí vận chuyển sẽ được tính ở trang thanh
                                        toán.
                                        </br>
                                        Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</div>
                                </div>
                                <div class="main-cart-data-full-invoice">
                                    <div class="main-cart-data-full-invoice-head">
                                        <input type="checkbox" id="main-cart-data-full-invoice"
                                            name="main-cart-data-full-invoice" autocomplete='off'>
                                        <label for="main-cart-data-full-invoice">Xuất hóa đơn</label>
                                    </div>
                                    <div class="main-cart-data-full-invoice-data">
                                        <input type="text" name="Công ty"
                                            id="main-cart-data-full-invoice-data-company" value=""
                                            placeholder="Tên công ty">
                                        <input type="text" name="Mã số thuế" id="main-cart-data-full-invoice-data-tax"
                                            value="" placeholder="Mã số thuế">
                                        <input type="text" name="Người đại diện"
                                            id="main-cart-data-full-invoice-data-address" value=""
                                            placeholder="Địa chỉ công ty">
                                        <input type="text" name="Địa chỉ" id="main-cart-data-full-invoice-data-name"
                                            value="" placeholder="Người nhận hóa đơn">
                                    </div>
                                </div>
                                <div class="main-cart-data-full-total-action">
                                    <a href="/collections/all" title="Tiếp tục mua hàng">Tiếp tục mua hàng</a>

                                    <a href="/checkout" title="Thanh toán">Thanh toán</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sapo-buyxgety-module-cart-v2 container"></div>
        <div class="sapo-buyxgety-module-cart-v2 container"></div>
    </main>
@endsection
