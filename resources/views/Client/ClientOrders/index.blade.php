@extends('Client.layouts.paginate.master')
@section('contentClient')
<h2 style="text-align: center">Danh sách đơn hàng</h2>

@php
    $hasOrders = $userOrder->contains(function($user) {
        return $user->orders->isNotEmpty();
    });
@endphp

@if (!$hasOrders)
    <p class="no-orders-message">Bạn chưa có đơn hàng nào</p>
@else
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
            @foreach ($userOrder as $user)
                @if ($user->orders->isNotEmpty())
                    @foreach ($user->orders as $order)
                        @foreach ($order->products as $product)
                            @foreach ($product->variations as $variation)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td class="img-cell">
                                        @if ($variation->image)
                                            <img src="{{ asset('storage/' . $variation->image->image_path) }}" alt="Variation Image" class="img-small">
                                        @else
                                            <span>No image</span>
                                        @endif
                                    </td>
                                    <td class="truncate">
                                        {{ $product->name }}
                                        <br>
                                        Kích thước: {{ $variation->size->size ?? 'N/A' }},
                                        Màu sắc: {{ $variation->color->color ?? 'N/A' }}
                                        <br>
                                        Số lượng {{ $product->pivot->quantity }}
                                    </td>
                                    <td class="truncate">{{ $order->status }}</td>
                                    
                                    <td class="truncate">{{ $order->phone }} - {{ $order->address }}</td>
                                        <td>
                                                <button>Hủy đơn</button>
                                        </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" class="no-orders-cell">Không có đơn hàng</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
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
