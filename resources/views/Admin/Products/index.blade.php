@extends('Admin/layouts/master/master')

@section('content')
<<<<<<< HEAD
<div class="w-full relative mb-4">
    <div class="flex-auto p-0 md:p-4">
        <div class="flex flex-wrap gap-4 mb-3">
        <form action="{{ route('admin-products.index') }}" method="GET" class="flex items-center w-full mb-4">
    <div class="mb-2 w-1/4 flex flex-col">
        <label for="category" class="form-label">Danh mục</label>
        <select id="category" name="category_id" class="form-select">
            <option value="">Tất cả danh mục</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }} class="dark:text-slate-700">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-2 w-1/4 flex flex-col">
        <label for="price_range" class="form-label">Khoảng giá</label>
        <select id="price_range" name="price_range" class="form-select">
            <option value="">Tất cả khoảng giá</option>
            <option value="0-100000" {{ request('price_range') === '0-100000' ? 'selected' : '' }}>0đ - 100k</option>
            <option value="100000-500000" {{ request('price_range') === '100000-500000' ? 'selected' : '' }}>100k - 500k</option>
            <option value="500000+" {{ request('price_range') === '500000+' ? 'selected' : '' }}>Trên 500k</option>
        </select>
    </div>

    <div class="mb-2 w-1/4 flex flex-col">
    <label for="productSearch" class="form-label">Tìm kiếm sản phẩm</label>
    <div class="relative">
        <input type="search" id="productSearch" name="search" class="form-input pl-10" placeholder="Tìm kiếm sản phẩm" value="{{ request('search') }}">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i data-lucide="search" class="z-[1] w-5 h-5 stroke-slate-400"></i>
        </div>
    </div>
</div>

    <button type="submit" class="ml-2 inline-block bg-brand-500 text-white hover:bg-brand-600 text-md font-medium py-2 px-4 rounded">
        Tìm kiếm
    </button>

   
</form>

            <div>
                <a href="{{ route('admin-products.create') }}" class="inline-block bg-brand-500 text-white hover:bg-brand-600 text-md font-medium py-2 px-4 rounded">
                    Thêm sản phẩm
                </a>
            </div>
        </div>

        <div id="myTabContent">
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="grid grid-cols-1 p-0 md:p-4">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                            <table class="w-full">
                                <thead class="bg-gray-50 dark:bg-slate-700/20">
                                    <tr>
                                        <th scope="col" class="p-3">
                                            <label class="custom-label">
                                                <div class="bg-white dark:bg-slate-600/40 border border-slate-200 dark:border-slate-600 rounded w-5 h-5 inline-block text-center -mb-[5px]">
                                                    <input type="checkbox" class="hidden">
                                                    <i class="icofont-verification-check hidden text-ms text-brand-500 dark:text-slate-200 leading-5"></i>
                                                </div>
                                            </label>
                                        </th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">STT</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Sản phẩm & Tiêu đề</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Hình ảnh</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Thể loại</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Tình trạng kho</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Thuộc tính</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Giá</th>
                                        <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listProducts as $product)
                                        <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                            <td class="w-4 p-4">
                                                <label class="custom-label">
                                                    <div class="bg-white dark:bg-slate-600/40 border border-slate-200 dark:border-slate-600 rounded w-5 h-5 inline-block text-center -mb-[5px]">
                                                        <input type="checkbox" class="hidden">
                                                        <i class="icofont-verification-check hidden text-ms text-brand-500 dark:text-slate-200 leading-5"></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
    <h5 class="text-truncate" style="max-width: 150px;">{{ $product->name }}</h5>
</td>
                                            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                @if($product->images->isNotEmpty())
                                                    <img src="{{ Storage::url($product->images->first()->image_path) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                                                @else
                                                    <img src="{{ asset('path/to/default/image.png') }}" alt="Hình ảnh không có" style="width: 100px; height: auto;">
                                                @endif
                                            </td>
                                            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                <h5>{{ $product->category ? $product->category->name : 'Không có danh mục' }}</h5>
                                            </td>
                                            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                <span class="{{ $product->status == 0 ? 'bg-green-600/5 text-green-600' : 'bg-red-600/5 text-red-600' }} text-[11px] font-medium px-2.5 py-0.5 rounded h-5">
                                                    {{ $product->status == 0 ? 'Tồn hàng' : 'Hết hàng' }}
                                                </span>
                                            </td>
                                            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                <div>
                                                    <strong>Kích thước:</strong> {{ implode(', ', explode(',', $product->sizes)) }}
                                                </div>
                                                <div>
                                                    <strong>Màu sắc:</strong> {{ implode(', ', explode(',', $product->colors)) }}
                                                </div>
                                            </td>
                                            <td class="p-3 font-semibold text-lg text-gray-800 whitespace-nowrap dark:text-gray-400">
                                                {{ number_format($product->price_sale, 0, ',', '.') }} vnd <del class="text-slate-500 font-normal">{{ number_format($product->price, 0, ',', '.') }} vnd</del>
                                            </td>
                                            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                <a href="{{ route('admin-products.edit', $product->id) }}" class="text-lg text-gray-500 dark:text-gray-400">Sửa</a>
                                                <form action="{{ route('admin-products.destroy', $product->id) }}" method="post" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-lg text-red-500 dark:text-red-400" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                                                        Xoá
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin-products.show', $product->id) }}" class="text-lg text-gray-500 dark:text-gray-400">Chi tiết</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="p-3 text-center text-gray-500">Không có sản phẩm nào được tìm thấy.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                {{ $listProducts->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


<!-- @section('content')


    <div class="w-full relative mb-4">
        <div class="flex-auto p-0 md:p-4">
            <div class="flex flex-wrap gap-4 mb-3">
                <form action="{{ route('admin-products.index') }}" method="GET" class="flex items-center w-full mb-4">
                    <div class="mb-2 w-1/4 flex flex-col">
                        <label for="category" class="form-label">Danh mục</label>
                        <select id="category" name="category_id" class="form-select">
                            <option value="">Tất cả danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}
                                    class="dark:text-slate-700">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2 w-1/4 flex flex-col">
                        <label for="price_range" class="form-label">Khoảng giá</label>
                        <select id="price_range" name="price_range" class="form-select">
                            <option value="">Tất cả khoảng giá</option>
                            <option value="0-100000" {{ request('price_range') === '0-100000' ? 'selected' : '' }}>0đ - 100k
                            </option>
                            <option value="100000-500000"
                                {{ request('price_range') === '100000-500000' ? 'selected' : '' }}>100k - 500k</option>
                            <option value="500000+" {{ request('price_range') === '500000+' ? 'selected' : '' }}>Trên 500k
                            </option>
                        </select>
                    </div>

                    <div class="mb-2 w-1/4 flex flex-col">
                        <label for="productSearch" class="form-label">Tìm kiếm sản phẩm</label>
                        <div class="relative">
                            <input type="search" id="productSearch" name="search" class="form-input pl-10"
                                placeholder="Tìm kiếm sản phẩm" value="{{ request('search') }}">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i data-lucide="search" class="z-[1] w-5 h-5 stroke-slate-400"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="ml-2 inline-block bg-brand-500 text-white hover:bg-brand-600 text-md font-medium py-2 px-4 rounded">
                        Tìm kiếm
                    </button>


                </form>

                <div>
                    <a href="{{ route('admin-products.create') }}"
                        class="inline-block bg-brand-500 text-white hover:bg-brand-600 text-md font-medium py-2 px-4 rounded">
                        Thêm sản phẩm
                    </a>
                </div>
            </div>

            <div id="myTabContent">
                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
                    aria-labelledby="all-tab">
                    <div class="grid grid-cols-1 p-0 md:p-4">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-slate-700/20">
                                        <tr>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                STT</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Sản phẩm & Tiêu đề</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Hình ảnh</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Thể loại</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Tình trạng kho</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Thuộc tính</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Giá</th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($listProducts as $product)
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">{{ $loop->iteration }}</div>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <h5>{{ $product->name }}</h5>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    @if ($product->images->isNotEmpty())
                                                        <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                                            alt="{{ $product->name }}" style="width: 100px; height: auto;">
                                                    @else
                                                        <img src="{{ asset('path/to/default/image.png') }}"
                                                            alt="Hình ảnh không có" style="width: 100px; height: auto;">
                                                    @endif
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <h5>{{ $product->category ? $product->category->name : 'Không có danh mục' }}
                                                    </h5>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <span
                                                        class="{{ $product->status == 0 ? 'bg-green-600/5 text-green-600' : 'bg-red-600/5 text-red-600' }} text-[11px] font-medium px-2.5 py-0.5 rounded h-5">
                                                        {{ $product->status == 0 ? 'Tồn hàng' : 'Hết hàng' }}
                                                    </span>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    @foreach ($product->variations as $variation)
                                                        <div>
                                                            Kích thước:
                                                            {{ $variation->size ? $variation->size->size : 'Chưa có kích thước' }}<br>
                                                            Màu sắc:
                                                            {{ $variation->color ? $variation->color->color : 'Chưa có màu sắc' }}
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td
                                                    class="p-3 font-semibold text-lg text-gray-800 whitespace-nowrap dark:text-gray-400">
                                                    {{ number_format($product->price_sale, 0, ',', '.') }} vnd
                                                    <del class="text-slate-500 font-normal">{{ number_format($product->price, 0, ',', '.') }}
                                                        vnd</del>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <a href="{{ route('admin-products.edit', $product->id) }}"
                                                        class="text-lg text-gray-500 dark:text-gray-400">Sửa</a>
                                                    <form action="{{ route('admin-products.destroy', $product->id) }}"
                                                        method="post" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-lg text-red-500 dark:text-red-400"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">Xoá</button>
                                                    </form>
                                                    <a href="{{ route('admin-products.show', $product->id) }}"
                                                        class="text-lg text-gray-500 dark:text-gray-400">Chi tiết</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="p-3 text-center text-gray-500">Không có sản phẩm
                                                    nào được tìm thấy.</td>
                                            </tr>
                                        @endforelse



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $listProducts->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
