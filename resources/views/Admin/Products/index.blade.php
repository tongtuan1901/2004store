@extends('Admin.layouts.master')
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
                                        <h2 class="sherah-breadcrumb__title">Danh sách sản phẩm</h2>
                                    </div>

                                </div>
                                <div style="display: flex; justify-content: flex-end;">
                                    <a href="{{ route('admin-products.create') }}" class="sherah-btn sherah-gbcolor">Add
                                        New</a>
                                </div>

                            </div>
                            <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                                <div class="sherah-table p-0">
                                    <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                        <thead class="sherah-table__head">
                                            <tr>
                                                <th class="sherah-table__column-1 sherah-table__h1">STT</th>
                                                <th class="sherah-table__column-2 sherah-table__h2"> Sản phẩm & Tiêu đề</th>
                                                <th class="sherah-table__column-3 sherah-table__h3">Hình ảnh </th>
                                                <th class="sherah-table__column-4 sherah-table__h4">Danh mục </th>
                                                <th class="sherah-table__column-8 sherah-table__h7">Thương hiệu</th>
                                                <th class="sherah-table__column-3 sherah-table__h3">Tình trạng kho </th>
                                                <th class="sherah-table__column-5 sherah-table__h5">Thuộc tính</th>
                                                <th class="sherah-table__column-7 sherah-table__h6">Giá </th>
                                                <th class="sherah-table__column-9 sherah-table__h8">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sherah-table__body">
                                            @forelse ($listProducts as $key => $product)
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product">
                                                            {{ $key + 1 }}
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__vendor">
                                                            <h4 class="sherah-table__vendor--title">{{ $product->name }}
                                                            </h4>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            @if ($product->images->isNotEmpty())
                                                                <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                                                    alt="{{ $product->name }}"
                                                                    style="width: 100px; height: auto;">
                                                            @else
                                                                <img src="{{ asset('path/to/default/image.png') }}"
                                                                    alt="Hình ảnh không có"
                                                                    style="width: 100px; height: auto;">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <h5>{{ $product->category ? $product->category->name : 'Không có danh mục' }}
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <h5>{{ $product->brand ? $product->brand->name : 'Không có thương hiệu' }}
                                                            </h5>

                                                        </div>
                                                    </td>

                                                    <td class="sherah-table__column-6 sherah-table__data-6">
                                                        <div class="sherah-table__product-content">
                                                            <span
                                                                class="{{ $product->status == 0 ? 'bg-green-600/5 text-green-600' : 'bg-red-600/5 text-red-600' }} text-[11px] font-medium px-2.5 py-0.5 rounded h-5">
                                                                {{ $product->status == 0 ? 'Tồn hàng' : 'Hết hàng' }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-7 sherah-table__data-7">
                                                        <div class="sherah-table__product-content">
                                                            <div>
                                                                {{ $product->variations->count() }} biến thể<br>
                                                                @if ($product->variations->isEmpty())
                                                                    Không có biến thể nào.
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="sherah-table__column-6 sherah-table__data-6">
                                                        <div class="sherah-table__product-content">
                                                            {{ number_format($product->price_sale, 0, ',', '.') }} vnd
                                                            <del class="text-slate-500 font-normal">{{ number_format($product->price, 0, ',', '.') }}
                                                                vnd</del>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-8 sherah-table__data-8">
                                                        <div class="sherah-table__status__group">
                                                            <!-- Sửa -->
                                                            <a href="{{ route('admin-products.edit', $product->id) }}"
                                                                class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
                                                                <svg class="sherah-color3__fill"
                                                                    xmlns="http://www.w3.org/2000/svg" width="18.29"
                                                                    height="18.252" viewBox="0 0 18.29 18.252">
                                                                    <g id="Group_132" data-name="Group 132"
                                                                        transform="translate(-234.958 -37.876)">
                                                                        <path id="Path_481" data-name="Path 481"
                                                                            d="M242.545,95.779h-5.319a2.219,2.219,0,0,1-2.262-2.252c-.009-1.809,0-3.617,0-5.426q0-2.552,0-5.1a2.3,2.3,0,0,1,2.419-2.419q2.909,0,5.818,0c.531,0,.87.274.9.715a.741.741,0,0,1-.693.8c-.3.026-.594.014-.892.014q-2.534,0-5.069,0c-.7,0-.964.266-.964.976q0,5.122,0,10.245c0,.687.266.955.946.955q5.158,0,10.316,0c.665,0,.926-.265.926-.934q0-2.909,0-5.818a.765.765,0,0,1,.791-.853.744.744,0,0,1,.724.808c.007,1.023,0,2.047,0,3.07s.012,2.023-.006,3.034A2.235,2.235,0,0,1,248.5,95.73a1.83,1.83,0,0,1-.458.048Q245.293,95.782,242.545,95.779Z"
                                                                            transform="translate(0 -39.652)"
                                                                            fill="#09ad95" />
                                                                    </g>
                                                                </svg>
                                                            </a>

                                                            <form
                                                                action="{{ route('admin-products.destroy', $product->id) }}"
                                                                method="post" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="sherah-table__action sherah-color2"
                                                                    style="border: none; background: none;"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                                                                    <svg class="sherah-color2__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="16.247"
                                                                        height="18.252" viewBox="0 0 16.247 18.252">
                                                                        <g id="Icon"
                                                                            transform="translate(-160.007 -18.718)">
                                                                            <path id="Path_484" data-name="Path 484"
                                                                                d="M185.344,88.136c0,1.393,0,2.786,0,4.179-.006,1.909-1.523,3.244-3.694,3.248q-3.623.007-7.246,0c-2.15,0-3.682-1.338-3.687-3.216q-.01-4.349,0-8.7a.828.828,0,0,1,.822-.926.871.871,0,0,1,1,.737c.016.162.006.326.006.489q0,4.161,0,8.321c0,1.061.711,1.689,1.912,1.69q3.58,0,7.161,0c1.2,0,1.906-.631,1.906-1.695q0-4.311,0-8.622a.841.841,0,0,1,.708-.907.871.871,0,0,1,1.113.844C185.349,85.1,185.343,86.618,185.344,88.136Z"
                                                                                transform="translate(-9.898 -58.597)" />
                                                                            <path id="Path_485" data-name="Path 485"
                                                                                d="M164.512,21.131c0-.517,0-.98,0-1.443.006-.675.327-.966,1.08-.967q2.537,0,5.074,0c.755,0,1.074.291,1.082.966.005.439.005.878.009,1.317a.615.615,0,0,0,.047.126h.428c1,0,2,0,3,0,.621,0,1.013.313,1.019.788s-.4.812-1.04.813q-7.083,0-14.165,0c-.635,0-1.046-.327-1.041-.811s.4-.786,1.018-.789C162.165,21.127,163.3,21.131,164.512,21.131Zm1.839-.021H169.9v-.764h-3.551Z"
                                                                                transform="translate(0 0)" />
                                                                            <path id="Path_486" data-name="Path 486"
                                                                                d="M225.582,107.622c0,.9,0,1.806,0,2.709a.806.806,0,0,1-.787.908.818.818,0,0,1-.814-.924q0-2.69,0-5.38a.82.82,0,0,1,.81-.927.805.805,0,0,1,.79.9C225.585,105.816,225.582,106.719,225.582,107.622Z"
                                                                                transform="translate(-58.483 -78.508)" />
                                                                            <path id="Path_487" data-name="Path 487"
                                                                                d="M266.724,107.63c0-.9,0-1.806,0-2.709a.806.806,0,0,1,.782-.912.818.818,0,0,1,.818.919q0,2.69,0,5.38a.822.822,0,0,1-.806.931c-.488,0-.792-.356-.794-.938C266.721,109.411,266.724,108.521,266.724,107.63Z"
                                                                                transform="translate(-97.561 -78.509)" />
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                            </form>

                                                            <a href="{{ route('admin-products.show', $product->id) }}"
                                                                class="sherah-table__action sherah-color2 sherah-color2__bg--offset">
                                                                <svg class="sherah-color2__fill"
                                                                    xmlns="http://www.w3.org/2000/svg" width="18"
                                                                    height="18" viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12 2a10 10 0 0 1 10 10c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0-2C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm-.5 17h-1v-1h1v1zm1-12h-2v6h2V5z"
                                                                        fill="#09ad95" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>


                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="9" class="p-3 text-center text-gray-500">Không có sản
                                                        phẩm
                                                        nào được tìm thấy.</td>
                                                </tr>
                                            @endforelse
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
