@extends('Client.layouts.paginate.master')

@section('contentClient')
<h2 style="text-align: center">Danh sách đơn hàng</h2>

@php
    $hasOrders = $userOrder->contains(function($user) {
        return $user->orders->isNotEmpty();
    });
    $orderIndex = 1;
@endphp

@if (!$hasOrders)
    <p class="no-orders-message">Bạn chưa có đơn hàng nào</p>
@else
    <table class="styled-table">
        <thead>
            <tr>
                <th class="stt-column">STT</th> <!-- Add a class to the STT column -->
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
                        @php
                            $orderItems = $order->orderItems; // Lấy danh sách các item trong đơn hàng
                            $productDetails = [];
                        @endphp
                        @foreach ($orderItems as $item)
                            @if ($item->variation) <!-- Kiểm tra nếu variation tồn tại -->
                                @php
                                    $productDetails[] = [
                                        'name' => $item->product->name ?? 'Product Name N/A',
                                        'size' => $item->variation->size->size ?? 'N/A',
                                        'color' => $item->variation->color->color ?? 'N/A',
                                        'quantity' => $item->quantity
                                    ];
                                @endphp
                            @endif
                        @endforeach
                        <tr>
                        <td class="stt-column">{{ $orderIndex++ }}</td> <!-- Apply class to this cell -->
                            <td>{{ $user->name }}</td>
                            <td>{{ $order->name }}</td>
                            <td class="img-cell">
                                @if ($item->variation->image) <!-- Kiểm tra nếu có ảnh -->
                                    <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-small">
                                @else
                                    <span>No image</span>
                                @endif
                            </td>
                            <td class="truncate">
                                @foreach ($productDetails as $product)
                                    <div>
                                        {{ $product['name'] }}<br>
                                        Kích thước: {{ $product['size'] }}, Màu sắc: {{ $product['color'] }}<br>
                                        Số lượng: {{ $product['quantity'] }}<br><br>
                                    </div>
                                @endforeach
                            </td>
                            <td class="truncate">
                                <!-- Hiển thị trạng thái đơn hàng -->
                                {{ $order->status }}
                            </td>
                            <td class="truncate">{{ $order->phone }} - {{ $order->address }}</td>
                            <td>
                                <!-- Form for canceling the order -->
                                @if ($order->status != 'Hủy') <!-- Chỉ hiển thị nút hủy khi trạng thái chưa phải là "Hủy" -->
                                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="cancel-order-form">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn-cancel">Hủy đơn</button>
                                    </form>
                                @else
                                    
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    
                @endif
            @endforeach
        </tbody>
    </table>
@endif

<!-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif -->

<style>
    /* Style cho bảng và nút hủy */
    .no-orders-message {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        color: #888;
        margin-top: 20px;
    }

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

    .btn-cancel {
        padding: 6px 12px;
        font-size: 12px;
        color: #fff;
        background-color: #f44336;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-cancel:hover {
        background-color: #d32f2f;
    }

    .alert-success {
        text-align: center;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        margin-top: 20px;
    }

    /* Custom style to make STT column smaller */
    .stt-column {
        width: 40px; /* Adjust the width to make it smaller */
    }
</style>

@endsection
