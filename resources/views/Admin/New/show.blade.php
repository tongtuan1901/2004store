@extends('admin.layouts.master')

@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <div class="sherah-dsinner">
                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Chi tiết sản phẩm</h2>
                                    </div>

                                </div>
                            </div>

                            <div class="product-detail-body sherah-default-bg sherah-border mg-top-30">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <div class="product-gallery">
                                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <img src="{{Storage::url($new->image)}}" class="d-block w-100" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="product-detail-body__content">
                                            <h2 class="product-detail-body__title">{{ $new->title }}</h2>
                                            <div class="product-detail-body__text">{!! nl2br(e($new->content)) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
