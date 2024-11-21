<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        $user = UserStaff::where('email', $credentials['email'])->first();
    
        if ($user && $user->password === $credentials['password']) {
            Auth::guard('user_staff')->login($user);
            return redirect()->intended('users');
        }
    
        return redirect()->back()->withErrors(['access' => 'Thông tin đăng nhập không chính xác.']);
    }
    
    public function logout()
    {
        Auth::guard('user_staff')->logout();
        return redirect()->route('admin.login');
    }

    public function showForgotPasswordForm()
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users_staff,email',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::send('admin.auth.emails.reset-password', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Đặt lại mật khẩu');
        });

        return back()->with('status', 'Chúng tôi đã gửi email liên kết đặt lại mật khẩu của bạn!');
    }

    public function showResetForm($token)
    {
        $passwordReset = DB::table('password_resets')
            ->where('token', $token)
            ->first();

        if (!$passwordReset) {
            return redirect()->route('admin.login')->withErrors(['email' => 'Token không hợp lệ!']);
        }

        return view('admin.auth.reset-password', [
            'token' => $token,
            'email' => $passwordReset->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $passwordReset = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        if(!$passwordReset){
            return back()->withErrors(['email' => 'Token không hợp lệ!']);
        }

        UserStaff::where('email', $passwordReset->email)
            ->update(['password' => $request->password]);

        DB::table('password_resets')->where(['email'=> $passwordReset->email])->delete();

        return redirect()->route('admin.login')->with('message', 'Mật khẩu của bạn đã được thay đổi!');
    }
}