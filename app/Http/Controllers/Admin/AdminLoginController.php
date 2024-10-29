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
        return view('admin.auth.login'); // Trả về form đăng nhập
    }

    public function login(Request $request)
    {
        // Xác thực thông tin người dùng
        $credentials = $request->only('email', 'password');
    
        // Tìm người dùng theo email
        $user = UserStaff::where('email', $credentials['email'])->first();
    
        // Kiểm tra xem người dùng có tồn tại và mật khẩu có khớp không
        if ($user && $user->password === $credentials['password']) {
            Auth::guard('user_staff')->login($user); // Đăng nhập người dùng
            return redirect()->intended('admin-products'); // Chuyển hướng đến trang admin sau khi đăng nhập
        }
    
        return redirect()->back()->withErrors(['access' => 'Thông tin đăng nhập không chính xác.']); // Thông báo lỗi
    }
    

    public function logout()
    {
        Auth::guard('user_staff')->logout(); // Đăng xuất
        return redirect()->route('admin.login'); // Chuyển hướng về trang đăng nhập
    }
}
