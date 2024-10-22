@extends('Admin/layouts/master/master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Chỉnh sửa Đơn Hàng</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin-orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $order->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $order->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $order->address }}" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Tổng cộng</label>
                    <input type="number" class="form-control" id="total" name="total" value="{{ $order->total }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Chờ xử lý" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                        <option value="Đã xử lý" {{ $order->status == 'processed' ? 'selected' : '' }}>Đã xử lý</option>
                        <option value="Đã giao hàng" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đã giao hàng</option>
                        <option value="Đã nhận hàng" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã nhận hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="products" class="form-label">Sản phẩm</label>
                    <select class="form-control" id="products" name="products[]" multiple required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $product->name }} - {{ number_format($product->price, 2) }} VND
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantities" class="form-label">Số lượng sản phẩm</label>
                    @foreach($order->products as $product)
                        <input type="number" class="form-control mb-2" id="quantities" name="quantities[]" value="{{ $product->pivot->quantity }}" required>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success">Cập nhật đơn hàng</button>
            </form>
        </div>
    </div>
</div>
@endsection

