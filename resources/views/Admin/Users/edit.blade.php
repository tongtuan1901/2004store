@extends('Admin/layouts/master/master')

@section('content')
@error('password')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror

@error('password_confirmation')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <div class="container mx-auto">
        <h2 class="text-xl font-semibold mb-4">Chỉnh sửa người dùng</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Trường Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="form-input mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="form-input mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường Phone Number -->
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                       class="form-input mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                @error('phone_number')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường Mật Khẩu -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu mới (nếu muốn thay đổi)</label>
                <input type="password" name="password" id="password"
                       class="form-input mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường Nhập Lại Mật Khẩu -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-input mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

          

            <button type="submit"
                    class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Cập nhật
            </button>
        </form>
    </div>
@endsection
