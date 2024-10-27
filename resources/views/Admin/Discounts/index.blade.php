@extends('Admin/layouts/master/master')

@section('content')

<div class="container">
    <h1>Danh sách mã giảm giá</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('discount.create') }}"  class="btn btn-primary">Tạo mã giảm giá mới</a>

    <table class="table">
        <thead>
            <tr>
                <th>Mã giảm giá</th>
                <th>Loại</th>
                <th>Giá trị</th>
                <th>Từ ngày</th>
                <th>Đến ngày</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discounts as $discount)
                <tr>
                    <td>{{ $discount->code }}</td>
                    <td>{{ $discount->type }}</td>
                    <td>{{ $discount->value }}</td>
                    <td>{{ $discount->valid_from }}</td>
                    <td>{{ $discount->valid_to }}</td>
                    <td>
                        <a href="{{ route('discount.edit', $discount->id) }}">Sửa</a>
                        <form action="{{ route('discount.destroy', $discount->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa không?')" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection