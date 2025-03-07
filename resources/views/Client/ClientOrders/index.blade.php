@extends('Client.layouts.paginate.master')

@section('contentClient')

<h2 class="text-center mb-4">Danh sách đơn hàng</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="container text-center">
    <div class="row align-items-start">
      <div class="col">
        <a class="btn btn-danger" href="{{route('client.listHuy',['userId' => Auth::user()->id])}}" style="margin: 30px">Danh sách đơn hành đã hủy</a>
      </div>
    </div>
</div>
@php
    $hasOrders = $userOrder && $userOrder->orders->isNotEmpty(); // Check if the user has orders
    $orderIndex = 1;
@endphp

@if (!$hasOrders)
    <p class="alert alert-info text-center">Bạn chưa có đơn hàng nào</p>
@else
    <div class="table-responsive">
        <table class="table table-striped" border="1" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="text-center" style="width:50px">
                        STT
                    </th>
                    <th  style="width:125px">Mã đơn hàng</th>
                    <th>Sản phẩm</th>
                    <th> Tổng Giá trị đơn hàng</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>
                    <th class="text-center">Trạng thái</th>
                    <th style="width:100px">Phương thức thanh toán</th>
                    
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
                        <td>{{ $order->order_code }}</td>
                        <td class="text-center" style="vertical-align: top;">
                            <div style="max-width: 200px; overflow-wrap: break-word; text-align: left;">
                                @if ($order->orderItems->isNotEmpty())
                                    @foreach ($order->orderItems as $item)
                                        <div style="margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                                            {{-- Hình ảnh sản phẩm --}}
                                            @if ($item->variation && $item->variation->image)
                                                <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" 
                                                     alt="Variation Image" 
                                                     class="img-fluid rounded mb-1" 
                                                     style="max-width: 60px; height: auto; display: block; margin-bottom: 5px;">
                                            @else
                                                <span class="text-muted">Không có hình ảnh</span>
                                            @endif
                                            
                                            {{-- Tên và thông tin sản phẩm --}}
                                            <div>
                                                <strong>{{ $item->product_name ?? 'N/A' }}</strong>
                                                <br>
                                                <small>Kích thước: {{ $item->variation->size->size ?? 'Không rõ' }}</small>,
                                                <small>Màu sắc: {{ $item->variation->color->color ?? 'Không rõ' }}</small>
                                                <br>
                                                <small>Số lượng: {{ $item->quantity ?? 1 }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-muted">Không có sản phẩm</span>
                                @endif
                            </div>
                        </td>
                        
                        {{-- <td class="text-center">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                            @if ($order->orderItems->isNotEmpty())
                                @foreach ($order->orderItems as $item)
                                    @if ($item->variation && $item->variation->image)
                                        <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-fluid rounded mb-1" style="max-width: 60px;"> <br><br><br><br>
                                    @else
                                        <span class="text-muted">Không có hình ảnh</span>
                                    @endif
                                @endforeach
                            @else
                                <span class="text-muted">Không có sản phẩm</span>
                            @endif
                            </div>
                        </td>
                        <td class="truncate">
                            @foreach ($productDetails as $product)
                                <div>
                                    <strong>{{ $product['name'] }}</strong><br>
                                    Kích thước: {{ $product['size'] }}, Màu sắc: {{ $product['color'] }}<br>
                                    Số lượng: {{ $product['quantity'] }}<br><br>
                                </div>
                            @endforeach
                        </td> --}}
                        <td class="truncate">
                            {{ number_format(($order->total) ?? 0, 0, ',', '.') }}
                            @if(in_array($order->payment_method, ['momo', 'vnpay', 'wallet']))
                                <large class="text-success" style="color: green; margin-left: 10px;">(Đã thanh toán)</large>
                            @endif
                        </td>
                        <td>
                            {{$order->address}}
                        </td>
                        <td class="truncate">
                            {{$order->created_at}}
                        </td>
                        <td class="text-center">
                            <span class="badge badge-{{ $order->status == 'Hoàn thành' ? 'success' : ($order->status == 'Hủy' ? 'danger' : 'warning') }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>
                            {{$order->payment_method}}
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
                        
                                <!-- Modal -->
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

