@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h1>Thêm Tài Khoản Mới</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user-staff.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật Khẩu</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    Hiện
                </button>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Vai Trò</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="staff">Nhân viên</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
        <a href="{{ route('user-staff.index') }}" class="btn btn-secondary">Quay Lại</a>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? 'Hiện' : 'Ẩn';
        });
    });
</script>


@endsection
