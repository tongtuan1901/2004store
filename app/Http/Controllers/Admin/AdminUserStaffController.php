<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserStaffController extends Controller
{
    protected $messages = [
        'name.required' => 'Vui lòng nhập tên',
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không đúng định dạng', 
        'email.unique' => 'Email đã tồn tại',
        'password.required' => 'Vui lòng nhập mật khẩu',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
    ];

    public function index()
    {
        // Chỉ lấy các tài khoản có role là staff
        $users = UserStaff::where('role', 'staff')->get();
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
            'email' => 'required|string|email|max:255|unique:users_staff',
            'password' => 'required|string|min:8',
        ], $this->messages);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['role'] = 'staff';

        UserStaff::create($data);
        return redirect()->route('user-staff.index')
            ->with('success', 'Tài khoản nhân viên đã được thêm thành công.');
    }

    public function edit($id)
    {
        $user = UserStaff::where('role', 'staff')->findOrFail($id);
        return view('admin.user_staff.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserStaff::where('role', 'staff')->findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ], $this->messages);
    
        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        $user->update($data);
        return redirect()->route('user-staff.index')
            ->with('success', 'Tài khoản đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $user = UserStaff::where('role', 'staff')->findOrFail($id);
        $user->delete();
        return redirect()->route('user-staff.index')
            ->with('success', 'Tài khoản đã được xóa thành công.');
    }
}
