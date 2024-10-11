@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h2 class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">Thêm sản phẩm mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin-products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <h4>Hình ảnh sản phẩm</h4>
                <div id="image-upload-container">
                    <div class="mb-3">
                        <label for="images[]" class="form-label">Hình ảnh</label>
                        <input type="file" name="images[]" class="form-control" accept="image/*" required>
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá khuyến mãi</label>
                    <input type="number" name="price_sale" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" required>
                        <option value="1">Hết hàng</option>
                        <option value="0">Còn hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sizes" class="form-label">Kích thước</label>
                    @foreach($sizes as $size)
                        <div class="form-check">
                            <input type="checkbox" name="sizes[]" value="{{ $size }}" id="size_{{ $size }}" class="form-check-input">
                            <label class="form-check-label" for="size_{{ $size }}">{{ $size }}</label>
                        </div>
                    @endforeach
                    <small class="text-muted">Bạn có thể chọn nhiều kích thước.</small>
                </div>
                <div class="mb-3">
                    <label for="colors" class="form-label">Màu sắc</label>
                    @foreach($colors as $color)
                        <div class="form-check">
                            <input type="checkbox" name="colors[]" value="{{ $color }}" id="color_{{ $color }}" class="form-check-input">
                            <label class="form-check-label" for="color_{{ $color }}">{{ $color }}</label>
                        </div>
                    @endforeach
                    <small class="text-muted">Bạn có thể chọn nhiều màu sắc.</small>
                </div>
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-image').addEventListener('click', function () {
        const container = document.getElementById('image-upload-container');
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.className = 'form-control mb-3';
        input.accept = 'image/*';
        container.appendChild(input);
    });
</script>
@endsection
