@extends('Admin.layouts.master')
@section('contentAdmin')

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
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
                                    <h2 class="sherah-breadcrumb__title">Danh sách khách hàng</h2>
                                </div>
                            </div>
                        </div>
                        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                            <div class="sherah-table p-0">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    <!-- sherah Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                        <th class="sherah-table__column-1 sherah-table__h1">STT</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Họ và tên</th>
                                            <th class="sherah-table__column-2 sherah-table__h2">Email</th>
                                            <th class="sherah-table__column-3 sherah-table__h3">Số điện thoại</th>
                                            <th class="sherah-table__column-4 sherah-table__h4">Mật khẩu</th>
                                            <th class="sherah-table__column-5 sherah-table__h5">Hoạt động</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody class="sherah-table__body">
                                    @foreach ($users as $k => $user)
                                        <tr>
                                          
                                            <td class="sherah-table__column-2 sherah-table__data-2">
                                                <div class="sherah-table__vendor">
                                                    <h4 class="sherah-table__vendor--title"><a
                                                            href='vendor-profile.html'>   {{ ++$k }}</a></h4>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-3 sherah-table__data-3">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $user->name }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-4 sherah-table__data-4">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $user->email }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-5 sherah-table__data-5">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">  {{ $user->phone_number ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">***********</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                            @if($user->trashed())
                    <a href="{{ route('users.restore', $user->id) }}" class="btn btn-success btn-sm">Restore</a>
                @else
                    <!-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a> -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                @endif
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
