@extends('admin.layouts.master')

@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-3xl font-medium">Danh Sách Yêu Cầu Nạp Tiền</h1>

                <!-- Form tìm kiếm -->
                <form action="{{ route('admin.transfer-requests.index') }}" method="GET" class="flex items-center">

                    <input type="text" name="search" placeholder="Tìm theo nội dung chuyển khoản" class="sherah-input"
                        value="{{ request()->query('search') }}">

                    <!-- Chọn khoảng thời gian -->

                    <input type="date" name="start_date" class="sherah-input"
                        value="{{ request()->query('start_date') }}">
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
                                <th class="sherah-table__column-1 sherah-table__h1">STT</th>
                                <th class="sherah-table__column-2 sherah-table__h2">Tên Khách Hàng</th>
                                <th class="sherah-table__column-3 sherah-table__h3">Số Tiền Nạp</th>
                                <th class="sherah-table__column-4 sherah-table__h4">Nội Dung Chuyển Khoản</th>
                                <th class="sherah-table__column-5 sherah-table__h5">Thời Gian Yêu Cầu</th>
                                <th class="sherah-table__column-6 sherah-table__h6">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody class="sherah-table__body">
                            @foreach ($transferRequests as $request)
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
                                            <form action="{{ route('admin.transfer-requests.approve', $request->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>

                                                </button>
                                            </form>
                                            <!-- Từ chối -->

                                            <form action="{{ route('admin.transfer-requests.reject', $request->id) }}"
                                                method="post" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="sherah-table__action sherah-color2"
                                                    style="border: none; background: none;"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
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
