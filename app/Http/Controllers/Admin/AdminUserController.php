<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
// Hiển thị danh sách user
public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $role = $request->input('role');

        $users = User::withTrashed()
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where('name', 'LIKE', "%{$searchTerm}%")
                             ->orWhere('email', 'LIKE', "%{$searchTerm}%");
            })
            ->when($role, function ($query, $role) {
                return $query->where('role', $role);
            })
            ->get();

        return view('Customer.users.index', compact('users'));
    }

//     public function index()
// {
//     $users = User::withTrashed()->get();
//     return view('Customer.users.index', compact('users'));
// }

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
        'password' => 'required',
        'role' => 'required',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'password' => $request->password,
        'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}


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
        'password' => 'nullable',
        'role' => 'required',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;

    if ($request->filled('password')) {
        $user->password = $request->password;
    }

    $user->role = $request->role;
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User soft deleted successfully.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully.');
    }
}

