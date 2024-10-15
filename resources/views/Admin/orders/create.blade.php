@extends('Admin/layouts/master/master')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Tạo Đơn Hàng Mới</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin-orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Chờ xử lý">Chờ xử lý</option>
                            <option value="Đã xử lý">Đã xử lý</option>
                            <option value="Đã giao hàng">Đã giao hàng</option>
                            <option value="Đã nhận hàng">Đã nhận hàng</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="products" class="form-label">Sản phẩm</label>
                        <select class="form-control" id="products" name="products[]" multiple required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} -
                                    {{ number_format($product->price, 2) }} VND</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantities" class="form-label">Số lượng sản phẩm</label>
                        <input type="number" class="form-control" id="quantities" name="quantities[]" required>
                    </div>
                    <button type="submit" class="btn btn-success">Tạo đơn hàng</button>
                </form>
            </div>
        </div>
    </div>
@endsection
