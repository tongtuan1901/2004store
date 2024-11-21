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
                        </div>

                        <!-- Table -->
                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                            <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                <!-- Table Head -->
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1">ID</th>
                                        <th class="sherah-table__column-2">Tên khách hàng</th>
                                        <th class="sherah-table__column-3">Email</th>
                                        <th class="sherah-table__column-5">Trang thái đơn hàng</th>
                                        <th class="sherah-table__column-4">Sản phẩm</th>
                                        <th class="sherah-table__column-4">Biến thể</th>
                                        <th class="sherah-table__column-5">thao thác</th>
                                    </tr>
                                </thead>

                                <!-- Table Body -->
                                <tbody class="sherah-table__body">
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td class="sherah-table__column-1">{{ $order->id }}</td>
                                        <td class="sherah-table__column-2">{{ $order->name }}</td>
                                        <td class="sherah-table__column-3">{{ $order->email }}</td>
                                        <td class="sherah-table__column-4">
                                            <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">
                                                {{ $order->status }}
                                            </div>
                                        </td>
                                
                                        <!-- Cột Sản phẩm -->
                                        <td class="sherah-table__column-4">
                                            @foreach ($order->orderItems as $item)
                                                {{ $item->product->name }}
                                                <br>
                                                <hr>
                                            @endforeach
                                        </td>
                                
                                        <!-- Cột Biến thể -->
                                        <td class="sherah-table__column-5">
                                            @foreach ($order->orderItems as $item)
                                            @if ($item->variation)
                                            <div>
                                                Kích thước: {{ $item->variation->size->size ?? 'N/A' }}, 
                                                Màu sắc: {{ $item->variation->color->color ?? 'N/A' }}
                                            </div>
                                            @else
                                                <div>Không có biến thể</div>
                                            @endif
                                                <hr> <!-- Để phân tách các sản phẩm -->
                                            @endforeach
                                        </td>
                                
                                        <td class="sherah-table__column-6">
                                            <div class="sherah-table__status__group">
                                                <a href="{{ route('admin-orders.approve', $order->id) }}" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">Duyệt</a>
                                                <a href="{{ route('admin-orders.show', $order->id) }}" class="sherah-table__action sherah-color2 sherah-color2__bg--offset">Chi tiết</a>
                                                <form action="{{ route('admin-orders.destroy', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="sherah-table__action sherah-color2 sherah-color2__bg--offset">Xóa</button>
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
