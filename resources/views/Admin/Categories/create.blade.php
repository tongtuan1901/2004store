
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
                                        <h2 class="sherah-breadcrumb__title">Thêm mới danh mục</h2>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0 container-fluid">
                                <form class="sherah-wc__form-main" action="{{ route('admin-categories.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <h4 class="form-title m-0">Thông tin danh mục</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tên danh mục</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input"
                                                                    placeholder="Mời nhập tên danh mục" type="text"
                                                                    name="name" >
                                                                    @error('name')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Ảnh danh mục</label>
                                                            <div class="flex-container">
                                                                <div id="image-preview-container"
                                                                    class="image-preview-container"></div>
                                                                <div class="upload-section">
                                                                    <input type="file" name="image" class="btn-check"
                                                                        id="input-img" accept="image/*" >
                                                                    <label class="image-upload-label" for="input-img">Tải
                                                                        lên ảnh</label>
                                                                        @error('image')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Lưu danh
                                                    mục</button>
                                                <a href="{{ route('admin-categories.index') }}"
                                                    class="sherah-btn sherah-btn__third">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Preview uploaded images
        const inputFile = document.getElementById('input-img');
        const previewContainer = document.getElementById('image-preview-container');

        inputFile.addEventListener('change', (event) => {
            const file = event.target.files[0];
            previewContainer.innerHTML = ''; // Clear previous images

            if (file) {
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
    </style>
@endsection

