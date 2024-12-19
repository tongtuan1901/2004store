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
                                    <h2 class="sherah-breadcrumb__title">Danh sách đơn hàng</h2>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin-orders.index') }}" method="GET">
                            <div class="row align-items-center">
                                <!-- Tìm kiếm đơn hàng -->
                                <div class="col-md-3">
                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control form-control-sm"
                                        placeholder="Tìm kiếm đơn hàng..."
                                        value="{{ request('search') }}">
                                </div>

                                <!-- Lọc theo mã đơn hàng -->
                                <div class="col-md-3">
                                    <input
                                        type="text"
                                        name="order_code"
                                        class="form-control form-control-sm"
                                        placeholder="Lọc theo mã đơn hàng..."
                                        value="{{ request('order_code') }}">
                                </div>

                                <!-- Lọc theo trạng thái -->
                                <div class="col-md-3">
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="">-- Lọc theo trạng thái --</option>
                                        <option value="Chờ xử lý" {{ request('status') == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                                        <option value="Đang xử lý" {{ request('status') == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                        <option value="Đang giao hàng" {{ request('status') == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                                        <option value="Hoàn thành" {{ request('status') == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                    </select>
                                </div>

                                <!-- Nút tìm kiếm và reset -->
                                <div class="col-md-3 d-flex">
                                    <button type="submit" class="sherah-btn sherah-gbcolor">Tìm kiếm</button>
                                 <a href="{{ route('admin-orders.index') }}" class="sherah-btn sherah-gbcolor" style="background-color: gray">Reset</a>
                                </div>
                            </div>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                            <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th>Stt</th>
                                        <th>Mã đơn</th>
                                        <th>Người nhận</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá trị đơn</th>
                                        <th>Ngày đặt</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body">
                                    @foreach ($orders as $order) <!-- Lặp qua từng đơn hàng -->
                                        <tr>
                                            <td>
                                                <a href="#" class="sherah-color1">#{{ $order->id }}</a>
                                            </td>
                                            <td>{{$order->order_code}}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>
                                                <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">
                                                    {{ $order->status }}
                                                </div>
                                            </td>

                                            <td>
                                                @foreach ($order->orderItems as $item)
                                                    <div style="margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                                                        {{-- Hiển thị hình ảnh sản phẩm --}}
                                                        @if ($item->variation)
                                                            @if ($item->variation->image)
                                                                <img src="{{ asset('storage/' . $item->variation->image->image_path) }}"
                                                                     alt="Variation Image"
                                                                     class="img-fluid rounded mb-1"
                                                                     style="max-width: 100px; height: auto; display: block; margin-top: 5px;">
                                                            @else
                                                                <p class="text-muted">Không có hình ảnh</p>
                                                            @endif
                                                        @else
                                                            <p class="text-muted">Không có thông tin biến thể</p>
                                                        @endif
                                                        {{-- Hiển thị tên sản phẩm --}}
                                                        <strong>{{ $item->product_name ?? 'N/A' }}</strong>
                                                        <br>
                                                        <small>Kích thước: {{ $item->variation->size->size ?? 'Không rõ' }}</small>,
                                                        <small>Màu sắc: {{ $item->variation->color->color ?? 'Không rõ' }}</small>
                                                        <br>
                                                        <small>Số lượng: {{ $item->quantity ?? 1 }}</small>
                                                    </div>
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ number_format($order->total - $order->discount_value)}} VNĐ
                                            </td>
                                            <td>
                                                {{$order->created_at}}
                                            </td>
                                            <td>
                                                <div class="sherah-table__status__group">
                                                    <a href="{{ route('admin-orders.show', $order->id) }}"
                                                        class="sherah-table__action sherah-color2 sherah-color2__bg--offset">
                                                        <svg class="sherah-color2__fill"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="18" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 2a10 10 0 0 1 10 10c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0-2C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm-.5 17h-1v-1h1v1zm1-12h-2v6h2V5z"
                                                                fill="#09ad95" />
                                                        </svg>
                                                    </a>
                                                    @if ($order->status === 'Chờ xử lý')
                                                        <a href="{{ route('admin-orders.approve', $order->id) }}" class="sherah-table__action sherah-color1 sherah-color1__bg--opactity">      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon-check">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
