<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User; // Thêm model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
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
    
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);
    
        return redirect()->route('client-login.index')->with('success', 'Đăng ký thành công!');
    }
}

