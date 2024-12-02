
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
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Tìm kiếm đơn hàng..." value="{{ request('search') }}">
                                </div>
                        
                                <!-- Lọc theo trạng thái -->
                                <div class="col-md-4">
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="">-- Lọc theo trạng thái --</option>
                                        <option value="Chờ xử lý" {{ request('status') == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                                        <option value="Đang xử lý" {{ request('status') == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                        <option value="Đang giao hàng" {{ request('status') == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                                        <option value="Hoàn thành" {{ request('status') == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                    </select>
                                </div>
                        
                                <!-- Nút tìm kiếm và reset -->
                                <div class="col-md-4 d-flex">
                                    <button type="submit" class="btn btn-primary btn-sm mr-2">Tìm kiếm</button>
                                    <a href="{{ route('admin-orders.index') }}" class="btn btn-secondary btn-sm">Reset</a>
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
                                <!-- Table Head -->
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Người gửi</th>
                                        <th>Người nhận</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Sản phẩm</th>
                                        <th>Biến thể</th>
                                        <th>Số lượng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body">
                                    @foreach ($orders as $order) <!-- Lặp qua từng đơn hàng -->
                                        <tr>
                                            <td>
                                                <a href="#" class="sherah-color1">#{{ $order->id }}</a>
                                            </td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>
                                                <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">
                                                    {{ $order->status }}
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($order->orderItems as $item)
                                                    <div>
                                                        {{ $item->product->name ?? 'N/A' }} 
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($order->orderItems as $item)
                                                    <div>
                                                        {{ $item->variation->size->size ?? 'N/A' }}, 
                                                        {{ $item->variation->color->color ?? 'N/A' }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($order->orderItems as $item)
                                                    <div>
                                                       {{ $item->quantity ?? 'N/A' }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="sherah-table__status__group">
                                                    <a href="{{ route('admin-orders.show', $order) }}" class="sherah-table__action sherah-color2 sherah-color2__bg--offset">Chi tiết</a>
                                                    @if ($order->status === 'Chờ xử lý')
                                                        <a href="{{ route('admin-orders.approve', $order->id) }}" class="sherah-table__action sherah-color1 sherah-color1__bg--opactity">Duyệt</a>
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
