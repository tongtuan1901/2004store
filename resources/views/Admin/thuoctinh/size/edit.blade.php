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
                                        <h2 class="sherah-breadcrumb__title">Sửa Kích Thước</h2>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0 container-fluid">
                                <form class="sherah-wc__form-main" action="{{ route('admin-size.update', $size->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <h4 class="form-title m-0">Thông tin Kích Thước</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tên Kích Thước</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input"
                                                                    placeholder="Nhập tên kích thước" type="text"
                                                                    name="size" value="{{ $size->size }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Cập nhật kích
                                                    thước</button>
                                                <a href="{{ route('admin-size.index') }}"
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
@endsection
