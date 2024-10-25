<?php

namespace App\Http\Controllers\Admin;


use App\Models\UserStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserStaffController extends Controller
{
    public function index()
    {
        $users = UserStaff::paginate(10);
        return view('admin.user_staff.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user_staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_staff,email',
            'password' => 'required|string|max:255', // Không mã hóa
            'role' => 'required|in:admin,staff'
        ]);

        UserStaff::create($request->all());

        return redirect()->route('user-staff.index')->with('success', 'Tài khoản đã được tạo.');
    }

    public function edit($id)
    {
        $user = UserStaff::findOrFail($id);
        return view('admin.user_staff.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_staff,email,' . $id,
            'password' => 'nullable|string|max:255',
            'role' => 'required|in:admin,staff'
        ]);

        $user = UserStaff::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('user-staff.index')->with('success', 'Tài khoản đã được cập nhật.');
    }

    public function destroy($id)
    {
        $user = UserStaff::findOrFail($id);
        $user->delete(); // Xóa mềm

        return redirect()->route('user-staff.index')->with('success', 'Tài khoản đã được xóa.');
    }

    public function __construct()
{
    $this->middleware('auth'); // Bảo vệ các phương thức trong controller
}

  
}
