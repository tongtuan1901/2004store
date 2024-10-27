@extends('Admin/layouts/master/master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{-- tổng tiền hàng tháng --}}
                                Doanh thu tháng này</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($total, 0, ',', '.') }} VND
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Doanh thu tháng trước</div>
                            {{-- tổng tiền hàng năm --}}
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($doanhThuThangTruoc, 0, ',', '.') }} VND</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số lượng sản phẩm bán tháng này</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $quantity }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Doanh thu ngày hôm nay</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($doanhThuNgayHomNay, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số lượng sản phẩm bán ra hôm nay</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soLuongBanHomNay }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {{$das}} --}}

    <div class="container overflow-hidden text-center">
        <div class="row gy-5">
            <div class="col-6">
                <div class="p-3 border bg-light">
                    <div class="container">
                        <h3>Top 5 sản phẩm bán chạy tháng này</h3>
                        <canvas id="topProductsChart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('topProductsChart').getContext('2d');
                        const topProductsChart = new Chart(ctx, {
                            type: 'bar', // Loại biểu đồ: cột
                            data: {
                                labels: @json($labelstop5Products), // Dữ liệu nhãn
                                datasets: [{
                                    label: 'Số lượng bán ra',
                                    data: @json($datatop5Products), // Dữ liệu số lượng
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            precision: 0
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Top 5 sản phẩm bán chạy trong tháng này'
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 border bg-light">
                    <div class="container">
                        <h3>Tỷ lệ đặt hàng(%)</h3>
                        <canvas id="myChart" style="width:100%;max-width:350px"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const xValues = ["Thành công", "Thất bại"];
                        const yValues = [
                            {{ $datHangThanhCong }},
                            {{ $datHangThatBai }}
                        ];
                        const barColors = ["green", "red"];
                        new Chart("myChart", {
                            type: "pie",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {

                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 border bg-light">
                    <div class="container">
                        <h5>Biểu đồ so sánh số đơn hàng tháng này với tháng trước</h5>
                        <canvas id="salesChart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctxt = document.getElementById('salesChart').getContext('2d');
                        const salesChart = new Chart(ctxt, {
                            type: 'bar', // Loại biểu đồ: cột
                            data: {
                                labels: @json($labelsDonHangThang), // Dữ liệu nhãn
                                datasets: [{
                                    label: 'Số lượng bán ra',
                                    data: @json($dataDonHangThang), // Dữ liệu số lượng
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,
                                            precision: 0
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'So sánh số lượng bán ra tháng này với tháng trước'
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 border bg-light">
                    <h5>Top 5 Khách Hàng Mua Hàng Nhiều Nhất</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Top</th>
                                <th>Tên Khách Hàng</th>
                                <th>Tổng Chi Tiêu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topKH as $k => $KH)
                                <tr>
                                    <td>
                                        @if ($k == 0)
                                            <span style="color: red;">{{ $k + 1 }}</span>
                                        @elseif ($k == 1)
                                            <span style="color: yellow;">{{ $k + 1 }}</span>
                                        @elseif ($k == 2)
                                            <span style="color: green;">{{ $k + 1 }}</span>
                                        @else
                                            {{ $k + 1 }}
                                        @endif
                                    </td>
                                    <td>{{ $KH->name }}</td>
                                    <td>{{ number_format($KH->total_spent, 2) }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dashboard = {!! $das !!};
    </script>
@endsection
