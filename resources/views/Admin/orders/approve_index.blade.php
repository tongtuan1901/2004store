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
                                    <!-- Breadcrumb -->
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Danh sách đơn hàng cần xử lý</h2>
                                    </div>
                                </div>
                            </div><form action="{{  route('admin-orders.approve.index')}}" method="GET">
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
                            
                                 
                            
                                    <!-- Nút tìm kiếm và reset -->
                                    <div class="col-md-3 d-flex">
                                        <button type="submit" class="btn btn-primary btn-sm mr-2">Tìm kiếm</button>
                                        <a href="{{  route('admin-orders.approve.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                                    </div>
                                </div>
                            </form>

                            <!-- Table -->
                            <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    
                                    <!-- Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                            <th class="sherah-table__column-1">ID</th>
                                            <th class="sherah-table__column-1">Mã đơn</th>
                                            <th class="sherah-table__column-2">Tên khách hàng</th>
                                            <th class="sherah-table__column-3">Email</th>
                                            <th class="sherah-table__column-3">Số điện thoại</th>
                                            <th class="sherah-table__column-5">Trang thái đơn hàng</th>
                                            <th class="sherah-table__column-4">Sản phẩm</th>
                                            <th class="sherah-table__column-4">Giá trị đơn</th>
                                            <th class="sherah-table__column-4">Ngày đặt</th>
                                            <th class="sherah-table__column-5">thao thác</th>
                                        </tr>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody class="sherah-table__body">
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="sherah-table__column-1">{{ $order->id }}</td>
                                                <td class="sherah-table__column-1">{{ $order->order_code }}</td>
                                                <td class="sherah-table__column-2">{{ $order->name }}</td>
                                                <td class="sherah-table__column-3">{{ $order->email }}</td>
                                                <td class="sherah-table__column-3">{{ $order->phone_number }}</td>
                                                <td class="sherah-table__column-4">
                                                    <div
                                                        class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">
                                                        {{ $order->status }}
                                                    </div>
                                                </td>

                                                <!-- Cột Sản phẩm -->
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
                                                <td class="sherah-table__column-6">
                                                    <div class="sherah-table__status__group">
                                                        <a href="{{ route('admin-orders.approve', $order->id) }}"
                                                            class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon-check">
                                                        <polyline points="20 6 9 17 4 12"> </polyline>
                                                    </svg>

                                                        </a>
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
                                                        <form action="{{ route('admin-orders.destroy', $order->id) }}"
                                                            method="post" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="sherah-table__action sherah-color2"
                                                                style="border: none; background: none;"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                                                                <svg class="sherah-color2__fill"
                                                                    xmlns="http://www.w3.org/2000/svg" width="16.247"
                                                                    height="18.252" viewBox="0 0 16.247 18.252">
                                                                    <g id="Icon"
                                                                        transform="translate(-160.007 -18.718)">
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
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
