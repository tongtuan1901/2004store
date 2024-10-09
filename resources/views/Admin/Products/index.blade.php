@extends('Admin/layouts/master/master')
@section('content')
    <div class="w-full relative mb-4">
        <div class="flex-auto p-0 md:p-4">
            <div class="flex flex-wrap gap-4 mb-3">
                <div class="mb-2 w-44">
                    <select id="Category"
                        class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                        <option class="dark:text-slate-700">Tất cả danh mục</option>
                        <option class="dark:text-slate-700">Áo</option>
                        <option class="dark:text-slate-700">Quần</option>
                    </select>
                </div>
                <div class="ms-auto">
                    <form>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i data-lucide="search" class="z-[1] w-5 h-5 stroke-slate-400"></i>
                            </div>
                            <input type="search" id="productSearch"
                                class="form-input w-52 rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 pl-10 p-2.5"
                                placeholder="search">
                        </div>
                    </form>
                </div>
                <div>
                    <button class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white  text-md font-medium py-2 px-4 rounded">
                        <a class="btn" style="color: white" href="{{ route('admin-products.create') }}"> Thêm sản phẩm</a>
                    </button>
                </div>
            </div>
            <div id="myTabContent">
                <div class="active  p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
                    aria-labelledby="all-tab">
                    <div class="grid grid-cols-1 p-0 md:p-4">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-slate-700/20">
                                        <tr>
                                            <th scope="col" class="p-3">
                                                <label class="custom-label">
                                                    <div
                                                        class="bg-white dark:bg-slate-600/40 border border-slate-200 dark:border-slate-600 rounded w-5 h-5  inline-block  text-center -mb-[5px]">
                                                        <input type="checkbox" class="hidden">
                                                        <i
                                                            class="icofont-verification-check hidden text-ms text-brand-500 dark:text-slate-200 leading-5"></i>
                                                    </div>
                                                </label>
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                STT
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Sản phẩm & tiêu đề
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Thể loại
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Tình trạng kho
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Thuộc tính
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Giá
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Hoat động
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- 1 -->
                                        @foreach ($listProducts as $k => $product)
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                                <td class="w-4 p-4">
                                                    <label class="custom-label">
                                                        <div
                                                            class="bg-white dark:bg-slate-600/40 border border-slate-200 dark:border-slate-600 rounded w-5 h-5  inline-block  text-center -mb-[5px]">
                                                            <input type="checkbox" class="hidden">
                                                            <i
                                                                class="icofont-verification-check hidden text-ms text-brand-500 dark:text-slate-200 leading-5"></i>
                                                        </div>
                                                    </label>
                                                </td>
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        {{ ++$k }}
                                                    </div>
                                                </td>
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        <img src="{{ Storage::url($product->image) }}" alt=""
                                                            class="me-2 h-8 inline-block">
                                                        <div class="self-center">
                                                            <h5
                                                                class="text-sm font-semibold text-slate-700 dark:text-gray-400">
                                                                {{ $product->name }}</h5>
                                                            <span class="block  font-medium text-slate-500">Size-04-15
                                                                (Model
                                                                2023)
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <h5>{{ $product->category_name }}</h5>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <span
                                                        class="bg-green-600/5 text-green-600 text-[11px] font-medium px-2.5 py-0.5 rounded h-5">
                                                        @if ($product->status == 0)
                                                            Tồn hàng
                                                        @elseif($product->status == 1)
                                                            Hết hàng
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <div>color :
                                                        <span class="ms-2">
                                                            <i class="icofont-brand-mts text-purple-500"></i>
                                                            <i class="icofont-brand-mts text-pink-500"></i>
                                                            <i class="icofont-brand-mts text-blue-500"></i>
                                                            <i class="icofont-brand-mts text-green-500"></i>
                                                        </span>
                                                    </div>
                                                    <div>Size :
                                                        <span class="ms-2">S</span>
                                                        <span class="mx-1">M</span>
                                                        <span class="mx-1">L</span>
                                                        <span class="mx-1">XL</span>
                                                        <span class="mx-1">XXL</span>
                                                    </div>
                                                </td>
                                                <td class="p-3 font-semibold text-lg text-gray-800 whitespace-nowrap dark:text-gray-400">
                                                    {{ $product->price_sale }}vnd <del
                                                        class="text-slate-500 font-normal">{{ $product->price }}vnd</del>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <a href="{{route('admin-products.edit',$product->id)}}"><i class="icofont-ui-edit text-lg text-gray-500 dark:text-gray-400">Sửa</i></a>
                                                    <form action="{{ route('admin-products.destroy',$product->id) }}"
                                                        method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button ><i class="icofont-ui-delete text-lg text-red-500 dark:text-red-400">Xoá</i>
                                                        </button> 
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- 2 -->

                                    </tbody>
                                </table>
                            </div><!--end div-->
                        </div><!--end div-->
                    </div><!--end grid-->
                </div>
            </div>
        </div><!--end card-body-->
    </div><!--end card-->
    </div><!--end col-->
    </div> <!--e  qnd grid-->
@endsection
