@extends('Admin/layouts/master/master')

@section('content')
    <div class="container">
        <a href="{{ route('admin-orders.index') }}" class="btn btn-primary">Quai lai</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Sản phẩm</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approved as $ap)
                    <tr>
                        <td>{{ $ap->name }}</td>
                        <td>{{ $ap->email }}</td>
                        <td>{{ $ap->phone }}</td>
                        <td>{{ $ap->address }}</td>
                        <td> {{ $ap->status }}</td>
                        <td>
                            <ul>
                                @foreach ($ap->products as $product)
                                    <li>{{ $product->name }} - Số lượng: {{ $product->pivot->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <button class="btn btn-info">Cap nhat</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

