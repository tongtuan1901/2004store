
@extends('admin.layouts.master')

@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                                                                @error('name')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
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
                                                                @error('price')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
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
                                                                 @error('price_sale')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">

                                                            <label class="sherah-wc__form-label">Giới thiệu Mô tả</label>
                                                            <div class="form-group__input">
                                                                <textarea class="sherah-wc__form-input" placeholder="Mời nhập mô tả" type="text" name="description"></textarea>
                                                                @error('description')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
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
                                                                                class="form-select">
                                                                                <option value="">Chọn kích thước
                                                                                </option>
                                                                                @foreach ($sizes as $size)
                                                                                    <option value="{{ $size->id }}">
                                                                                        {{ $size->size }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('variation[size][]')
                                                                            <span style="color: red;">{{ $message }}</span>
                                                                        @enderror
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Màu sắc</label>
                                                                            <select name="variation[color][]"
                                                                                class="form-select">
                                                                                <option value="">Chọn màu sắc
                                                                                </option>
                                                                                @foreach ($colors as $color)
                                                                                    <option value="{{ $color->id }}">
                                                                                        {{ $color->color }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('variation[color][]')
                                                                            <span style="color: red;">{{ $message }}</span>
                                                                        @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-md-4">
                                                                            <label for="variation[quantity][]"
                                                                                class="form-label">Số lượng</label>
                                                                            <input type="number"
                                                                                name="variation[quantity][]"
                                                                                class="form-control" value="1">
                                                                                @error('variation[quantity][]')
                                                                                <span style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="variation[price][]"
                                                                                class="form-label">Giá</label>
                                                                            <input type="number"
                                                                                name="variation[price][]"
                                                                                class="form-control" value="0"
                                                                                >
                                                                                @error('variation[price][]')
                                                                                <span style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Hình ảnh biến
                                                                                thể</label>
                                                                            <input type="file"
                                                                                name="variation[image][]"
                                                                                class="form-control" multiple>
                                                                                @error('variation[image][]')
                                                                                <span style="color: red;">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <button type="button" class="remove-variation mt-2">
                                                                        <svg class="sherah-color2__fill"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.247" height="18.252"
                                                                            viewBox="0 0 16.247 18.252">
                                                                            <g id="Icon"
                                                                                transform="translate(-160.007 -18.718)">
                                                                                <path id="Path_484" data-name="Path 484"
                                                                                    d="M185.344,88.136c0,1.393,0,2.786,0,4.179-.006,1.909-1.523,3.244-3.694,3.248q-3.623.007-7.246,0c-2.15,0-3.682-1.338-3.687-3.216q-.01-4.349,0-8.7a.828.828,0,0,1,.822-.926.871.871,0,0,1,1,.737c.016.162.006.326.006.489q0,4.161,0,8.321c0,1.061.711,1.689,1.912,1.69q3.58,0,7.161,0c1.2,0,1.906-.631,1.906-1.695q0-4.311,0-8.622a.841.841,0,0,1,.708-.907.871.871,0,0,1,1.113.844C185.349,85.1,185.343,86.618,185.344,88.136Z"
                                                                                    transform="translate(-9.898 -58.597)" />
                                                                                <path id="Path_485" data-name="Path 485"
                                                                                    d="M164.512,21.131c0-.517,0-.98,0-1.443.006-.675.327-.966,1.08-.967q2.537,0,5.074,0c.755,0,1.074.291,1.082.966.005.439.005.878.009,1.317a.615.615,0,0,0,.047.126h.428c1,0,2,0,3,0,.621,0,1.013.313,1.019.788s-.4.812-1.04.813q-7.083,0-14.165,0c-.635,0-1.046-.327-1.041-.811s.4-.786,1.018-.789C162.165,21.127,163.3,21.131,164.512,21.131Zm1.839-.021H169.9v-.764h-3.551Z"
                                                                                    transform="translate(0 0)" />
                                                                                <path id="Path_486" data-name="Path 486"
                                                                                    d="M225.582,107.622c0,.9,0,1.806,0,2.709a.806.806,0,0,1-.787.908.818.818,0,0,1-.814-.924q0-2.69,0-5.38a.82.82,0,0,1,.81-.927.805.805,0,0,1,.79.9C225.585,105.816,225.582,106.719,225.582,107.622Z"
                                                                                    transform="translate(-58.483 -78.508)" />
                                                                                <path id="Path_487" data-name="Path 487"
                                                                                    d="M266.724,107.63c0-.9,0-1.806,0-2.709a.806.806,0,0,1,.782-.912.818.818,0,0,1,.818.919q0,2.69,0,5.38a.822.822,0,0,1-.806.931c-.488,0-.792-.356-.794-.938C266.721,109.411,266.724,108.521,266.724,107.63Z"
                                                                                    transform="translate(-97.561 -78.509)" />
                                                                            </g>
                                                                        </svg></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" id="add-variation"
                                                            class="sherah-btn sherah-btn__primary">Thêm Biến Thể</button>


                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Lưu sản phẩm
                                                </button>
                                                <a href="{{ route('admin-products.index') }}"
                                                    class="sherah-btn sherah-btn__third">Hủy</a>
                                            </div>
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
