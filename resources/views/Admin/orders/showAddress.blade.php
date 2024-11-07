@extends('Admin.layouts.master')
@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <!-- Sherah Breadcrumb -->
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Danh sách địa chỉ của {{$user->name}}</h2>
                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                    <a href="{{ route('admin.address') }}" class="sherah-btn sherah-gbcolor">Quay lại</a>
                                </div>
                            </div>
                            @if($addresses->isEmpty())
                                <p>Không có địa chỉ nào được lưu.</p>
                            @else
                            <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    <!-- sherah Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                            <th class="sherah-table__column-1 sherah-table__h1">Tên</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Số điện thoại</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Xã</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Thành phố/ Tỉnh</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Huyện</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Địa chỉ nhà</th>
                                            {{-- <th class="sherah-table__column-1 sherah-table__h1">Tên</th> --}}
                                        </tr> 
                                    </thead>
                                    <tbody class="sherah-table__body">
                                        @foreach ($addresses as $address)
                                            <tr>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $address->name }}</a>
                                                    </p>
                                                </td>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $address->phone_number }}</a>
                                                    </p>
                                                </td>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $address->street }}</a>
                                                    </p>
                                                </td>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $address->city }}</a>
                                                    </p>
                                                </td>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $address->state }}</a>
                                                    </p>
                                                </td>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $address->house_address }}</a>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
