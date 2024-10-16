@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h2 class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">Chỉnh sửa sản phẩm</h2>

    <form action="{{ route('admin-products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-4">
                <h4>Hình ảnh sản phẩm</h4>
                <div id="image-upload-container">
                    @foreach($product->images as $image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" style="max-width: 100%; height: auto;">
                            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Xóa
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label for="images[]" class="form-label">Thêm hình ảnh mới</label>
                        <input type="file" name="images[]" class="form-control" accept="image/*">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-image">Thêm hình ảnh</button>
                <small class="text-muted">Bạn có thể thêm nhiều hình ảnh cho sản phẩm.</small>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá khuyến mãi</label>
                    <input type="number" step="0.01" name="price_sale" id="price_sale" class="form-control" value="{{ $product->price_sale }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Còn hàng</option>
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hết hàng</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sizes" class="form-label">Kích thước</label>
                    @foreach($sizes as $size)
                        <div class="form-check">
                            <input type="checkbox" name="sizes[]" value="{{ $size }}" id="size_{{ $size }}" class="form-check-input" {{ in_array($size, $product->sizes) ? 'checked' : '' }}>
                            <label class="form-check-label" for="size_{{ $size }}">{{ $size }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="colors" class="form-label">Màu sắc</label>
                    @foreach($colors as $color)
                        <div class="form-check">
                            <input type="checkbox" name="colors[]" value="{{ $color }}" id="color_{{ $color }}" class="form-check-input" {{ in_array($color, $product->colors) ? 'checked' : '' }}>
                            <label class="form-check-label" for="color_{{ $color }}">{{ $color }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-image').addEventListener('click', function() {
        const container = document.getElementById('image-upload-container');
        const newImageInput = document.createElement('div');
        newImageInput.className = 'mb-3';
        newImageInput.innerHTML = `
            <label for="images[]" class="form-label">Hình ảnh</label>
            <input type="file" name="images[]" class="form-control" accept="image/*">
        `;
        container.appendChild(newImageInput);
    });
</script>
@endsection