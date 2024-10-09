@extends('Admin/layouts/master/master')
@section('content')
<div class="container">
    <form action="{{ route('admin-products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <h4>Hình ảnh sản phẩm</h4>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh chính</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="gallery_images_one" class="form-label">Ảnh Gallery 1</label>
                    <input type="file" name="gallery_images_one" id="gallery_images_one" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="gallery_images_two" class="form-label">Ảnh Gallery 2</label>
                    <input type="file" name="gallery_images_two" id="gallery_images_two" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="gallery_images_three" class="form-label">Ảnh Gallery 3</label>
                    <input type="file" name="gallery_images_three" id="gallery_images_three" class="form-control" accept="image/*">
                </div>
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
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá khuyến mãi</label>
                    <input type="number" step="0.01" name="price_sale" id="price_sale" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select">
                        <option value="0">Tồn hàng</option>
                        <option value="1">Hết hàng</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
        </div>
    </form>
</div>
@endsection
