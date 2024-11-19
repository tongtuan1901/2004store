<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; // Thêm dòng này

class ForgotPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('Client.ClientAuth.ForgotPassword');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $newPassword = Str::random(8); // Thay đổi hàm này

        // Cập nhật mật khẩu của người dùng
        $user->password = Hash::make($newPassword);
        $user->save();

        // Gửi email
        Mail::send('emails.password_reset', ['password' => $newPassword], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Mật khẩu mới của bạn');
        });

        return back()->with('success', 'Mật khẩu mới đã được gửi đến email của bạn.');
    }
}


