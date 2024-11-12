@extends('Admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-3xl font-medium">Thêm Thẻ Ngân Hàng</h1>
            <a href="{{ route('bank-cards.index') }}" class="btn btn-secondary">Quay Lại</a>
        </div>

        <!-- Form thêm thẻ ngân hàng -->
        <form action="{{ route('bank-cards.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Tên Ngân Hàng -->
                <div>
                    <label for="bank_name" class="block text-sm font-medium">Tên Ngân Hàng:</label>
                    <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name') }}" class="form-input" required>
                    @error('bank_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tên Chủ Tài Khoản -->
                <div>
                    <label for="account_holder_name" class="block text-sm font-medium">Tên Chủ Tài Khoản:</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" value="{{ old('account_holder_name') }}" class="form-input" required>
                    @error('account_holder_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Số Thẻ -->
                <div>
                    <label for="card_number" class="block text-sm font-medium">Số Thẻ:</label>
                    <input type="text" name="card_number" id="card_number" value="{{ old('card_number') }}" class="form-input" required>
                    @error('card_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Ảnh -->
                <div>
                    <label for="image" class="block text-sm font-medium">Ảnh Thẻ Ngân Hàng:</label>
                    <input type="file" name="image" id="image" class="form-input">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Nút Submit -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Thêm Thẻ Ngân Hàng</button>
                <a href="{{ route('bank-cards.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
</section>
@endsection
