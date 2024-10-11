<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    // Hiển thị danh sách user
    public function index()
{
    $users = User::withTrashed()->get();
    return view('Customer.users.index', compact('users'));
}

    // Hiển thị form tạo mới user
    public function create()
    {
        return view('Customer.Users.create');
    }

    // Lưu user mới
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone_number' => 'required',
        'password' => 'required' // Validate password, adjust min length as needed
    ]);

    // Create the user with hashed password
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'password' => Hash::make($request->password), // Hash the password
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

    // Hiển thị form chỉnh sửa user
    public function edit(User $user)
    {
        return view('Customer.Users.edit', compact('user'));
    }

    // Cập nhật user
    public function update(Request $request, $id)
{
    // Lấy user
    $user = User::findOrFail($id);

    // Xác thực dữ liệu
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone_number' => 'nullable|string|max:15',
        'password' => 'nullable|string|confirmed', // Xác thực trường password và password_confirmation
    ]);

    // Cập nhật thông tin người dùng
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');

    // Kiểm tra xem có nhập mật khẩu mới không
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    // Lưu thông tin người dùng
    $user->save();

    // Chuyển hướng về trang danh sách với thông báo
    return redirect()->route('users.index')->with('success', 'Thông tin người dùng đã được cập nhật thành công.');
}



    // Xóa mềm user
    public function destroy(User $user)
    {
        $user->delete();  // Xóa mềm
        return redirect()->route('users.index')->with('success', 'User soft deleted successfully.');
    }

    // Khôi phục user đã bị xóa mềm
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);  // Tìm user đã bị xóa mềm
        $user->restore();  // Khôi phục user
        return redirect()->route('users.index')->with('success', 'User restored successfully.');
    }
}

