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
                                        <h2 class="sherah-breadcrumb__title">Thêm mới sản phẩm</h2>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0 container-fluid">
                                <form class="sherah-wc__form-main" action="{{ route('admin-products.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <h4 class="form-title m-0">Thông tin cơ bản</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tiêu đề sản phẩm</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input"
                                                                    placeholder="Mời nhập tên" type="text"
                                                                    name="name">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">

                                                            <label class="sherah-wc__form-label">Giá</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input"
                                                                    placeholder="Mời nhập giá" type="number"
                                                                    name="price">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">

                                                            <label class="sherah-wc__form-label">Giá khuyến mãi</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input"
                                                                    placeholder="Mời nhập giá" type="number"
                                                                    name="price_sale">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">

                                                            <label class="sherah-wc__form-label">Giới thiệu Mô tả</label>
                                                            <div class="form-group__input">
                                                                <textarea class="sherah-wc__form-input" placeholder="Mời nhập mô tả" type="text" name="description"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">

                                                            <label for="category_id" class="sherah-wc__form-label">Danh
                                                                mục</label>
                                                            <select class="form-group__input"
                                                                aria-label="Default select example" name="category_id">
                                                                <option value="">Chọn danh mục</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">

                                                            <label class="sherah-wc__form-label">Thương hiệu</label>
                                                            <select class="form-group__input"
                                                                aria-label="Default select example" name="brand_id">
                                                                <option value="">Chọn thương hiệu</option>
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}">
                                                                        {{ $brand->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Ảnh sản phẩm</label>
                                                            <div class="flex-container">
                                                                <div id="image-preview-container"
                                                                    class="image-preview-container"></div>
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
                                                            <div class="variation mb-3">
                                                                <div
                                                                    class="variation-header d-flex justify-content-between">
                                                                    <h5 class="variation-title">Biến thể 1</h5>
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
                                                                                    <option value="{{ $size->id }}">
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
                                                                                    <option value="{{ $color->id }}">
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
                                                                                class="form-control" required>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="variation[price][]"
                                                                                class="form-label">Giá</label>
                                                                            <input type="number"
                                                                                name="variation[price][]"
                                                                                class="form-control" required>
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
                                                        </div>

                                                        <button type="button" id="add-variation"
                                                            class="btn btn-primary mt-3">Thêm Biến Thể</button>


                                                    </div>
                                                </div>

                                            </div>

                                            <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Lưu sản
                                                    phẩm</button>
                                                <a class="sherah-btn sherah-btn__third"
                                                    href="{{ route('admin-products.index') }}">
                                                    Cancel</a>
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
        const inputFile = document.getElementById('input-img');
        const previewContainer = document.getElementById('image-preview-container');

        inputFile.addEventListener('change', (event) => {
            const files = event.target.files;
            previewContainer.innerHTML = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('uploaded-image');
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });

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
    <style>
        .flex-container {
            display: flex;
            align-items: flex-start;
        }

        .image-preview-container {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding: 10px 0;

            flex: 1;

        }

        .uploaded-image {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .upload-section {
            margin-left: 20px;
        }

        .variation-header {
            display: flex;
            justify-content: space-between;
        }

        .variation-content {
            display: none;
        }
    </style>
@endsection
