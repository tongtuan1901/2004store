@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <h1>Tạo Thương Hiệu Mới</h1>
        <form action="{{ route('admin-brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên Thương Hiệu</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Mô Tả</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_id">Chọn Sản Phẩm</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Chọn sản phẩm</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu Thương Hiệu</button>
        </form>
    </div>
@endsection
