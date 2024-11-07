@extends('admin.layouts.master')

@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <div class="sherah-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sherah-breadcrumb mg-top-30">
                                        <h2 class="sherah-breadcrumb__title">Chỉnh sửa sản phẩm</h2>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0 container-fluid">
                                <form class="sherah-wc__form-main"
                                    action="{{ route('admin-products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Product Info -->
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <h4 class="form-title m-0">Thông tin cơ bản</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tiêu đề sản phẩm</label>
                                                            <input class="sherah-wc__form-input" placeholder="Mời nhập tên"
                                                                type="text" name="name"
                                                                value="{{ old('name', $product->name) }}" required>
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Giá</label>
                                                            <input class="sherah-wc__form-input" placeholder="Mời nhập giá"
                                                                type="number" name="price"
                                                                value="{{ old('price', $product->price) }}" required>
                                                            @error('price')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Giá khuyến mãi</label>
                                                            <input class="sherah-wc__form-input" placeholder="Mời nhập giá"
                                                                type="number" name="price_sale"
                                                                value="{{ old('price_sale', $product->price_sale) }}">
                                                            @error('price_sale')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Giới thiệu Mô tả</label>
                                                            <textarea class="sherah-wc__form-input" placeholder="Mời nhập mô tả" name="description" required>{{ old('description', $product->description) }}</textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="category_id" class="sherah-wc__form-label">Danh
                                                                mục</label>
                                                            <select class="form-group__input" name="category_id" required>
                                                                <option value="">Chọn danh mục</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Thương hiệu</label>
                                                            <select class="form-group__input" name="brand_id" required>
                                                                <option value="">Chọn thương hiệu</option>
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}"
                                                                        {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                                        {{ $brand->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Ảnh sản phẩm</label>
                                                            <div class="flex-container">
                                                                <div id="image-preview-container"
                                                                    class="image-preview-container">
                                                                    @foreach ($product->images as $image)
                                                                        <img src="{{ asset($image->path) }}"
                                                                            class="uploaded-image" alt="Product Image">
                                                                    @endforeach
                                                                </div>
                                                                <div class="upload-section">
                                                                    <input type="file" name="images[]" class="btn-check"
                                                                        id="input-img" multiple accept="image/*">
                                                                    <label class="image-upload-label" for="input-img">Upload
                                                                        Images</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-3">Biến thể sản phẩm</h4>
                                                        <div id="variations-container">
                                                            @foreach ($product->variations as $index => $variation)
                                                                <div class="variation mb-3">
                                                                    <div
                                                                        class="variation-header d-flex justify-content-between">
                                                                        <h5 class="variation-title">Biến thể
                                                                            {{ $index + 1 }}</h5>
                                                                        <button type="button"
                                                                            class="btn btn-link toggle-variation">
                                                                            <i class="fas fa-chevron-down"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="variation-content">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Kích thước</label>
                                                                                <select name="variation[size][]"
                                                                                    class="form-select" required>
                                                                                    <option value="">Chọn kích thước
                                                                                    </option>
                                                                                    @foreach ($sizes as $size)
                                                                                        <option
                                                                                            value="{{ $size->id }}"
                                                                                            {{ $variation->size_id == $size->id ? 'selected' : '' }}>
                                                                                            {{ $size->size }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Màu sắc</label>
                                                                                <select name="variation[color][]"
                                                                                    class="form-select" required>
                                                                                    <option value="">Chọn màu sắc
                                                                                    </option>
                                                                                    @foreach ($colors as $color)
                                                                                        <option
                                                                                            value="{{ $color->id }}"
                                                                                            {{ $variation->color_id == $color->id ? 'selected' : '' }}>
                                                                                            {{ $color->color }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-4">
                                                                                <label for="variation[quantity][]"
                                                                                    class="form-label">Số lượng</label>
                                                                                <input type="number"
                                                                                    name="variation[quantity][]"
                                                                                    class="form-control"
                                                                                    value="{{ $variation->quantity }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label for="variation[price][]"
                                                                                    class="form-label">Giá</label>
                                                                                <input type="number"
                                                                                    name="variation[price][]"
                                                                                    class="form-control"
                                                                                    value="{{ $variation->price }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Hình ảnh biến
                                                                                    thể</label>
                                                                                <input type="file"
                                                                                    name="variation[image][]"
                                                                                    class="form-control" multiple>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button"
                                                                            class="btn btn-danger remove-variation mt-2">Xóa
                                                                            biến thể</button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button type="button" id="add-variation"
                                                            class="btn btn-primary mt-3">Thêm Biến Thể</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                            <button type="submit" class="sherah-btn sherah-btn__primary">Cập nhật sản
                                                phẩm</button>
                                            <a href="{{ route('admin-products.index') }}"
                                                class="sherah-btn sherah-btn__secondary">Hủy</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('add-variation').addEventListener('click', function() {
            const container = document.getElementById('variations-container');
            const variationCount = container.children.length + 1;

            const variationHTML = `
            <div class="variation mb-3">
                <div class="variation-header d-flex justify-content-between">
                    <h5 class="variation-title">Biến thể ${variationCount}</h5>
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
        `;
            container.insertAdjacentHTML('beforeend', variationHTML);
        });

        document.getElementById('variations-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variation')) {
                e.target.closest('.variation').remove();
            }
        });
    </script>
@endsection
