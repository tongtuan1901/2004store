@extends('Admin.layouts.master')
@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12 sherah-main__column">
                    <div class="sherah-body">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <div class="container">
                            <h2 class="mt-4">Thêm Quản lí tồn kho</h2>
                            <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="category_id" class="form-label">Danh mục</label>
                                        <select name="category_id" id="category_id" class="form-select" required>
                                            <option value="">-- Chọn Danh Mục --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="product_id" class="form-label">Sản phẩm</label>
                                        <select name="product_id" id="product_id" class="form-select" required
                                            onchange="populateVariations(this)">
                                            <option value="">-- Chọn Sản Phẩm --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    data-category-id="{{ $product->category_id }}"
                                                    data-variations='{{ json_encode($product->variations) }}'>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="variation_id" class="form-label">Chọn Biến Thể</label>
                                        <select name="variation_id" id="variation_id" class="form-select" required>
                                            <option value="">-- Chọn Biến Thể --</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="quantity_change" class="form-label">Số Lượng Thay Đổi (Biến Thể)</label>
                                    <input type="number" name="quantity_change" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="note" class="form-label">Ghi Chú</label>
                                    <input type="text" name="note" class="form-control" required>
                                </div>

                                <!-- <div class="mb-3">
                                    <label for="date" class="form-label">Ngày Ghi Nhận</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div> -->

                                <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                    <button type="submit" class="sherah-btn sherah-btn__primary">Thêm bản ghi tồn
                                        kho</button>
                                    <a class="sherah-btn sherah-btn__third" href="{{ route('inventory.index') }}">
                                        Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function populateVariations(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const variations = JSON.parse(selectedOption.getAttribute('data-variations'));
            const variationSelect = document.getElementById('variation_id');

            variationSelect.innerHTML = '<option value="">-- Chọn Biến Thể --</option>';

            variations.forEach(variation => {
                const option = document.createElement('option');
                option.value = variation.id;

                const colorName = variation.color ? variation.color.color : 'Chưa xác định';
                const sizeName = variation.size ? variation.size.size : 'Chưa xác định';

                option.textContent = `Màu: ${colorName}, Kích thước: ${sizeName}, Số lượng: ${variation.quantity}`;
                variationSelect.appendChild(option);
            });
        }

        document.getElementById('category_id').addEventListener('change', function() {
            const selectedCategoryId = this.value;
            const productSelect = document.getElementById('product_id');
            const options = productSelect.querySelectorAll('option');

            options.forEach(option => {
                const optionCategoryId = option.getAttribute('data-category-id');
                option.style.display = (selectedCategoryId === "" || optionCategoryId ===
                    selectedCategoryId) ? 'block' : 'none';
            });

            productSelect.value = "";
            document.getElementById('variation_id').innerHTML = '<option value="">-- Chọn Biến Thể --</option>';
        });
    </script>
@endsection
