@extends('Admin.layouts.master')
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
                            <div class="container-fluid">
                                <form action="{{ route('admin-banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-light mb-3">
                                                <div class="card-body">
                                                    <!-- Title Input -->
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Tiêu đề</label>
                                                        <input type="text" name="title" id="title" value="{{ old('title', $banner['title']) }}"
                                                               class="form-control @error('title') is-invalid @enderror" placeholder="Mời nhập tiêu đề banner">
                                                        @error('title')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Content Input -->
                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Nội dung</label>
                                                        <textarea id="content" name="content" rows="3"
                                                                  class="form-control @error('content') is-invalid @enderror" placeholder="Mời nhập nội dung banner">{{ old('content', $banner['content']) }}</textarea>
                                                        @error('content')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Image Input -->
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Hình ảnh</label>
                                                        @if ($banner->image)
                                                            <img src="{{ asset('storage/' . $banner->image) }}" class="img-thumbnail mb-3" style="max-height: 150px; max-width: 150px;" alt="Ảnh hiện tại">
                                                        @else
                                                            <p>Không có ảnh hiện tại</p>
                                                        @endif
                                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                                        @error('image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Submit and Cancel Buttons -->
                                                    <div
                                                    class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                    <button type="submit" class="sherah-btn sherah-btn__primary">Cập nhật banner</button>
                                                    <a class="sherah-btn sherah-btn__third"
                                                        href="{{ route('admin-banners.index') }}">
                                                        Cancel
                                                    </a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div><!--end page-wrapper-->
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
