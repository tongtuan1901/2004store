@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <h2 class="mt-4">Thêm Sản Phẩm Mới</h2>
        <form action="{{ route('admin-products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="price_sale" class="form-label">Giá khuyến mãi</label>
                    <input type="number" name="price_sale" class="form-control"
                        placeholder="Nếu có, để trống nếu không có">
                </div>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" required>
                        <option value="1">Hết hàng</option>
                        <option value="0">Còn hàng</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="images" class="form-label">Ảnh sản phẩm</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>
            </div>

            <h4 class="mt-3">Biến thể sản phẩm</h4>
            <div id="variations-container">
                <div class="variation mb-3">
                    <div class="variation-header d-flex justify-content-between">
                        <h5 class="variation-title">Biến thể 1</h5>
                        <button type="button" class="btn btn-link toggle-variation">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="variation-content">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Kích thước</label>
                                <select name="variation[size][]" class="form-select" required>
                                    <option value="">Chọn kích thước</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Màu sắc</label>
                                <select name="variation[color][]" class="form-select" required>
                                    <option value="">Chọn màu sắc</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="variation[quantity][]" class="form-label">Số lượng</label>
                                <input type="number" name="variation[quantity][]" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="variation[price][]" class="form-label">Giá</label>
                                <input type="number" name="variation[price][]" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Hình ảnh biến thể</label>
                                <input type="file" name="variation[image][]" class="form-control" multiple>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger remove-variation mt-2">Xóa biến thể</button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary mt-3" id="add-variation">Thêm biến thể</button>

            <button type="submit" class="btn btn-success mt-4">Lưu sản phẩm</button>
        </form>
    </div>

    <script>
        document.getElementById('add-variation').addEventListener('click', function() {
            const variationsContainer = document.getElementById('variations-container');
            const newVariation = variationsContainer.firstElementChild.cloneNode(true);

            newVariation.querySelectorAll('input').forEach(input => input.value = '');
            newVariation.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

            const variationCount = variationsContainer.children.length + 1;
            newVariation.querySelector('.variation-title').textContent = `Biến thể ${variationCount}`;

            const inputs = newVariation.querySelectorAll('input');
            const selects = newVariation.querySelectorAll('select');

            inputs.forEach((input, index) => {
                input.name = input.name.replace(/\[\d+\]/, `[${variationCount - 1}]`);
            });
            selects.forEach((select, index) => {
                select.name = select.name.replace(/\[\d+\]/, `[${variationCount - 1}]`);
            });

            variationsContainer.appendChild(newVariation);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variation')) {
                e.target.closest('.variation').remove();
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('toggle-variation')) {
                const content = e.target.closest('.variation-header').nextElementSibling;
                content.style.display = content.style.display === 'none' ? 'block' : 'none';
            }
        });
    </script>
@endsection
