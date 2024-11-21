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
                                    <h2 class="sherah-breadcrumb__title">Danh sách liên hệ</h2>
                                </div>
                            </div>
                        </div>
                        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                            <div class="sherah-table p-0">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    <!-- sherah Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                            <th class="sherah-table__column-1 sherah-table__h1">Stt</th>
                                            <th class="sherah-table__column-2 sherah-table__h2">Họ và tên</th>
                                            <th class="sherah-table__column-3 sherah-table__h3">Số điện thoại</th>
                                            <th class="sherah-table__column-4 sherah-table__h4">Email</th>
                                            <th class="sherah-table__column-5 sherah-table__h5">Nội dung</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sherah-table__body">
                                        @foreach ($contact as $index => $item)
                                            <tr>
                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                    <div class="sherah-table__product-content">
                                                        <p class="sherah-table__product-desc">{{ $index + 1 }}</p>
                                                    </div>
                                                </td>
                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                    <div class="sherah-table__product-content">
                                                        <p class="sherah-table__product-desc">{{ $item->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                    <div class="sherah-table__product-content">
                                                        <p class="sherah-table__product-desc">{{ $item->phone }}</p>
                                                    </div>
                                                </td>
                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                    <div class="sherah-table__product-content">
                                                        <p class="sherah-table__product-desc">{{ $item->email }}</p>
                                                    </div>
                                                </td>
                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                    <div class="sherah-table__product-content">
                                                        <p class="sherah-table__product-desc">{{ $item->message }}</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>


        </div>
    </div>
</section>
@endsection
