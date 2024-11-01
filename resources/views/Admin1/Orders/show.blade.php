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
                                        <h2 class="sherah-breadcrumb__title">Chi tiết đơn hàng</h2>
                                        
                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <div class="sherah-table__head sherah-table__main">
                                    <h4 class="sherah-order-title">Items from Order #{{ $order->id }}</h4>
                                    <div class="sherah-order-right">
                                        <p class="sherah-order-text">{{ $order->created_at->format('F j, Y') }} at {{ $order->created_at->format('h:i A') }} / {{ $order->products->count() }} items / Tổng cộng {{ number_format($order->total) }} VNĐ
                                        </p>
                                        <div class="sherah-table-status">
                                            <div class="sherah-table__status sherah-color2 sherah-color2__bg--opacity">{{ $order->payment_status }}</div>
                                            <div class="sherah-table__status sherah-color3 sherah-color3__bg--opacity">{{ $order->status }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 mg-top-30">
                                        <div class="sherah-table-order">
    <h4 style="font-size: 1.5rem;">Chi Tiết Đơn Hàng</h4>
    <br>
    <hr>
    <br>
    <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
        <thead class="sherah-table__head">
            <tr>
                <th class="sherah-table__column-1 sherah-table__h1">Hình Ảnh</th>
                <th class="sherah-table__column-2 sherah-table__h2">Tên Sản Phẩm</th>
                <th class="sherah-table__column-3 sherah-table__h3">Giá</th>
                <th class="sherah-table__column-4 sherah-table__h4">Số Lượng</th>
            </tr>
        </thead>
        <tbody class="sherah-table__body">
            @foreach ($order->products as $product)
                <tr>
                    <td class="sherah-table__column-1 sherah-table__data-1">
                        <div class="sherah-table__product--thumb">
                            <div class="product-carousel">
                                <div id="productCarousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $key => $image)
                                            <div class="carousel-item @if ($key === 0) active @endif">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    class="d-block w-100" alt="Product Image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="sherah-table__column-2 sherah-table__data-2">
                        <div class="sherah-table__product-name">
                            <h4 class="sherah-table__product-name--title">{{ $product->name }}</h4>
                        </div>
                    </td>
                    <td class="sherah-table__column-3 sherah-table__data-3">
                        <div class="sherah-table__product-content">
                            <p class="sherah-table__product-desc">{{ number_format($product->price) }} VNĐ</p>
                        </div>
                    </td>
                    <td class="sherah-table__column-4 sherah-table__data-4">
                        <div class="sherah-table__product-content">
                            <p class="sherah-table__product-desc">{{ $product->pivot->quantity }}</p>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="order-totals">
        <ul class="order-totals__list">
            <li class="order-totals__list--sub"><span>Tổng cộng:</span> <span
                    class="order-totals__amount">{{ number_format($order->total) }} VNĐ</span></li>
        </ul>
    </div>
    <form action="{{ route('admin-ordersdangvanchuyen.update', $order->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Cập nhật Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Chờ xử lý" {{ $order->status == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="Đã xử lý" {{ $order->status == 'Đã xử lý' ? 'selected' : '' }}>Đã xử lý</option>
                <option value="Đã giao hàng" {{ $order->status == 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                <option value="Đã nhận hàng" {{ $order->status == 'Đã nhận hàng' ? 'selected' : '' }}>Đã nhận hàng</option>
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
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                                        <h4 class="sherah-contact-card__title">Thông tin khách hàng</h4>
                                        <div class="sherah-vcard__body">
                                            <div class="sherah-vcard__img">
                                                <img src="img/vendor-4.png" alt="#">
                                            </div>
                                            <div class="sherah-vcard__content">
                                                <h4 class="sherah-vcard__title">{{ $order->name }}</h4>
                                                <ul class="sherah-vcard__contact">
                                                    <li>
                                                        <a href="tel:{{ $order->phone }}">
                                                            <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                            </svg> {{ $order->phone }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="mailto:{{ $order->email }}">
                                                            <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.98" height="14.033" viewBox="0 0 13.98 14.033">
                                                                <g id="Group_131" data-name="Group 131" transform="translate(-219.859 -62.544)">
                                                                    <path id="Path_472" data-name="Path 472" d="M271.363,95.475h3.71c.626,0,.7.079.7.716,0,1.447,0,2.894,0,4.342a.459.459,0,0,1-.2.413c-.844.645-1.677,1.3-2.522,1.948a.71.71,0,0,1-.393.137q-1.291.018-2.583,0a.664.664,0,0,1-.371-.122q-1.289-.983-2.558-1.991a.523.523,0,0,1-.172-.359c-.012-1.493-.008-2.986-.007-4.479,0-.486.116-.6.594-.605Zm.637,5.474a3.893,3.893,0,0,0,.7.341,1.257,1.257,0,0,0,1.345-.694,2.636,2.636,0,0,0,.269-1.913,3.02,3.02,0,1,0-3.112,3.8c.349.016.57-.177.522-.467-.044-.264-.23-.339-.476-.359a2.2,2.2,0,0,1-1.7-3.381,2.155,2.155,0,0,1,2.948-.685.478.478,0,0,0-.623.271,1.437,1.437,0,0,0-1.921.8A2.33,2.33,0,0,0,269.8,99.7,1.44,1.44,0,0,0,272,100.949Z" transform="translate(-44.527 -31.12)"></path>
                                                                </g>
                                                            </svg> {{ $order->email }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                                        <h4 class="sherah-contact-card__title">Địa chỉ giao hàng</h4>
                                        <div class="sherah-vcard__body">
                                            <div class="sherah-vcard__content">
                                                <ul class="sherah-vcard__contact">
                                                    <li><strong>ID Đơn Hàng:</strong> <span class="badge bg-secondary">{{ $order->id }}</span></li>
                                                    <li><strong>Địa chỉ:</strong> <span>{{ $order->address }}</span></li>
                                                    <li><strong>Trạng thái:</strong> <span>{{ $order->status }}</span></li>
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
