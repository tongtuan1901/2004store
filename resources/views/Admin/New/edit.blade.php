
@extends('admin.layouts.master')
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
                                        <h2 class="sherah-breadcrumb__title">Sửa tin tức</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                <form class="sherah-wc__form-main" action="{{ route('new.update', $model->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Tiêu đề</label>
                                                            <div class="form-group__input">
                                                                <input type="title" name="title" id="title" value="{{$model->title}}"
                                class="sherah-wc__form-input" placeholder="Title">
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
                                                                <textarea id="content" name="content" rows="3" 
                                class="sherah-wc__form-input" placeholder="Content">

                                    {{$model->content}}    
                                </textarea>
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
                                                                <input type="file" name="image" class="sherah-wc__form-input">
                                <img src="{{Storage::url($model->image)}}" alt="" width="50" height="50">
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
                                    {{-- <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                        <button type="submit" class="sherah-btn sherah-btn__primary">Sửa tin tức</button>
                                        <button class="sherah-btn sherah-btn__primary"><a href="{{route('new.index')}}">Quay lại</a></button>
                                    </div> --}}
                                    <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                        <button type="submit" class="sherah-btn sherah-btn__primary">Cập nhật tin tức</button>
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

