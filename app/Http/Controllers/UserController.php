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
        'password' => 'required', // Validate password, adjust min length as needed
        'role' => 'required', // Validate role
    ]);

    // Create the user with hashed password
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'password' => $request->password, // Hash the password
        'role' => $request->role, // Lưu vai trò
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
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone_number' => 'required',
        'password' => 'nullable', // Thay đổi nếu cần
        'role' => 'required',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;
    
    if ($request->filled('password')) {
        $user->password = $request->password; // Chỉ cập nhật mật khẩu nếu trường này không trống
    }

    $user->role = $request->role; // Cập nhật vai trò
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
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

