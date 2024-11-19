@extends('admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="flex justify-between items-center py-4">
            <h1 class="text-3xl font-medium">Danh Sách Yêu Cầu Nạp Tiền</h1>
            
            <!-- Form tìm kiếm -->
            <form action="{{ route('admin.transfer-requests.index') }}" method="GET" class="flex items-center">
               
                <input type="text" name="search" placeholder="Tìm theo nội dung chuyển khoản" class="sherah-input" value="{{ request()->query('search') }}">
                
                <!-- Chọn khoảng thời gian -->

                <input type="date" name="start_date" class="sherah-input" value="{{ request()->query('start_date') }}">
                <span>Đến</span>
                <input type="date" name="end_date" class="sherah-input" value="{{ request()->query('end_date') }}">

                <button type="submit" class="sherah-btn sherah-btn--primary">Tìm kiếm</button>
            </form>
        </div>

        <!-- Bảng danh sách yêu cầu nạp tiền -->
        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
            <div class="sherah-table p-0">
                <table class="sherah-table__main sherah-table__main-v3" id="sherah-table__vendor">
                    <thead class="sherah-table__head">
                        <tr>
                            <th class="sherah-table__column-1 sherah-table__h1">ID</th>
                            <th class="sherah-table__column-2 sherah-table__h2">Tên Khách Hàng</th>
                            <th class="sherah-table__column-3 sherah-table__h3">Số Tiền Nạp</th>
                            <th class="sherah-table__column-4 sherah-table__h4">Nội Dung Chuyển Khoản</th>
                            <th class="sherah-table__column-5 sherah-table__h5">Thời Gian Yêu Cầu</th>
                            <th class="sherah-table__column-6 sherah-table__h6">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody class="sherah-table__body">
                        @foreach($transferRequests as $request)
                        <tr>
                            <td class="sherah-table__column-1 sherah-table__data-1">
                                <div class="sherah-table__product">
                                    {{ $request->id }}
                                </div>
                            </td>
                            <td class="sherah-table__column-2 sherah-table__data-2">
                                <div class="sherah-table__vendor">
                                    <h4 class="sherah-table__vendor--title">{{ $request->customer_name }}</h4>
                                </div>
                            </td>
                            <td class="sherah-table__column-3 sherah-table__data-3">
                                <div class="sherah-table__product-content">
                                    {{ number_format($request->amount, 0, ',', '.') }} VND
                                </div>
                            </td>
                            <td class="sherah-table__column-4 sherah-table__data-4">
                                <div class="sherah-table__product-content">
                                    {{ $request->transfer_content }}
                                </div>
                            </td>
                            <td class="sherah-table__column-5 sherah-table__data-5">
                                <div class="sherah-table__product-content">
                                    {{ $request->transfer_time }}
                                </div>
                            </td>
                            <td class="sherah-table__column-6 sherah-table__data-6">
                                <div class="sherah-table__status__group">
                                    <!-- Duyệt -->
                                    <form action="{{ route('admin.transfer-requests.approve', $request->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
                                            Duyệt
                                        </button>
                                    </form>
                                    <!-- Từ chối -->
                                    <form action="{{ route('admin.transfer-requests.reject', $request->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="sherah-table__action sherah-color2">
                                            Từ chối
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
