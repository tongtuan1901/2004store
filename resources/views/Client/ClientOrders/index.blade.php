@extends('Client.layouts.paginate.master')
@section('contentClient')
<h2 style="text-align: center">Danh sách đơn hàng</h2>

@if ($userOrder && $userOrder->orders->isNotEmpty())
    <table class="styled-table">
        <thead>
            <tr>
                <th>Tài khoản</th>
                <th>Người nhận</th>
                <th>Hình ảnh</th>
                <th>Sản phẩm</th>
                <th>Trạng thái</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userOrder->orders as $order)
                <tr>
                    <td>{{ $userOrder->name }} </td> <!-- Tài khoản -->
                    <td>{{ $order->name }}</td> <!-- Người nhận -->

                   {{-- <<td>
                    @foreach ($order->orderItems as $item)
                    <div class="order-item">
                        @if ($item->variation)
                            <!-- Hình ảnh sản phẩm -->
                            @if ($item->variation->image)
                                <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" 
                                     alt="{{ $item->product->name }}" 
                                     style="width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('images/default-image.png') }}" 
                                     alt="Hình ảnh không có" 
                                     style="width: 100px; height: auto;">
                            @endif
                            @endforeach
                </td> --}}

              
                    @foreach ($order->orderItems as $item)
                    <td>@if ($item->variation->image)
                        <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" 
                             alt="{{ $item->product->name }}" 
                             style="width: 100px; height: auto;">
                    @else
                        <img src="{{ asset('images/default-image.png') }}" 
                             alt="Hình ảnh không có" 
                             style="width: 100px; height: auto;">
                    @endif</td>
                  <td>    {{ $item->product->name }}</td>
                    @endforeach
                

                    <td>{{ $order->status }}</td> <!-- Trạng thái -->
                    <td>{{ $order->address }}</td> <!-- Địa chỉ -->
                    <td>
                        <!-- Nút Hủy Đơn Hàng -->
                        @if ($order->status !== 'canceled') <!-- Kiểm tra nếu đơn hàng chưa bị hủy -->
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hủy Đơn Hàng</button>
                            </form>
                        @else
                            <span>Đơn hàng đã bị hủy</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="no-orders-message">Bạn chưa có đơn hàng nào</p>
@endif


<style>
    /* Thông báo nếu không có đơn hàng */
    .no-orders-message {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        color: #888;
        margin-top: 20px;
    }

    /* Bảng đẹp, gọn nhẹ, bo góc */
    .styled-table {
        width: 75%;
        max-width: 800px;
        margin: 0 auto 20px;
        font-size: 12px;
        border-collapse: collapse;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .styled-table th, .styled-table td {
        padding: 8px 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .styled-table th {
        background: #4CAF50;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
    }

    .styled-table tbody tr:hover {
        background-color: #e8f5e9;
    }

    .img-cell img.img-small {
        width: 50px;
        height: auto;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .truncate {
        max-width: 80px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #333;
    }

    .truncate:hover {
        overflow: visible;
        white-space: normal;
    }

    .no-orders-cell {
        text-align: center;
        font-size: 12px;
        color: #999;
        font-style: italic;
    }

    button {
        padding: 6px 12px;
        font-size: 12px;
        color: #fff;
        background-color: #f44336;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #d32f2f;
    }
</style>

@endsection
