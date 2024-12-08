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
                            <li class="breadcrumb-item">
                                <a href="/" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a>
                            </li>
                            @if (Session::has('success'))
                                <!-- <div class="alert alert-success">{{ Session::get('success') }}</div> -->
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
                            @foreach ($cart as $item)
                             <input type="checkbox">
    <div class="main-cart-data-full-item">
       
        <div class="main-cart-data-full-item-image">
            @if ($item->product)
                <a href="/products/{{ $item->product->slug }}">
                    @if ($item->variation && $item->variation->image)
                        <img src="{{ Storage::url($item->variation->image->image_path) }}"
                             alt="{{ $item->product->name }}"
                             title="{{ $item->product->name }}"/>
                    @else
                        <img src="{{ asset('path/to/default/image.jpg') }}"
                             alt="Default Image"/>
                    @endif
                </a>
            @else
                <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image"/>
            @endif
        </div>
        <div class="main-cart-data-full-item-info">
            @if ($item->product)
                <h3 class="main-cart-data-full-item-info-title">
                    <a href="/products/{{ $item->product->slug }}"
                       title="{{ $item->product->name }}">{{ $item->product->name }}</a>
                </h3>
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
                        <span>{{ $item->variation->color->color }} / {{ $item->variation->size->size }}</span>
                    @endif
                </div>
            @else
                <h3>Sản phẩm không tồn tại</h3>
            @endif

            <div class="main-cart-data-full-item-info-quantity shop-quantity-wrap">
                <label>Số lượng</label>
                <div class="shop-quantity">
                    <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: flex;">
                        @csrf
                        <button type="submit" name="action" value="decrease" 
                                class="quantity-btn" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                        <input type="number" name="quantity" value="{{ $item->quantity }}" 
                               min="1" readonly>
                        <button type="submit" name="action" value="increase" 
                                class="quantity-btn">+</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="main-cart-data-full-item-action">
            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" title="Xóa sản phẩm" onclick="return confirm ('Bạn có muốn xóa không')">
                <svg class="sherah-color2__fill" xmlns="http://www.w3.org/2000/svg"
                        width="16.247" height="18.252" viewBox="0 0 16.247 18.252">
                        <g id="Icon" transform="translate(-160.007 -18.718)">
                            <path id="Path_484" data-name="Path 484"
                                d="M185.344,88.136c0,1.393,0,2.786,0,4.179-.006,1.909-1.523,3.244-3.694,3.248q-3.623.007-7.246,0c-2.15,0-3.682-1.338-3.687-3.216q-.01-4.349,0-8.7a.828.828,0,0,1,.822-.926.871.871,0,0,1,1,.737c.016.162.006.326.006.489q0,4.161,0,8.321c0,1.061.711,1.689,1.912,1.69q3.58,0,7.161,0c1.2,0,1.906-.631,1.906-1.695q0-4.311,0-8.622a.841.841,0,0,1,.708-.907.871.871,0,0,1,1.113.844C185.349,85.1,185.343,86.618,185.344,88.136Z"
                                transform="translate(-9.898 -58.597)" />
                            <path id="Path_485" data-name="Path 485"
                                d="M164.512,21.131c0-.517,0-.98,0-1.443.006-.675.327-.966,1.08-.967q2.537,0,5.074,0c.755,0,1.074.291,1.082.966.005.439.005.878.009,1.317a.615.615,0,0,0,.047.126h.428c1,0,2,0,3,0,.621,0,1.013.313,1.019.788s-.4.812-1.04.813q-7.083,0-14.165,0c-.635,0-1.046-.327-1.041-.811s.4-.786,1.018-.789C162.165,21.127,163.3,21.131,164.512,21.131Zm1.839-.021H169.9v-.764h-3.551Z"
                                transform="translate(0 0)" />
                            <path id="Path_486" data-name="Path 486"
                                d="M225.582,107.622c0,.9,0,1.806,0,2.709a.806.806,0,0,1-.787.908.818.818,0,0,1-.814-.924q0-2.69,0-5.38a.82.82,0,0,1,.81-.927.805.805,0,0,1,.79.9C225.585,105.816,225.582,106.719,225.582,107.622Z"
                                transform="translate(-58.483 -78.508)" />
                            <path id="Path_487" data-name="Path 487"
                                d="M266.724,107.63c0-.9,0-1.806,0-2.709a.806.806,0,0,1,.782-.912.818.818,0,0,1,.818.919q0,2.69,0,5.38a.822.822,0,0,1-.806.931c-.488,0-.792-.356-.794-.938C266.721,109.411,266.724,108.521,266.724,107.63Z"
                                transform="translate(-97.561 -78.509)" />
                        </g>
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endforeach
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
                                </div>
                                <div class="main-cart-data-full-total-action">
                                    <a href="{{ route('client-home.index') }}" title="Tiếp tục mua hàng">Tiếp tục mua hàng</a>
                                </div>
                                <div class="text-center" style="padding-bottom: 40px">
                                    <a class="ft2" href="{{ route('client-checkout.index') }}" title="Thanh toán">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endif
@endsection