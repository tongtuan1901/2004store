@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

@section('content')
<div class="w-full relative mb-4">
    <h1 class="text-2xl font-semibold">Thêm Bản Ghi Tồn Kho</h1>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium">Chọn Danh Mục</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Chọn Danh Mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

       <div class="mb-4">
    <label for="product_id" class="block text-sm font-medium">Chọn Sản Phẩm</label>
    <select id="product_id" name="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" onchange="populateVariations(this)">
        <option value="">-- Chọn Sản Phẩm --</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" data-category-id="{{ $product->category_id }}" data-variations='{{ json_encode($product->variations) }}'>
                {{ $product->name }} 
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-4">
            <label for="variation_id" class="block text-sm font-medium">Chọn Biến Thể</label>
            <select id="variation_id" name="variation_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="">-- Chọn Biến Thể --</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity_change" class="block text-sm font-medium">Số Lượng Thay Đổi (Biến Thể)</label>
            <input type="number" id="quantity_change" name="quantity_change" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" min="1">
        </div>

        <div class="mb-4">
            <label for="note" class="block text-sm font-medium">Ghi Chú</label>
            <textarea id="note" name="note" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium">Ngày Ghi Nhận</label>
            <input type="date" id="date" name="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Lưu</button>
    </form>
</div>

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

    document.getElementById('category_id').addEventListener('change', function () {
        const selectedCategoryId = this.value;
        const productSelect = document.getElementById('product_id');
        const options = productSelect.querySelectorAll('option');

        // Hiển thị sản phẩm chỉ thuộc danh mục đã chọn
        options.forEach(option => {
            const optionCategoryId = option.getAttribute('data-category-id');
            if (selectedCategoryId === "" || optionCategoryId === selectedCategoryId) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });

        // Reset chọn sản phẩm và biến thể khi thay đổi danh mục
        productSelect.value = "";
        document.getElementById('variation_id').innerHTML = '<option value="">-- Chọn Biến Thể --</option>';
    });
</script>
@endsection

@extends('Admin/layouts/master/footer')
