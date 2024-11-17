@extends('Client.layouts.paginate.master')

@section('contentClient')

<h2 class="text-center mb-4">Danh sách đơn hàng</h2>

@php
    $hasOrders = $userOrder && $userOrder->orders->isNotEmpty(); // Check if the user has orders
    $orderIndex = 1;
@endphp

@if (!$hasOrders)
    <p class="alert alert-info text-center">Bạn chưa có đơn hàng nào</p>
@else
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-sm rounded">
            <thead class="table-light">
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tài khoản</th>
                    <th class="text-center">Hình ảnh</th>
                    <th>Sản phẩm</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userOrder->orders as $order)
                    @php
                        $orderItems = $order->orderItems;
                        $productDetails = [];
                    @endphp
                    @foreach ($orderItems as $item)
                        @if ($item->variation)
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
                        <td class="text-center">{{ $orderIndex++ }}</td>
                        <td>{{ $order->name }}</td>
                        <td class="text-center">
                            @if ($order->orderItems->first()->variation && $order->orderItems->first()->variation->image)
                                <img src="{{ asset('storage/' . $order->orderItems->first()->variation->image->image_path) }}" alt="Variation Image" class="img-fluid rounded" style="max-width: 60px;">
                            @else
                                <span class="text-muted">Không có hình ảnh</span>
                            @endif
                        </td>
                        <td class="truncate">
                            @foreach ($productDetails as $product)
                                <div>
                                    <strong>{{ $product['name'] }}</strong><br>
                                    Kích thước: {{ $product['size'] }}, Màu sắc: {{ $product['color'] }}<br>
                                    Số lượng: {{ $product['quantity'] }}<br><br>
                                </div>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <span class="badge badge-{{ $order->status == 'Hoàn thành' ? 'success' : ($order->status == 'Hủy' ? 'danger' : 'warning') }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if ($order->status != 'Hủy')
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="cancel-order-form">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm rounded">Hủy đơn</button>
                                </form>
                            @endif
                            <a href="{{ route('client.orders.show', ['userId' => $userOrder->id, 'orderId' => $order->id]) }}" class="btn btn-primary btn-sm rounded">
                                Xem chi tiết
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection