@extends('admin.layouts.master')

@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <!-- Tiêu đề -->
            <div class="flex justify-between items-center py-4">
                <h1 class="text-3xl font-medium">Cập Nhật Thẻ Ngân Hàng</h1>
                <a href="{{ route('bank-cards.index') }}" class="sherah-btn sherah-btn__third">Quay Lại</a>
            </div>

            <!-- Form sửa thẻ ngân hàng -->
            <form action="{{ route('bank-cards.update', $bankCard->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0 container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-form-box sherah-border mg-top-30">
                                <h4 class="form-title m-0">Thông Tin Thẻ Ngân Hàng</h4>
                                <div class="row">
                                    <!-- Tên Ngân Hàng -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="sherah-wc__form-label">Tên Ngân Hàng:</label>
                                            <div class="form-group__input">
                                                <input type="text" name="bank_name" id="bank_name"
                                                    value="{{ old('bank_name', $bankCard->bank_name) }}" class="sherah-wc__form-input" required>
                                            </div>
                                            @error('bank_name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tên Chủ Tài Khoản -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="sherah-wc__form-label">Tên Chủ Tài Khoản:</label>
                                            <div class="form-group__input">
                                                <input type="text" name="account_holder_name" id="account_holder_name"
                                                    value="{{ old('account_holder_name', $bankCard->account_holder_name) }}" class="sherah-wc__form-input" required>
                                            </div>
                                            @error('account_holder_name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Số Thẻ -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="sherah-wc__form-label">Số Thẻ:</label>
                                            <div class="form-group__input">
                                                <input type="text" name="card_number" id="card_number"
                                                    value="{{ old('card_number', $bankCard->card_number) }}" class="sherah-wc__form-input" required>
                                            </div>
                                            @error('card_number')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Ảnh -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="sherah-wc__form-label">Ảnh Thẻ Ngân Hàng:</label>
                                            <div class="image-preview-container">
                                                @if ($bankCard->image)
                                                    <div class="mb-2">
                                                        <img src="{{ asset('storage/' . $bankCard->image) }}" alt="Bank Card Image" class="uploaded-image">
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file" name="image" id="image" class="sherah-wc__form-input">
                                            @error('image')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút Submit -->
                            <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                <button type="submit" class="sherah-btn sherah-btn__primary">Cập Nhật Thẻ Ngân Hàng</button>
                                <a href="{{ route('bank-cards.index') }}" class="sherah-btn sherah-btn__third">Quay Lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

<script>
    // Preview uploaded images
    const inputFile = document.getElementById('image');
    const previewContainer = document.querySelector('.image-preview-container');

    inputFile.addEventListener('change', (event) => {
        const file = event.target.files[0];
        previewContainer.innerHTML = ''; // Clear previous images

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('uploaded-image');
                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    });
</script>

<style>
    .image-preview-container {
        display: flex;
        overflow-x: auto;
        gap: 10px;
        padding: 10px 0;
    }

    .uploaded-image {
        max-width: 100px;
        max-height: 100px;
        object-fit: cover;
    }
</style>
