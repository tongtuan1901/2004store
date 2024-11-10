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
                                        <h2 class="sherah-breadcrumb__title">Danh sách khách hàng</h2>
                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    <!-- sherah Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                            <th class="sherah-table__column-1 sherah-table__h1">Tên</th>
                                            <th class="sherah-table__column-8 sherah-table__h12">Thao tác</th> 
                                        </tr> 
                                    </thead>
                                    <tbody class="sherah-table__body">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                    <p class="crany-table__product--number">
                                                        <a href="" class="sherah-color1">{{ $user->name }}</a>
                                                    </p>
                                                </td>
                                                
                                                <td class="sherah-table__column-8 sherah-table__data-8">
                                                    <div class="sherah-table__status__group">
                                                        <a href="{{ route('admin.address.show', ['userId' => $user->id]) }}" class="sherah-table__action sherah-color2 sherah-color2__bg--offset">Danh sách địa chỉ</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
