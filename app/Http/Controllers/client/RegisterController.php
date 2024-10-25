<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User; // Thêm model User
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Client.ClientAuth.ClientRegister');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        // Lưu dữ liệu người dùng
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password, // Lưu mật khẩu không mã hóa
        ]);

        return redirect()->route('client-login.index')->with('success', 'Đăng ký thành công!');
    }
}

