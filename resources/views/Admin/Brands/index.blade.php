@extends('Admin.layouts.master.master')

@section('content')
    <div class="container">
        <h1>Danh Sách Thương Hiệu</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin-brands.create') }}" class="btn btn-primary mb-3">Thêm Thương Hiệu</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Thương Hiệu</th>
                    <th>Slug</th>
                    <th>Mô Tả</th>
                    <th>Logo</th>
                    <th>Sản Phẩm</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            @if ($brand->logo)
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" style="width: 100px;">
                            @else
                                <span>Không có logo</span>
                            @endif
                        </td>
                        <td>{{ $brand->product ? $brand->product->name : 'Không có sản phẩm' }}</td>
                        <td>
                            <a href="{{ route('admin-brands.edit', $brand->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin-brands.destroy', $brand->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa thương hiệu này không?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
