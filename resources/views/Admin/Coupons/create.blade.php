@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

<<<<<<< HEAD

=======
>>>>>>> 262426b0f91bf6c6183b507f2d6cd7edb752a350
@section('content')
<div class="container">
    <h2>Thêm Mã Giảm Giá</h2>

    <form action="{{ route('admin-coupons.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục</label>
            <select class="form-control" id="category_id" name="category_id" onchange="fetchProducts()" required>
                <option value="">-- Chọn Danh Mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Sản Phẩm</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <option value="">-- Chọn Sản Phẩm --</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Mã Giảm Giá</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại</label>
<<<<<<< HEAD

=======
>>>>>>> 262426b0f91bf6c6183b507f2d6cd7edb752a350
            <select class="form-control" id="type" name="type" required>
                <option value="fixed">Giá trị cố định</option>
                <option value="percentage">Theo phần trăm</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Số Tiền Giảm</label>
            <input type="number" step="0.01" class="form-control" id="value" name="value" value="{{ old('value') }}" required>
        </div>
        <div class="mb-3">
            <label for="starts_at" class="form-label">Thời Gian Bắt Đầu</label>
            <input type="datetime-local" class="form-control" id="starts_at" name="starts_at" value="{{ old('starts_at') }}" required>
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">Thời Gian Kết Thúc</label>
            <input type="datetime-local" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mã Giảm Giá</button>
    </form>
</div>

<script>
    function fetchProducts() {
        var categoryId = document.getElementById("category_id").value;
        var productSelect = document.getElementById("product_id");
        productSelect.innerHTML = ''; // Reset sản phẩm

        if (categoryId) {
            fetch(`/admin-coupons/products/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    // Thêm sản phẩm vào dropdown
                    data.forEach(product => {
                        var option = document.createElement("option");
                        option.value = product.id;
                        option.text = product.name;
                        productSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching products:', error));
        } else {
            var option = document.createElement("option");
            option.value = '';
            option.text = '-- Chọn Sản Phẩm --';
            productSelect.appendChild(option);
        }
    }
</script>
@endsection

@extends('Admin/layouts/master/footer')
<<<<<<< HEAD

=======
>>>>>>> 262426b0f91bf6c6183b507f2d6cd7edb752a350
