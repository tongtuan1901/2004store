@extends('Admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-3xl font-medium">Chi Tiết Thẻ Ngân Hàng</h1>
            <a href="{{ route('admin.bank-cards.index') }}" class="btn btn-secondary">Quay Lại</a>
        </div>

        <!-- Thông tin thẻ ngân hàng -->
        <div class="mt-4">
            <p><strong>Tên Ngân Hàng:</strong> {{ $bankCard->bank_name }}</p>
            <p><strong>Tên Chủ Tài Khoản:</strong> {{ $bankCard->account_holder_name }}</p>
            <p><strong>Số Thẻ:</strong> {{ $bankCard->card_number }}</p>
            <p><strong>Ảnh:</strong></p>
            @if ($bankCard->image)
                <img src="{{ asset('storage/' . $bankCard->image) }}" alt="Bank Card Image" class="w-24 h-24 object-cover">
            @else
                <p>Không có ảnh</p>
            @endif
        </div>
    </div>
</section>
@endsection
