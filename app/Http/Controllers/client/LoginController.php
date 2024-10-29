<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Thêm model User

class LoginController extends Controller
{
    public function index()
    {
        return view('Client.ClientAuth.ClientLogin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Kiểm tra người dùng
        $user = User::where('email', $request->email)
                    ->where('password', $request->password) // Kiểm tra mật khẩu không mã hóa
                    ->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('client-home.index')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Thông tin đăng nhập không đúng.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('username'); // Xóa tên người dùng khỏi session

        return redirect()->route('client-login.index')->with('success', 'Bạn đã đăng xuất thành công.');
    }
}

