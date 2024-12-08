@extends('admin.layouts.master')

@section('contentAdmin')
<style>
    .form-check{
        margin-right: 10px;
    }
</style>
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-3xl font-medium">Danh Sách Khách Hàng Yêu Cầu Rút Tiền</h1>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif        
                <div class="mr-3">
                    <form action="{{ route('filter-requests') }}" method="GET" class="d-flex">
                        <div class="form-check mr-5">
                            <input class="form-check-input" type="radio" name="filter" id="all" value="" 
                                @if(request('filter') == null) checked @endif>
                            <label class="form-check-label" for="all">
                                Tất cả
                            </label>
                        </div>                        
                        <div class="form-check mr-5">
                            <input class="form-check-input" type="radio" name="filter" id="approved" value="1" 
                                @if(request('filter') == '1') checked @endif>
                            <label class="form-check-label" for="approved">
                                Đã thanh toán
                            </label>
                        </div>
                        <div class="form-check mr-5">
                            <input class="form-check-input" type="radio" name="filter" id="pending" value="0" 
                                @if(request('filter') == '0') checked @endif>
                            <label class="form-check-label" for="pending">
                                Chưa xử lý
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </form>
                </div>
                
    
                <!-- Bảng danh sách khách hàng đã nạp -->
                <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                    <div class="sherah-table p-0">
                        <table class="table table-striped" id="">
                            <thead class="">
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Tên tài khoản ngân hàng</th>
                                    {{-- <th>Amount</th> --}}
                                    <th>Thời gian gửi yêu cầu</th>
                                    <th>Trạng thái yêu cầu</th>
                                    {{-- <th>Balance</th> --}}
                                    <th>Số Dư Sau Khi Rút</th>
                                    <th>Số Tiền Rút</th>
                                    <th>Ngân Hàng</th>
                                    <th>STK</th>
                                    <th>Request Type</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layYeuCauNew as $item)
                                    <tr>
                                        {{-- <td>{{ $item->id }}</td> --}}
                                        <td>{{ $item->customer_name }}</td>
                                        {{-- <td>{{ $item->amount }}</td> --}}
                                        <td>{{ $item->transfer_time }}</td>
                                        <td>
                                            @if ($item->is_approved == 0)
                                                <span class="text-danger">Chưa xử lý</span>
                                            @elseif ($item->is_approved == 1)
                                                <span class="text-success">Đã thanh toán</span>
                                            @endif
                                        </td>                                        
                                        {{-- <td>{{ $item->balance }}</td> --}}
                                        <td>{{ number_format($item->so_du - $item->so_tien_rut, 0, ',', '.') }} đ</td>
                                        <td>{{ number_format($item->so_tien_rut, 0, ',', '.') }} đ</td>
                                        <td>{{ $item->ngan_hang }}</td>
                                        <td>{{ (int) $item->stk }}</td>
                                        <td>{{ $item->request_type }}</td>
                                        <td>
                                            <form action="{{ route('update-IsApproved', $item->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <select name="is_approved" class="form-control" onchange="this.form.submit()" 
                                                    @if($item->is_approved == 1) disabled @endif>
                                                    <option value="0" @if($item->is_approved == 0) selected @endif>Chưa xử lý</option>
                                                    <option value="1" @if($item->is_approved == 1) selected @endif>Đã thanh toán</option>
                                                </select>
                                            </form>
                                        </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection
