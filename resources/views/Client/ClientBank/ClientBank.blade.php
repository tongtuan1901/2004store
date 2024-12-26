@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('Client.layouts.paginate.master')

@section('contentClient')

    <style>
        /* General Body Styles */

        /* Container Styles */

        /* Header Styles */
        .header {
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
        }

        .back-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        h1 {
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .mb-logo {
            color: #007bff;
            font-weight: bold;
        }

        /* Content Section */
        .content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        /* QR Section */
        .qr-section,
        .card-section {
            width: 48%;
            background-color: #f0f4ff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 22px;
            color: #333;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .warning {
            color: #e74c3c;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .code-text {
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .copy-button {
            background-color: #8a2be2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .copy-button:hover {
            background-color: #6a1fa2;
        }

        /* Card Info Section */
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: #555;
            font-size: 16px;
        }

        .value {
            color: #e74c3c;
            font-weight: bold;
            font-size: 16px;
            flex-grow: 1;
            margin-left: 15px;
        }

        /* Số tiền cần nạp */
        .input-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-row label {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            margin-right: 10px;
        }

        .input-row input {
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 250px;
        }

        .input-row input:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Gửi yêu cầu Button */
        .submit-button {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
            width: 100%;
            max-width: 250px;
            transition: background-color 0.3s ease;
            margin-left: auto;
            margin-right: auto;
        }

        .submit-button:hover {
            background-color: #218838;
        }

        /* Instructions Section */
        .instructions {
            margin-top: 30px;
        }

        .instructions h2 {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .instructions ol {
            padding-left: 20px;
            color: #333;
            font-size: 16px;
        }

        .note {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Alert Box */
        .alert-box {
            margin-top: 20px;
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            padding: 20px;
            border-radius: 8px;
            color: #856404;
        }

        .alert-icon {
            font-size: 20px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .alert-box ul {
            padding-left: 20px;
            font-size: 16px;
        }

        /* Floating CSKH Button */
    </style>

    <div class="container">
        <div class="header">
            <button class="back-button" href="{{ route('client-home.index') }}">Quay lại</button>
            @foreach ($bankCards as $index => $bankCard)
                <h1>Nạp qua {{ $bankCard->bank_name }} </h1>
        </div>
        <form action="{{ route('client-bank.transfer-request') }}" method="POST">
            @csrf
            <input type="hidden" name="customer_name" value="{{ Auth::user()->name }}">
            <input type="hidden" name="transfer_content" value="{{ $transferContents[$index] }}">
            <div class="content">


                <div class="qr-section">
                    <h2>Nạp tiền qua quét mã QR</h2>
                    <p class="warning">Chú ý: Quét mã QR MB Bank không tự điền nội dung chuyển tiền, vui lòng nhập lại chính
                        xác theo nội dung dưới đây</p>
                    <div class="qr-code">
                        <!-- Giả sử bạn muốn hiển thị mã QR từ dữ liệu BankCard -->
                        <img src="{{ asset('storage/' . $bankCards[0]->image) }}" alt="QR Code">
                    </div>
                    <span class="label">Nội dung chuyển khoản</span>
                    <span class="value transfer-content"
                        id="transfer-content-{{ $index }}">{{ $transferContents[$index] }}</span>
                    <button class="copy-button">Sao chép nội dung</button>
                </div>

                <div class="card-section">
                    <h2>Nạp tiền qua SỐ THẺ</h2>

                    <div class="info-row">
                        <span class="label">Ngân Hàng</span>
                        <span class="value bank-name" id="bank-name-{{ $index }}">{{ $bankCard->bank_name }}</span>
                        <button class="copy-button">Sao chép</button>
                    </div>
                    <div class="info-row">
                        <span class="label">Tên chủ tài khoản</span>
                        <span class="value account-name"
                            id="account-name-{{ $index }}">{{ $bankCard->account_holder_name }}</span>
                        <button class="copy-button">Sao chép</button>
                    </div>
                    <div class="info-row">
                        <span class="label">Số thẻ</span>
                        <span class="value card-number"
                            id="card-number-{{ $index }}">{{ $bankCard->card_number }}</span>
                        <button class="copy-button">Sao chép</button>
                    </div>
                    <div class="info-row">
                        <span class="label">Nội dung chuyển khoản</span>
                        <span class="value transfer-content"
                            id="transfer-content-{{ $index }}">{{ $transferContents[$index] }}</span>
                        <button class="copy-button">Sao chép</button>
                    </div>

                    <div class="input-row">
                        <label for="amount">Số tiền cần nạp:</label>
                        <input type="number" id="amount" name="amount" placeholder="Nhập số tiền">
                        <br> <br>
                        @error('amount')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="submit-button">Gửi yêu cầu</button>
        </form>
        @endforeach
    </div>

    </div>

    <div class="instructions">
        <h2>Hướng dẫn nạp tiền qua quét mã QR</h2>
        <ol>
            <li>Đăng nhập ứng dụng Mobile Banking, chọn chức năng Scan QR và quét mã QR trên đây.</li>
            <li>Nhập số tiền muốn nạp, kiểm tra thông tin đơn hàng (NH, chủ TK, số TK, Nội dung CK) trùng khớp với thông tin
                CK bên trái.</li>
            <li>Xác nhận thanh toán và hoàn tất giao dịch.</li>
        </ol>
        <p class="note">*Chú ý: mỗi mã QR chỉ dùng cho 1 giao dịch nạp tiền, không sử dụng lại</p>
    </div>

    <div class="alert-box">
        <p><span class="alert-icon">⚠️</span> <strong>Lưu ý!</strong></p>
        <ul>
            <li><strong>Chú ý:</strong> Tài khoản bank không cố định. Vui lòng kiểm tra lại tên và số tài khoản đang hiển
                thị trước khi thực hiện giao dịch. Xin cảm ơn.</li>
            <li>- Quý khách ghi đúng thông tin nạp tiền thì tài khoản sẽ được cộng tự động sau khi giao dịch thành công.
            </li>
            <li>- Nạp tối thiểu: 10.000 VND</li>
            <li>- Quý khách thực hiện chuyển tiền qua dịch vụ quốc tế tới ngân hàng Việt Nam vui lòng chờ từ 3-5 ngày (tùy
                vào dịch vụ / không tính Thứ 7 và Chủ Nhật)</li>
        </ul>
    </div>

    </div>
    <br>
    <hr>
    <!-- resources/views/client/bank-cards/index.blade.php -->
    <div class="container">
        <h1 class="text-center">Lịch Sử Giao Dịch Nạp Tiền</h1 class="text-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thời Gian</th>
                    <th>Số Tiền</th>
                    <th>Nội Dung</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transferRequests as $key => $request)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $request->transfer_time }}</td>
                        <td>{{ number_format($request->amount) }} VND</td>
                        <td>{{ $request->transfer_content }}</td>
                        <td style="color: red;">{{ $request->is_approved ? 'Đã Duyệt' : 'Đang chờ Duyệt' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transferRequests->links() }}
    </div>
    <script>
        // Hàm để sao chép văn bản vào clipboard
        function copyToClipboard(elementId) {
            var copyText = document.getElementById(elementId);
            // Tạo một vùng văn bản tạm thời để sao chép
            var textArea = document.createElement('textarea');
            textArea.value = copyText.textContent || copyText.innerText; // Lấy nội dung từ phần tử
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            // Thông báo cho người dùng
            alert('Đã sao chép: ' + textArea.value);
        }

        // Gắn sự kiện click cho các nút "Sao chép"
        document.querySelectorAll('.copy-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var targetId = this.previousElementSibling.id;
                copyToClipboard(targetId);
            });
        });
    </script>
@endsection
1
