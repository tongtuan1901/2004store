@extends('Admin/layouts/master/master')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-lg font-semibold mb-4">Danh sách tài khoản đã bị vô hiệu hóa</h1>
    <table class="w-full">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
