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
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif

                            @if (empty($cart))
                                <p>Giỏ hàng của bạn đang trống.</p>
                            @else
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
                            <p>Bạn đang có <strong>{{ count($cart) }}</strong> sản phẩm trong giỏ hàng</p>
                        </div>
                        <div class="main-cart-data-full">
                            <div class="main-cart-data-full-list">
                                <div class="main-cart-data-full-item" data-id="120912660">


                                </div>


                                @foreach ($cart as $item)
                                    <div class="main-cart-data-full-item" data-id="120912709">
                                        <div class="main-cart-data-full-item-image">
                                            <a href="/two-line-halter-neck-top">
                                                <img title="TWO LINE HALTER NECK TOP" src="{{ Storage::url($item->image) }}"
                                                    alt="{{ $item->name }}" />
                                            </a>
                                        </div>
                                        <div class="main-cart-data-full-item-info">
                                            <h3 class="main-cart-data-full-item-info-title"><a
                                                    href="Lỗi liquid: Exception has been thrown by the target of an invocation."
                                                    title="TWO LINE HALTER NECK TOP">{{ $item->product->name }}</a></h3>
                                            <div class="main-cart-data-full-item-info-price">
                                                <label>Giá: </label>

                                                @if ($item->variation)
                                                    {{ number_format($item->variation->price, 0, ',', '.') }}₫
                                                @else
                                                    {{ number_format($item->product->price, 0, ',', '.') }}₫
                                                @endif
                                            </div>

                                            <div class="main-cart-data-full-item-info-variant">
                                                <label>Phiên bản: </label>
                                                @if ($item->variation)
                                                    <span>{{ $item->variation->color->color }} /
                                                        {{ $item->variation->size->size }}</span>
                                                @else
                                                    <p>Không có biến thể được chọn. {{ dd($item->variation) }}</p>
                                                @endif
                                            </div>

                                            <div class="main-cart-data-full-item-info-quantity shop-quantity-wrap">
                                                <label>Số lượng</label>
                                                <div class="shop-quantity">
                                                    <button type="button" data-type="shop-quantity-minus"
                                                        title="Giảm">-</button>
                                                    <input type="number" name="quantity_120912709"
                                                        value="{{ $item->quantity }}" min="1" readonly
                                                        data-vid="120912709">
                                                    <button type="button" data-type="shop-quantity-plus"
                                                        title="Tăng">+</button>
                                                </div>
                                            </div>


                                            <div class="main-cart-data-full-item-info-total hidden d-none" hidden>

                                                <label>Thành tiền: </label>
                                                <span>1.390.000₫</span>

                                            </div>
                                            <div class="main-cart-data-full-item-info-remove">
                                                <a href="/cart/change?line=2&quantity=0" title="Xóa sản phẩm">Xoá sản
                                                    phẩm</a>
                                            </div>
                                        </div>
                                        <div class="main-cart-data-full-item-action">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Xóa sản phẩm">
                                                    <svg version="1.1" x="0px" y="0px" viewBox="0 0 325.284 325.284"
                                                        style="enable-background:new 0 0 325.284 325.284;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <!-- SVG content here -->
                                                        </g>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                                <div class="main-cart-data-full-note">
                                    <label>Ghi chú đơn hàng</label>
                                    <textarea id="main-cart-data-full-note" name="note" rows="4" placeholder="Nhập thông tin ghi chú của bạn ..."></textarea>
                                </div>
                            </div>
                            <div class="main-cart-data-full-total">
                                <h2>Thông tin đơn hàng</h2>
                                <div class="main-cart-data-full-total-sub">
                                    <div class="main-cart-data-full-total-sub-price">

                                        @php
                                            $totalPrice = 0;
                                            foreach ($cart as $item) {
                                                if ($item->variation) {
                                                    $totalPrice += $item->variation->price * $item->quantity;
                                                } else {
                                                    $totalPrice += $item->product->price * $item->quantity;
                                                }
                                            }
                                        @endphp

                                        <label>Tổng tiền:</label>
                                        <span>{{ number_format($totalPrice, 0, ',', '.') }}₫</span>

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
                                        <input type="text" name="Công ty" id="main-cart-data-full-invoice-data-company"
                                            value="" placeholder="Tên công ty">
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
                                    <a href="{{ route('client-home.index') }}" title="Tiếp tục mua hàng">Tiếp tục mua
                                        hàng</a>

                                    <a href="{{ route('client-checkout.index') }}" title="Thanh toán">Thanh toán</a>


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
