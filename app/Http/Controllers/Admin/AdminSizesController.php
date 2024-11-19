<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size; // Nhập mô hình Size
use Illuminate\Http\Request;

class AdminSizesController extends Controller
{
    // Danh sách kích thước
    public function index()
    {
        $listSizes = Size::all();
        return view("Admin.thuoctinh.size.index", compact("listSizes"));
    }

    public function create()
    {
        return view('Admin.thuoctinh.size.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'size' => 'required|string|max:50|regex:/^[\pL\s]+$/u', 
        ]);

        Size::create([
            'size' => $validateData['size'],
        ]);

        return redirect()->route('admin-size.index')->with('success', 'Kích cỡ đã được tạo thành công.');
    }
    public function edit(string $id)
    {
        $size = Size::findOrFail($id);
        return view('Admin.thuoctinh.size.edit', compact('size'));
    }

    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'size' => 'required|string|max:10',
        ]);

        $size = Size::findOrFail($id);
        $size->update([
            'size' => $validateData['size'],
        ]);

        return redirect()->route('admin-size.index')->with('success', 'Size updated successfully.');
    }

    // Xóa kích thước
    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        return redirect()->route('admin-size.index')->with('success', 'Size deleted successfully.');
    }
}
