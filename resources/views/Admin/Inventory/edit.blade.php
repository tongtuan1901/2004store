@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

@section('content')
<div class="w-full relative mb-4">
    <h1 class="text-2xl font-semibold">Chỉnh Sửa Bản Ghi Tồn Kho</h1>

    <form action="{{ route('inventory.update', $inventoryLog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium">Chọn Danh Mục</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="">-- Chọn Danh Mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $inventoryLog->product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="product_id" class="block text-sm font-medium">Chọn Sản Phẩm</label>
            <select id="product_id" name="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required onchange="populateVariations(this)">
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

        <div class="mb-4">
            <label for="variation_id" class="block text-sm font-medium">Chọn Biến Thể</label>
            <select id="variation_id" name="variation_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
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

        <div class="mb-4">
            <label for="quantity_change" class="block text-sm font-medium">Thay Đổi Số Lượng</label>
            <input type="number" name="quantity_change" id="quantity_change" value="{{ $inventoryLog->quantity_change }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="note" class="block text-sm font-medium">Ghi Chú</label>
            <textarea name="note" id="note" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $inventoryLog->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Cập Nhật
        </button>
    </form>
</div>

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
