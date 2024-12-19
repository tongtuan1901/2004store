
@extends('Admin.layouts.master')

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
                                        <h2 class="sherah-breadcrumb__title">Chi tiết đơn hàng</h2>

                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <div class="sherah-table__head sherah-table__main">

                                    <h4 class="sherah-order-title">Mã đơn #{{ $order->order_code }}</h4>
                                    <div class="sherah-order-right">
                                        <p class="sherah-order-text">{{ $order->created_at}} / {{ $order->products->count() }} Sản phẩm / Phương thức thanh toán:    {{ $order->payment_method }}
                                        </p>
                                        <div class="sherah-table-status">
                                            <div class="sherah-table__status sherah-color2 sherah-color2__bg--opacity">{{ $order->payment_status }}</div>
                                            <div class="sherah-table__status sherah-color3 sherah-color3__bg--opacity">{{ $order->status }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12 mg-top-30">
                                        <div class="sherah-table-order">
                                        <h4 style="font-size: 1.5rem;">Chi Tiết Đơn Hàng</h4>
                                        <br>
                                        <hr>
                                        <br>
                                        <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
                                            <thead class="sherah-table__head">
                                                <tr>
                                                    <th class="sherah-table__column-2 sherah-table__h2">Tên Sản Phẩm</th>
                                                    <th class="sherah-table__column-1 sherah-table__h1">Hình Ảnh</th>
                                                    <th class="sherah-table__column-3 sherah-table__h4">Biến thể</th>
                                                    <th class="sherah-table__column-3 sherah-table__h4">Thương hiệu</th>
                                                    <th class="sherah-table__column-3 sherah-table__h4">Giá</th>
                                                    <th class="sherah-table__column-4 sherah-table__h5">Số Lượng</th>
                                                    <th class="sherah-table__column-4 sherah-table__h5">Ngày đặt</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sherah-table__body">
                                                @foreach ($order->orderItems as $item)
                                                    <tr>
                                                        <td class="sherah-table__column-2 sherah-table__data-2">
                                                            <div class="sherah-table__product-name">
                                                                <h4 class="sherah-table__product-name--title">{{ $item->product->name }}</h4>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-1 sherah-table__data-1">
                                                            <div class="sherah-table__product--thumb">
                                                                <div class="product-carousel">
                                                                    <div id="productCarousel{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                                                                        <div class="carousel-inner">
                                                                            @if ($item->variation)
                                                                                @if ($item->variation->image)
                                                                                    <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-fluid" width="150">
                                                                                @else
                                                                                    <p>No image available</p>
                                                                                @endif
                                                                            @else
                                                                                <p>No variation available</p>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-2 sherah-table__data-2">
                                                            <div class="sherah-table__product-name">
                                                                @if ($item->variation)
                                                                <div>
                                                                    Kích thước: {{ $item->variation->size->size ?? 'N/A' }},
                                                                    Màu sắc: {{ $item->variation->color->color ?? 'N/A' }}
                                                                </div>
                                                                @else
                                                                    <div>Không có biến thể</div>
                                                                @endif
                                                                    <hr>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-3 sherah-table__data-3">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">{{ $item->product->brand->name }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-3 sherah-table__data-3">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">{{ number_format($item->price) }} VNĐ</p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">{{ $item->quantity }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">{{ $order->created_at }}</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="order-totals">
                                            <!-- Hiển thị thông tin tổng giá trị đơn hàng -->
                                            <ul class="order-totals__list">
                                                <li class="order-totals__list--sub">
                                                    <span>Tổng cộng:</span>
                                                    <span class="order-totals__amount">{{ number_format($order->total)}} VNĐ</span>
                                                </li>

                                                <!-- Hiển thị giá trị giảm giá nếu có -->
                                                @if ($order->discount_value > 0)
                                                    <li class="order-totals__list--sub">
                                                        <span>Mã giảm giá({{ $order->discount_code }}):</span>
                                                        <span class="order-totals__amount">- {{ number_format($order->discount_value)}} VNĐ</span>
                                                    </li>
                                                @endif
                                                <li class="order-totals__list--sub">
                                                    <span>Thành tiền:</span>
                                                    <span class="order-totals__amount">{{ number_format($order->total - $order->discount_value)}} VNĐ</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <form action="{{ route('admin-ordersdangvanchuyen.update', $order->id) }}" method="POST" class="mb-3">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Cập nhật Trạng thái</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="Chờ xử lý" {{ $order->status == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                                                    <option value="Đang xử lý" {{ $order->status == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                                    <option value="Đang giao hàng" {{ $order->status == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                                                    <option value="Đã giao hàng" {{ $order->status == 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="submit" class="btn btn-primary">Cập nhật Trạng thái</button>
                                                @if ($order->status == 'Chờ xử lý')
                                                    <a href="{{ route('admin-orders.approve', $order->id) }}" class="btn btn-success">Duyệt Đơn Hàng</a>
                                                @endif
                                                <a class="btn btn-success" href="{{ route('admin-orders.generatePDF', $order->id) }}">
                                                    <i class="fa fa-file-pdf"></i> Tải PDF
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">

                                        <h4 class="sherah-contact-card__title">Thông tin khách hàng</h4>
                                        <div class="sherah-vcard__body">
                                            {{-- <div class="sherah-vcard__img">
                                                <img src="img/vendor-4.png" alt="#">
                                            </div> --}}
                                            <div class="sherah-vcard__content">

                                                <h4 class="sherah-vcard__title">{{ $order->user->name }}</h4>
                                                <ul class="sherah-vcard__contact">
                                                    <li>
                                                        {{ $order->user->phone_number }}
                                                    </li>
                                                    <li>
                                                        {{ $order->user->email }}
                                                    </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                                        <h4 class="sherah-contact-card__title">Địa chỉ giao hàng</h4>
                                        <div class="sherah-vcard__body">
                                            <div class="sherah-vcard__content">
                                                <ul class="sherah-vcard__contact">
                                                    <li>
                                                        {{$order->name}}
                                                    </li>
                                                    <li>
                                                        {{ $order->address }}
                                                    <li>
                                                        {{ $order->phone_number }}
                                                    </li>
                                            </div>
                                        </div>
                                        <!-- End Dashboard Inner -->
                                    </div>

                                </div>




            </div>
        </div>
    </section>
@endsection
