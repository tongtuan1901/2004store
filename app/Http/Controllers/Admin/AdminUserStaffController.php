<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserStaffController extends Controller
{
    public function index()
    {
        $users = UserStaff::all(); // Lấy tất cả người dùng
        return view('admin.user_staff.index', compact('users')); // Trả về view danh sách người dùng
    }

    public function create()
    {
        return view('admin.user_staff.create'); // Trả về form thêm tài khoản
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users_staff',
            'password' => 'required|string|min:8', // Không mã hóa mật khẩu
            'role' => 'required|in:admin,staff',
        ]);

        UserStaff::create($request->all()); // Tạo tài khoản mới
        return redirect()->route('user-staff.index')->with('success', 'Tài khoản đã được thêm thành công.'); // Thông báo thành công
    }

    public function edit($id)
    {
        $user = UserStaff::findOrFail($id);
        return view('admin.user_staff.edit', compact('user'));
    }

    public function update(Request $request, UserStaff $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users_staff,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Không mã hóa mật khẩu
            'role' => 'required|in:admin,staff',
        ]);

        $user->update($request->all()); // Cập nhật thông tin tài khoản
        return redirect()->route('user-staff.index')->with('success', 'Tài khoản đã được cập nhật thành công.'); // Thông báo thành công
    }

    public function destroy(UserStaff $user)
    {
        $user->delete(); // Xóa tài khoản
        return redirect()->route('user-staff.index')->with('success', 'Tài khoản đã được xóa thành công.'); // Thông báo thành công
    }
}
