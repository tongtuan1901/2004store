@extends('Admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
                    <div class="sherah-dsinner">
                        <div class="sherah-page-inner sherah-default-bg mg-top-30">
                            <h3>Danh sách đơn hàng đã hủy</h3>

                                @if ($donHangDaHuy->isNotEmpty())
                                <?php $user = Auth::user();  ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên người nhận</th>
                                                <th>Lý do hủy</th>
                                               <th>tên người gửi</th>
                                                <th>Sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Email</th>
                                                <th>Số lượng</th>
                                                <th>Kích thước</th>
                                                <th>Màu sắc</th>
                                              <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($donHangDaHuy as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                  
                                                    <td>{{ $order->name }}
                                                        {{ $order->phone }}
                                                        {{ $order->address }}
                                     
                                                    </td>
                                                    <td>{{ $order->cancellation_reason }}</td>
                                                    <td>{{ $order->user->name ?? 'Người gửi không tồn tại' }}</td>
                                                    <td>
                                                    @foreach ($order->orderItems as $item)
    <p>{{ $item->product ? $item->product->name : 'Product Name Not Available' }}</p>
@endforeach
                                                    </td>
                                                    
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            @if ($item->variation && $item->variation->image) <!-- Kiểm tra nếu variation có ảnh -->
                                                                <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Product Image" class="img-thumbnail" style="width: 80px; height: 80px;">
                                                            @else
                                                                <span>Không có hình ảnh</span>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $order->email }}</td>
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            <p>{{ $item->quantity }}</p>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            @if ($item->variation)
                                                                <div>{{ $item->variation->size->size ?? 'Không có kích thước' }}</div>
                                                            @else
                                                                <div>Không có kích thước</div>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                    
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            @if ($item->variation)
                                                                <div>{{ $item->variation->color->color?? 'Không có màu sắc' }}</div>
                                                            @else
                                                                <div>Không có màu sắc</div>
                                                                @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $order->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Không có đơn hàng đã hủy.</p>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection