@extends('Admin/layouts/master/master')

@section('content')
<div class="w-full relative mb-4">
    <form action="{{ route('admin-categories.update', $category->id) }}" method="POST"> <!-- Thay đổi action ở đây -->
        @csrf <!-- Thêm token CSRF để bảo mật -->
        @method('put')
        <div class="flex-auto p-0 md:p-4">
            <div class="mb-2">
                <label for="title" class="font-medium text-sm text-slate-600 dark:text-slate-400">Tên danh mục :</label>
                <input type="text" id="title" name="name"
                 class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700"
                 placeholder="Tên sản phẩm" @error('name') is-invalid @enderror
                 value="{{ old('name', $category['name']) }}"
                 required>
                 @error('name')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                 @enderror
            </div>

            <div class="">
                <button type="submit" class="px-2 py-2 lg:px-4 bg-brand text-white text-sm rounded hover:bg-brand-600 border border-brand-500">Sửa sản phẩm</button>
                <button type="button" class="px-2 py-2 lg:px-4 bg-transparent text-brand text-sm rounded transition hover:bg-brand-500 hover:text-white border border-brand font-medium">
                    <a href="{{ route('admin-categories.index') }}">Quay lại</a>
                </button>
            </div>
        </div><!--end card-body-->
    </form>
</div><!--end card-->

@endsection
