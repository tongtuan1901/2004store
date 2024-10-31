@extends('Admin/layouts/master/master')
@section('content')
<div class="w-full relative mb-4">
    <div class="flex-auto p-0 md:p-4">
        <div class="flex flex-wrap gap-4 mb-3">
            <div class="mb-2 w-44">
                <select id="Category" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
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
                        <input type="search" id="productSearch" class="form-input w-52 rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 pl-10 p-2.5" placeholder="search">
                    </div>
                </form>
            </div>
            <div>
            <button class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white  text-md font-medium py-2 px-4 rounded">
                    <a href="{{ route('admin-categories.create') }}">Thêm danh mục</a>
                </button>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">Tên danh mục</th>
                    <th class="whitespace-nowrap">Ảnh</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCategories as $category)
                    <tr>
                        <td class="whitespace-nowrap">{{ $category->name }}</td>
                        <td class="whitespace-nowrap">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="w-20 h-20 object-cover">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('admin-categories.edit', $category->id) }}" class="text-blue-500">Sửa</a>
                            <form action="{{ route('admin-categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
