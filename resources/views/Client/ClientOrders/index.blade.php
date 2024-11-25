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
                        @if ($order->orderItems->isNotEmpty() && $order->orderItems->first()->variation && $order->orderItems->first()->variation->image)
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
                        <style>
                            .modal {
                                z-index: 1050 !important; 
                            }
                            .modal-backdrop {
                                z-index: 1040 !important;
                                background-color: rgba(0, 0, 0, 0.5);
                            }
                            body.modal-open {
                                overflow: hidden; 
                            }
                        </style>
                        <td class="text-center">
                            @if ($order->status == 'Chờ xử lý')
                                <button type="button" class="btn btn-danger btn-sm rounded" data-toggle="modal" data-target="#modalCancelOrderUnique-{{ $order->id }}">
                                    Hủy đơn
                                </button>
                            @endif
                            <div id="modalCancelOrderUnique-{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalCancelOrderLabel-{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCancelOrderLabel-{{ $order->id }}">Hủy đơn hàng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="cancellationReason">Lý do hủy đơn hàng</label>
                                                    <select name="cancellation_reason" id="cancellationReason" class="form-control" required>
                                                        <option value="" disabled selected>-- Chọn lý do hủy đơn --</option>
                                                        <option value="Thay đổi ý định mua hàng">Thay đổi ý định mua hàng</option>
                                                        <option value="Đặt nhầm sản phẩm">Đặt nhầm sản phẩm</option>
                                                        <option value="Thời gian giao hàng quá lâu">Thời gian giao hàng quá lâu</option>
                                                        <option value="Tìm thấy giá tốt hơn ở nơi khác">Tìm thấy giá tốt hơn ở nơi khác</option>
                                                        <option value="Không liên hệ được với người bán">Không liên hệ được với người bán</option>
                                                        <option value="Phí vận chuyển quá cao">Phí vận chuyển quá cao</option>
                                                        <option value="Sản phẩm không còn cần thiết">Sản phẩm không còn cần thiết</option>
                                                        <option value="Không hài lòng với dịch vụ">Không hài lòng với dịch vụ</option>
                                                        <option value="Thông tin sản phẩm không rõ ràng">Thông tin sản phẩm không rõ ràng</option>
                                                        <option value="Người bán yêu cầu hủy đơn hàng">Người bán yêu cầu hủy đơn hàng</option>
                                                    </select>
                                                </div>
                                                <div class="form-group text-right">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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