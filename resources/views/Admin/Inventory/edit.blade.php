@extends('Admin.layouts.master')

@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
                    <div class="container">
                        <h2 class="mt-4">Chỉnh sửa bản ghi tồn kho</h2>
                        <form action="{{ route('inventory.update', $inventoryLog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Danh mục</label>
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        <option value="">-- Chọn Danh Mục --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $inventoryLog->product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="product_id" class="form-label">Sản phẩm</label>
                                    <select name="product_id" id="product_id" class="form-select" required onchange="populateVariations(this)">
                                        <option value="">-- Chọn Sản Phẩm --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" 
                                                data-category-id="{{ $product->category_id }}" 
                                                data-variations='{{ json_encode($product->variations) }}' 
                                                {{ $inventoryLog->product_id == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="variation_id" class="form-label">Chọn Biến Thể</label>
                                    <select name="variation_id" id="variation_id" class="form-select" required>
                                        <option value="">-- Chọn Biến Thể --</option>
                                        @if ($inventoryLog->variation)
                                            <option value="{{ $inventoryLog->variation->id }}" selected>
                                                Màu: {{ $inventoryLog->variation->color ? $inventoryLog->variation->color->color : 'Chưa xác định' }},
                                                Kích thước: {{ $inventoryLog->variation->size ? $inventoryLog->variation->size->size : 'Chưa xác định' }},
                                                Số lượng: {{ $inventoryLog->variation->quantity }}
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="quantity_change" class="form-label">Số Lượng Thay Đổi (Biến Thể)</label>
                                <input type="number" name="quantity_change" value="{{ $inventoryLog->quantity_change }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi Chú</label>
                                <input type="text" name="note" value="{{ $inventoryLog->note }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Ngày Ghi Nhận</label>
                                <input type="date" name="date" value="{{ $inventoryLog->date }}" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success mt-4">Cập nhật</button>
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

    // Nếu không chọn sản phẩm, return
    if (!selectedOption) return;

    const variations = JSON.parse(selectedOption.getAttribute('data-variations')) || [];
    const variationSelect = document.getElementById('variation_id');

    variationSelect.innerHTML = '<option value="">-- Chọn Biến Thể --</option>'; // Reset biến thể

    variations.forEach(variation => {
        const option = document.createElement('option');
        option.value = variation.id;

        const colorName = variation.color ? variation.color.color : 'Chưa xác định';
        const sizeName = variation.size ? variation.size.size : 'Chưa xác định';

        option.textContent = `Màu: ${colorName}, Kích thước: ${sizeName}, Số lượng: ${variation.quantity}`;
        variationSelect.appendChild(option);
    });
}
</script>
@endsection
