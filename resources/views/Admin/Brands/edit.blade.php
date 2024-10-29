@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <h1>Chỉnh Sửa Thương Hiệu</h1>
        <form action="{{ route('admin-brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên Thương Hiệu</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $brand->name) }}"
                    required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control"
                    value="{{ old('slug', $brand->slug) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Mô Tả</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $brand->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                @if ($brand->logo)
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" class="img-thumbnail mt-2"
                        style="width: 100px;">
                @endif
            </div>
            <div class="form-group">
                <label for="product_id">Chọn Sản Phẩm</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Chọn sản phẩm</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $brand->product_id ? 'selected' : '' }}>
                            {{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật Thương Hiệu</button>
        </form>

    </div>
@endsection
