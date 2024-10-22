<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login'); // Đường dẫn tới view đăng nhập
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = UserStaff::where('email', $request->email)->first();

        // Kiểm tra người dùng và mật khẩu (không mã hóa mật khẩu)
        if ($user && $user->password === $request->password) {
            Auth::login($user);
            return redirect()->route('admin.statistics')->with('success', 'Đăng nhập thành công.');
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công.');
    }
}
