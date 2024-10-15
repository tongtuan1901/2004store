@extends('Admin/layouts/master/master')

@section('content')


<div class="w-full relative mb-4">
    <form action="{{ route('admin-categories.update', $category->id) }}" method="POST">
        @csrf
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


    <form action="{{ route('admin-coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ $coupon->code }}" required>
        </div>
        
        <div class="form-group">
            <label for="type">Loại</label>
            <input type="text" class="form-control" name="type" id="type" value="{{ $coupon->type }}" required>
        </div>
        
        <div class="form-group">
            <label for="value">Giá trị</label>
            <input type="number" class="form-control" name="value" id="value" step="0.01" value="{{ $coupon->value }}" required>
        </div>

        <div class="form-group">
            <label for="starts_at">Ngày bắt đầu</label>
            <input type="datetime-local" class="form-control" name="starts_at" id="starts_at" value="{{ $coupon->starts_at->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="expires_at">Ngày kết thúc</label>
            <input type="datetime-local" class="form-control" name="expires_at" id="expires_at" value="{{ $coupon->expires_at->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
    </form>
</div>

@endsection
