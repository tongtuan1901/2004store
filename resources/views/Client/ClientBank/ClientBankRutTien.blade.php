@extends('Client.layouts.paginate.master')
@section('contentClient')
            <div class="main-article-share">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Cột trái: Form rút tiền -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4>Rút Tiền</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('requestYeuCauRutTien') }}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <div class="form-group">
                                            <label for="amountHistory">Số tiền hiện còn:</label>
                                            <input type="text" class="form-control" id="amountHistory" name="so_du" value="{{ number_format(Auth::check() ? Auth::user()->balance : 0, 0, ',', '.') }}">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Số tiền cần rút:</label>
                                            <input type="number" class="form-control" id="amount" name="so_tien_rut" placeholder="Nhập số tiền" >
                                            @error('so_du1')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                            @error('so_tien_rut')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nameuser">Tên người nhận:</label>
                                            <input type="text" class="form-control" id="nameuser" name="customer_name" placeholder="Nhập tên tài khoản" >
                                            @error('customer_name')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bank">Ngân hàng:</label>
                                            <select class="form-control" id="bank" name="ngan_hang" >
                                                <option value="" disabled selected>Chọn ngân hàng</option>
                                                <option value="Vietcombank">Ngân hàng TMCP Ngoại Thương Việt Nam (Vietcombank)</option>
                                                <option value="Techcombank">Ngân hàng TMCP Kỹ Thương Việt Nam (Techcombank)</option>
                                                <option value="VPBank">Ngân hàng TMCP Việt Nam Thịnh Vượng (VPBank)</option>
                                                <option value="Agribank">Ngân hàng Nông nghiệp và Phát triển Nông thôn (Agribank)</option>
                                                <option value="BIDV">Ngân hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV)</option>
                                                <option value="MB">Ngân hàng TMCP Quân Đội (MB Bank)</option>
                                                <option value="ACB">Ngân hàng TMCP Á Châu (ACB)</option>
                                                <option value="Sacombank">Ngân hàng TMCP Sài Gòn Thương Tín (Sacombank)</option>
                                                <option value="VIB">Ngân hàng TMCP Quốc tế Việt Nam (VIB)</option>
                                                <option value="SHB">Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)</option>
                                                <option value="HDBank">Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh (HDBank)</option>
                                                <option value="DongA">Ngân hàng TMCP Đông Á (DongA Bank)</option>
                                                <option value="Eximbank">Ngân hàng TMCP Xuất Nhập Khẩu Việt Nam (Eximbank)</option>
                                                <option value="SeABank">Ngân hàng TMCP Đông Nam Á (SeABank)</option>
                                                <option value="OCB">Ngân hàng TMCP Phương Đông (OCB)</option>
                                                <option value="LienVietPostBank">Ngân hàng TMCP Bưu điện Liên Việt (LienVietPostBank)</option>
                                                <option value="TPBank">Ngân hàng TMCP Tiên Phong (TPBank)</option>
                                                <option value="SCB">Ngân hàng TMCP Sài Gòn (SCB)</option>
                                                <option value="PVcomBank">Ngân hàng TMCP Đại chúng Việt Nam (PVcomBank)</option>
                                                <option value="ABBANK">Ngân hàng TMCP An Bình (ABBANK)</option>
                                            </select>
                                            @error('ngan_hang')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="account_number">Số tài khoản:</label>
                                            <input type="text" class="form-control" id="account_number" name="stk" placeholder="Nhập số tài khoản" >
                                            @error('stk')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="request_type" value="Rút tiền">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="soDu" value="{{Auth::user()->balance}}">
                                        
                                        <button type="submit" class="btn btn-success btn-block">Xác nhận rút tiền</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                
                        <!-- Cột phải: Bảng lịch sử rút tiền -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4>Lịch Sử Rút Tiền</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                                <th>Ngày rút tiền</th>
                                                <th>Số tiền rút</th>
                                                <th>Trạng thái rút</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($lichSuRut as $history)
                                                <tr>
                                                    <td>{{ $history->transfer_time}}</td>
                                                    <td>{{number_format($history->so_tien_rut, 0, ',', '.')}} VND</td>
                                                    <td>
                                                        @if ($history->is_approved == 0)
                                                            <span class="text-danger">Đang xử lý</span>
                                                        @elseif ($history->is_approved == 1)
                                                        <span class="text-success">Đã thanh toán</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
@endsection