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
            <select id="product_id" name="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="">-- Chọn Sản Phẩm --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-category-id="{{ $product->category_id }}" {{ $inventoryLog->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} (Hiện có: {{ $product->quantity }} sản phẩm)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity_change" class="block text-sm font-medium">Số Lượng Thay Đổi</label>
            <input type="number" id="quantity_change" name="quantity_change" value="{{ $inventoryLog->quantity_change }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="note" class="block text-sm font-medium">Ghi Chú</label>
            <textarea id="note" name="note" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $inventoryLog->note }}</textarea>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium">Ngày Ghi Nhận</label>
            <input type="date" id="date" name="date" value="{{ $inventoryLog->created_at->format('Y-m-d') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Cập Nhật</button>
    </form>
</div>

<script>
    document.getElementById('category_id').addEventListener('change', function () {
        const selectedCategoryId = this.value;
        const productSelect = document.getElementById('product_id');
        const options = productSelect.querySelectorAll('option');

        // Hiển thị sản phẩm chỉ thuộc danh mục đã chọn
        options.forEach(option => {
            const optionCategoryId = option.getAttribute('data-category-id');
            option.style.display = (selectedCategoryId === "" || optionCategoryId === selectedCategoryId) ? 'block' : 'none';
        });

        // Reset chọn sản phẩm khi thay đổi danh mục
        productSelect.value = "";
    });

    // Gọi sự kiện 'change' một lần để hiển thị sản phẩm phù hợp khi load trang chỉnh sửa
    document.getElementById('category_id').dispatchEvent(new Event('change'));
</script>

@endsection

@extends('Admin/layouts/master/footer')
