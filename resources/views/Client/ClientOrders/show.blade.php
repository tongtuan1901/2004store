@extends('Client.layouts.paginate.master')

@section('contentClient')
{{-- <div class="container my-4">
    <h1 class="text-center mb-4">Chi tiết đơn hàng</h1>

    @if($userOrder->orders->isNotEmpty())
        @php
            $order = $userOrder->orders->first();
        @endphp

        <!-- Thông tin khách hàng và địa chỉ -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h2 class="m-0">Thông tin chi tiết đơn hàng</h2>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <!-- Thông tin đơn hàng -->
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <h3 class="text-primary mb-3">Thông tin đơn hàng</h3>
                                <p><strong>Mã đơn hàng:</strong> <span class="text-dark">{{ $order->id }}</span></p>
                                <p><strong>Phương thức thanh toán:</strong> <span class="text-info">{{ $order->payment_method }}</span></p>
                                <p><strong>Tổng tiền:</strong> 
                                    <span class="text-danger fw-bold">{{ number_format($order->total, 0, ',', '.') }} VND</span>
                                </p>
                                <p><strong>Mã giảm giá:</strong> 
                                    <span class="badge bg-success">{{ $order->discount_code ?? 'Không có' }}</span>
                                </p>
                                <p><strong>Giá trị giảm giá:</strong> 
                                    <span class="text-success">{{ number_format($order->discount_value ?? 0, 0, ',', '.') }} VND</span>
                                </p>
                                <p><strong>Sau khi giảm giá:</strong> 
                                    <span class="text-primary fw-bold fs-5">{{ number_format(($order->total - $order->discount_value) ?? 0, 0, ',', '.') }} VND</span>
                                </p>
                            </div>
                        </div>
            
                        <!-- Trạng thái đơn hàng -->
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <h3 class="text-warning mb-3">Trạng thái đơn hàng</h3>
                                <p><strong>Chờ xử lý:</strong> 
                                    <span class="text-muted">{{ $order->pending_time ?? 'Chưa cập nhật' }}</span>
                                </p>
                                <p><strong>Đang xử lý:</strong> 
                                    <span class="text-muted">{{ $order->processing_time ?? 'Chưa cập nhật' }}</span>
                                </p>
                                <p><strong>Đang giao hàng:</strong> 
                                    <span class="text-muted">{{ $order->shipping_time ?? 'Chưa cập nhật' }}</span>
                                </p>
                                <p><strong>Hoàn thành:</strong> 
                                    <span class="text-muted">{{ $order->completed_time ?? 'Chưa cập nhật' }}</span>
                                </p>
                            </div>
                        </div>
            
                        <!-- Thông tin giao hàng -->
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <h3 class="text-success mb-3">Thông tin giao hàng</h3>
                                <p><strong>Tên:</strong> 
                                    <span class="text-muted">{{ $order->name ?? 'Không có' }}</span>
                                </p>
                                <p><strong>Số điện thoại:</strong> 
                                    <span class="text-muted">{{ $order->phone_number ?? 'Không có' }}</span>
                                </p>
                                <p><strong>Địa chỉ giao hàng:</strong> 
                                    <span class="text-muted">{{ $order->address ?? 'Không có' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        <!-- Chi tiết sản phẩm trong đơn hàng -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="card-title">Chi tiết sản phẩm</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                @if($order->status == 'Hoàn thành') <!-- Kiểm tra trạng thái -->
                                    <th>Thao tác</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        @if ($item->variation && $item->variation->image)
                                            <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-fluid" style="max-width: 60px;">
                                        @else
                                            <span class="text-muted">Không có hình ảnh</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->variation->size->size ?? 'Không có' }}</td>
                                    <td>{{ $item->variation->color->color ?? 'Không có' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} VND</td>
                                    @if($order->status == 'Hoàn thành') <!-- Kiểm tra trạng thái để hiển thị cột đánh giá -->
                                        <td>
                                            <a href="{{ route('client.product.review.form', ['order' => $order->id, 'product' => $item->product->id]) }}" class="btn btn-outline-primary btn-sm">Đánh giá</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @else
        <p class="alert alert-warning">Không có đơn hàng nào.</p>
    @endif

    <!-- Nút quay lại -->
    <div class="text-center mt-4">
        <a href="{{ route('client.order', ['userId' => $userOrder->id]) }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div> --}}


<div class="container">
    <!-- Title -->
    <h2>Chi tiết đơn hàng</h2>
    @if($userOrder->orders->isNotEmpty())
    @php
        $order = $userOrder->orders->first();
    @endphp
   @php
   $stepClasses = [
       1 => 'complete',
       2 => 'complete',
       3 => 'complete',
       4 => 'complete',
   ];
  @endphp

<div class="progress-group">
   <div class="wrapper">
       @for ($i = 1; $i <= 4; $i++)
            <div class="step step0{{ $i }} {{ $i <= $currentStep ? 'complete' : '' }}">
               <progress class="progress" value="{{ $i <= $currentStep ? 100 : 0 }}" max="100" aria-describedby="Step 0{{ $i }}" ></progress>
               <div class="progress-circle"></div>
           </div>
       @endfor
   </div>
   <div class="progress-labels">
       <div class="label">
        Chờ Xử lý
        <br>

      </div>
       <div class="label">Step 02</div>
       <div class="label">Step 03</div>
       <div class="label">Step 04</div>
   </div>
</div>

    <div class="d-flex justify-content-between align-items-center py-3">
      <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Mã đơn {{ $order->id }}</h2>
    </div>
  
    <!-- Main content -->
    <div class="row">
      <div class="col-lg-12">
        <!-- Details -->
        <div class="card mb-8 mb-4">
          <div class="card-body">
            <div class="mb-3 d-flex justify-content-between">
              <div>
                <span class="me-3">{{$order->created_at}}</span>
                <span class="me-3">#{{ $order->id }}</span>
                <span class="me-3">{{ $order->payment_method }}</span>
                <span class="badge rounded-pill bg-info">{{$order->status}}</span>
              </div>
            </div>
            <table class="table table-borderless">
              <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                  <td>
                    <div class="d-flex mb-2">
                      <div class="flex-shrink-0">
                        @if ($item->variation && $item->variation->image)
                            <img src="{{ asset('storage/' . $item->variation->image->image_path) }}" alt="Variation Image" class="img-fluid" style="max-width: 60px;">
                        @else
                            <span class="text-muted">Không có hình ảnh</span>
                        @endif
                      </div>
                      <div class="flex-lg-grow-1 ms-3">
                        <h6 class="small mb-0"><a href="#" class="text-reset">{{ $item->product->name }}</a></h6>
                        <span class="small">Size:{{ $item->variation->size->size ?? 'Không có' }}, màu:{{ $item->variation->color->color ?? 'Không có' }}</span>
                      </div>
                    </div>
                  </td>
                  <td>{{ $item->quantity }}</td>
                  <td class="text-end">{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} VNĐ</td>
                  @if($order->status == 'Hoàn thành') <!-- Kiểm tra trạng thái để hiển thị cột đánh giá -->
                    <td>
                        <a href="{{ route('client.product.review.form', ['order' => $order->id, 'product' => $item->product->id]) }}" class="btn btn-outline-primary btn-sm">Đánh giá</a>
                    </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">Tổng phụ</td>
                  <td class="text-end">{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                </tr>
                <tr>
                  <td colspan="2">Mã giảm giá (Code: {{$order->discount_code}})</td>
                  <td class="text-danger text-end">-{{ number_format($order->discount_value ?? 0, 0, ',', '.') }} VNĐ</td>
                </tr>
                <tr class="fw-bold">
                  <td colspan="2">Tổng</td>
                  <td class="text-end">{{ number_format(($order->total - $order->discount_value) ?? 0, 0, ',', '.') }} VNĐ</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <!-- Payment -->
        <div class="card mb-8 mt-4">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <h3 class="h6">Phương thức thanh toán</h3>
                <p>{{ $order->payment_method }}<br>
                Tổng: {{ number_format(($order->total - $order->discount_value) ?? 0, 0, ',', '.') }} VNĐ </p>
              </div>
              <div class="col-lg-6">
                <h3 class="h6">Địa chỉ thanh toán</h3>
                <address>
                  <strong>{{ $order->name ?? 'Không có' }}</strong><br>
                  {{ $order->house_address ?? 'Không có' }},{{ $order->street ?? 'Không có' }},<br>
                  {{ $order->state ?? 'Không có' }},{{ $order->city ?? 'Không có' }}<br>
                  <abbr title="Phone">P:</abbr> {{ $order->phone_number ?? 'Không có' }}
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  @else
  <p class="alert alert-warning">Không có đơn hàng nào.</p>
    @endif
    </div>
</div>
   
<style>
    body{
    background:#eee;
    }
    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 1rem;
    }
    .text-reset {
        --bs-text-opacity: 1;
        color: inherit!important;
    }
    a {
        color: #5465ff;
        text-decoration: none;
    }
    //
    :root {
  --gap-xs: 6px;
  --gap-sm: 12px;
  --gap-md: 24px;
  --gap-lg: 36px;

  --step01: #4caf50;
  --step02: #2196f3;
  --step03: #ff9800;
  --step04: #f44336;

  --progress-track: #e0e0e0;
  --progress-fill: #4caf50;
  --progress-circle-complete: #4caf50;
  --progress-circle-incomplete: #bbb;
}

.progress-group {
  margin-top: var(--gap-lg);
  padding: var(--gap-sm) 0;
}

.wrapper {
  display: flex;
  position: relative;
  height: var(--gap-md);
}

.step {
  flex: 1;
  position: relative;
}

.step .progress {
  width: 100%;
  height: 8px;
  background-color: var(--progress-track);
  border-radius: 4px;
  overflow: hidden;
  margin-top: calc(var(--gap-sm) / 2);
}

.step.complete .progress {
  background-color: var(--progress-fill);
  transition: background-color 0.3s ease;
}

.step:not(.complete) .progress {
  background-color: var(--progress-track);
}

.step .progress-circle {
  width: 16px;
  height: 16px;
  background-color: var(--progress-circle-incomplete);
  border: 3px solid var(--progress-track);
  border-radius: 50%;
  position: absolute;
  top: -8px;
  left: 50%;
  transform: translateX(-50%);
  transition: background-color 0.3s ease, border-color 0.3s ease;
}

.step.complete .progress-circle {
  background-color: var(--progress-circle-complete);
  border-color: var(--progress-fill);
}

.progress-labels {
  display: flex;
  justify-content: space-between;
  margin-top: var(--gap-sm);
}

.label {
  text-align: center;
  font-size: 12px;
  text-transform: uppercase;
  color: #666;
  font-weight: bold;
}

</style>

@endsection
