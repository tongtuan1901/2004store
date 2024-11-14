<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò admin
        if (Auth::guard('user_staff')->check() && Auth::guard('user_staff')->user()->role === 'admin') {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng về trang trước đó với thông báo lỗi
        return redirect()->route('admin.login')->withErrors(['access' => 'Bạn không có quyền truy cập vào trang này.']);
    }
}
