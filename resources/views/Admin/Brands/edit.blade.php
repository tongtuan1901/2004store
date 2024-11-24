
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
                                        <h2 class="sherah-breadcrumb__title">Sửa thương hiệu</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0 container-fluid">
                                <form class="sherah-wc__form-main" action="{{ route('admin-brands.update', $brand->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <h4 class="form-title m-0">Thông tin thương hiệu</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tên thương hiệu</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input"
                                                                    placeholder="Mời nhập tên thương hiệu" type="text"
                                                                    name="name" value="{{ $brand->name }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Ảnh thương hiệu</label>
                                                            <div class="flex-container">
                                                                <div id="image-preview-container"
                                                                    class="image-preview-container">
                                                                    @if ($brand->image)
                                                                        <img src="{{ asset('storage/' . $brand->image) }}"
                                                                            class="uploaded-image" alt="Ảnh hiện tại">
                                                                    @endif
                                                                </div>
                                                                <div class="upload-section">
                                                                    <input type="file" name="image" class="btn-check"
                                                                        id="input-img" accept="image/*">
                                                                    <label class="image-upload-label" for="input-img">Tải
                                                                        lên ảnh mới</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Cập nhật
                                                    thương hiệu</button>
                                                <a href="{{ route('admin-brands.index') }}"
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

