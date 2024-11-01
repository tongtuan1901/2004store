@extends('Admin1.layouts.master')
@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
<<<<<<< HEAD
                    





=======
                    <div class="sherah-dsinner">
                        <div class="row mg-top-30">
                            <div class="col-12 sherah-flex-between">
                                <!-- Sherah Breadcrumb -->
                                <div class="sherah-breadcrumb">
                                    <h2 class="sherah-breadcrumb__title">Danh sách đánh giá</h2>
                                    
                                </div>
                                <!-- End Sherah Breadcrumb -->
                                {{-- <a href="{{ route('discount.create') }}" class="sherah-btn sherah-gbcolor">Thêm mã giảm giá</a> --}}
                            </div>
                        </div>
                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                            <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                <!-- sherah Table Head -->
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1 sherah-table__h1">id</th>
                                        <th class="sherah-table__column-2 sherah-table__h2">Tên sản phẩm</th>
                                        <th class="sherah-table__column-2 sherah-table__h2">Tên khách hàng</th>
                                        <th class="sherah-table__column-3 sherah-table__h3">Số sao</th>
                                        <th class="sherah-table__column-4 sherah-table__h4">Đánh giá</th>
                                        <th class="sherah-table__column-5 sherah-table__h5">Ngày đánh giá</th>
                                        <th class="sherah-table__column-6 sherah-table__h6">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body">
                                    @foreach($reviews as $review)
                                    <tr>
                                        <td class="sherah-table__column-1 sherah-table__data-1">
                                            <div class="sherah-language-form__input">
                                                <p class="crany-table__product--number">{{$review->id}}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-2 sherah-table__data-2">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">{{$review->product->name}}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-3 sherah-table__data-3">
                                            <div class="sherah-table__product-content">
                                                <div
                                                    class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">
                                                    {{$review->user->name}}</div>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">{{$review->rating}}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-5 sherah-table__data-5">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">{{ \Illuminate\Support\Str::limit($review->comment, 50) }}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-6 sherah-table__data-6">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">{{ $review->created_at->format('d-m-Y') }}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-7 sherah-table__data-7">
                                            <div class="sherah-table__status__group">
                                                <a href="{{ route('admin.reviews.show', $review->id) }}"    
                                                    class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path d="M12 4.5C7.5 4.5 3.7 8 2 12c1.7 4 5.5 7.5 10 7.5s8.3-3.5 10-7.5c-1.7-4-5.5-7.5-10-7.5zm0 13c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z" fill="#333"/>
                                                    </svg>                                                    
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
>>>>>>> 0bd7d0e9e95ad7355468b853abc3da75a62e8448
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection