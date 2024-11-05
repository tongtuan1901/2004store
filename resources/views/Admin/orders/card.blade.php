@extends('Admin.layouts.master')

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
                                    <h2 class="sherah-breadcrumb__title">Danh sách giỏ hàng</h2>
                                </div>
                            </div>
                        </div>

                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                            <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1">ID Giỏ Hàng</th>
                                        <th class="sherah-table__column-2">Session ID</th>
                                        <th class="sherah-table__column-3">Tên Sản Phẩm</th>
                                        <th class="sherah-table__column-4">Tên Biến Thể</th>
                                        <th class="sherah-table__column-5">Ảnh Biến Thể</th>
                                        <th class="sherah-table__column-6">Tên Người Dùng</th>
                                        <th class="sherah-table__column-7">Số Lượng</th>
                                        <th class="sherah-table__column-8">Ngày Tạo</th>
                                        <th class="sherah-table__column-9">Ngày Cập Nhật</th>
                                    </tr>
                                </thead>

                                <tbody class="sherah-table__body">
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="sherah-table__column-1">{{ $cart->id }}</td>
                                            <td class="sherah-table__column-2">{{ $cart->session_id }}</td>
                                            <td class="sherah-table__column-3">
                                                @if ($cart->product)
                                                    {{ $cart->product->name ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="sherah-table__column-4">
                                            @if ($cart->variation)
                                                    {{ $cart->variation->size->size ?? 'N/A' }} / {{ $cart->variation->color->color ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="sherah-table__column-5">
                                                @if ($cart->variation && $cart->variation->image)
                                                    <img src="{{ asset('storage/' . $cart->variation->image->image_path ?? '') }}" alt="{{ $cart->variation->variation_code ?? 'N/A' }}" style="width: 50px; height: auto;">
                                                @else
                                                    <span>N/A</span>
                                                @endif
                                            </td>
                                            <td class="sherah-table__column-6">{{ $cart->user->name ?? 'N/A' }}</td>
                                            <td class="sherah-table__column-7">{{ $cart->quantity }}</td>
                                            <td class="sherah-table__column-8">{{ $cart->created_at }}</td>
                                            <td class="sherah-table__column-9">{{ $cart->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
