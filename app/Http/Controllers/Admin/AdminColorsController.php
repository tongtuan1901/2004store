<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class AdminColorsController extends Controller
{
    // List colors
    public function index()
    {
        $listColors = Color::all();
        return view("Admin.thuoctinh.color.index", compact("listColors"));
    }

    // Show create color form
    public function create()
    {
        return view('Admin.thuoctinh.color.create');
    }

    // Store new color
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'color' => 'required|string|max:50|regex:/^[\pL\s]+$/u',
        ]);

        Color::create([
            'color' => $validateData['color'],
        ]);

        return redirect()->route('admin-color.index')->with('success', 'Color created successfully.');
    }

    // Show edit color form
    public function edit(string $id)
    {
        $color = Color::findOrFail($id);
        return view('Admin.thuoctinh.color.edit', compact('color'));
    }

    // Update color
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'color' => 'required|string|max:50',
        ]);

        $color = Color::findOrFail($id);
        $color->update([
            'color' => $validateData['color'],
        ]);

        return redirect()->route('admin-color.index')->with('success', 'Color updated successfully.');
    }

    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);

        if ($color->variations()->exists()) {
            return redirect()->route('admin-color.index')->with('error', 'Không thể xóa màu sắc vì có sản phẩm liên kết.');
        }

        $color->delete();

        return redirect()->route('admin-color.index')->with('success', 'Xóa màu sắc thành công.');
    }


}
