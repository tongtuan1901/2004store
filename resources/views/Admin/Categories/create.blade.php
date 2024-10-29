@extends('Admin/layouts/master/master')

@section('content')

<div class="w-full relative mb-4">
    <form action="{{ route('admin-categories.store') }}" method="POST">
        @csrf
        <div class="flex-auto p-0 md:p-4">
            <div class="mb-2">
                <label for="title" class="font-medium text-sm text-slate-600 dark:text-slate-400">Tên danh mục :</label>
                <input type="text" id="title" name="name"
                 class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700"
                 placeholder="Tên sản phẩm" @error('name') is-invalid @enderror
                 value="{{ old('name') }}"
                 required>
                 @error('name')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                 @enderror
                 <button type="submit" class="btn btn-primary mt-3">Lưu</button>
            </div>



@endsection
