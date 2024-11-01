@extends('Admin/layouts/master/master')

@section('content')
    <h1>Quản lý Bình luận</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comment)
    <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->user ? $comment->user->name : 'Người dùng không tìm thấy' }}</td>
        <td>{{ $comment->product ? $comment->product->name : 'Sản phẩm không tìm thấy' }}</td>
        <td>{{ $comment->content }}</td>
        <td>
            <form action="{{ route('admin-comments.destroy', $comment->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Bạn có muốn xoá danh mục này không ?')" class="icofont-ui-delete text-lg text-red-500 dark:text-red-400">Xoá</button>
            </form>
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
@endsection
