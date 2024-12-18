
@extends('Admin.layouts.master')
@section('contentAdmin')

    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sherah-breadcrumb mg-top-30">
                                        <h2 class="sherah-breadcrumb__title">Thêm mới tin tức</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                <form class="sherah-wc__form-main" action="{{ route('new.store') }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tiêu đề</label>
                                                            <div class="form-group__input">
                                                                <input type="title" name="title" id="title" class="sherah-wc__form-input" placeholder="Title"
                                @error('title') border-red-500 @enderror value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Nội dung</label>
                                                            <div class="form-group__input">
                                                                <textarea id="content" name="content" rows="3" class="sherah-wc__form-input" placeholder="Content"
                                @error('content') border-red-500 @enderror value="{{ old('content') }}"></textarea>
                                @if ($errors->has('content'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('content') }}</span>
                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Ảnh</label>
                                                            <div class="form-group__input">
                                                                <input type="file" name="image" id="image" class="sherah-wc__form-input" 
                                                                @error('image') border-red-500 @enderror>
                                                                @if ($errors->has('image'))
                                                                    <span class="text-red-500 text-sm">{{ $errors->first('image') }}</span>
                                                                @endif  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                        <button type="submit" class="sherah-btn sherah-btn__primary">Tạo mới tin tức</button>
                                        <button class="sherah-btn sherah-btn__third"><a href="{{route('new.index')}}">Quay lại</a></button>
                                    </div> --}}
                                    <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                        <button type="submit" class="sherah-btn sherah-btn__primary">Lưu tin tức</button>
                                        <a href="{{ route('new.index') }}"
                                            class="sherah-btn sherah-btn__third">Hủy</a>
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