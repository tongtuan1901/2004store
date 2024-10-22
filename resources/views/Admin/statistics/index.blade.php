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
    </div>
</div>
@endsection

@extends('Admin/layouts/master/footer')
