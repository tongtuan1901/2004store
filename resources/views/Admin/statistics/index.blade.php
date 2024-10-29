@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-semibold mb-4">Thống kê</h1>

    <form method="GET" action="{{ route('admin.statistics') }}" class="mb-4">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label for="date" class="mr-2">Chọn ngày:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $date }}">
            </div>

            <div class="col-auto">
                <label for="month" class="mx-2">Chọn tháng:</label>
                <select name="month" id="month" class="form-control">
                    <option value="">Tất cả</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>
                            Tháng {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-4">Lọc</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Sản phẩm thêm hôm nay</h5>
                    <p class="card-text h2">{{ $totalProductsAddedToday }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng bán hôm nay</h5>
                    <p class="card-text h2">{{ $totalOrdersToday }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Khách hàng đăng ký hôm nay</h5>
                    <p class="card-text h2">{{ $totalUsersRegisteredToday }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu hôm nay</h5>
                    <p class="card-text h2">{{ number_format($totalRevenueToday, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-xl mt-4">Doanh thu theo ngày trong tháng {{ $month }}</h2>
    <canvas id="revenueChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueData = {!! json_encode($revenueData) !!};

        console.log(revenueData); // Kiểm tra dữ liệu

        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({ length: revenueData.length }, (_, i) => i + 1),
                datasets: [{
                    label: 'Doanh thu',
                    data: revenueData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection

@extends('Admin/layouts/master/footer')
