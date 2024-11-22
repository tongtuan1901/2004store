<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand; // Thay đổi từ Category sang Brand
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBrandsController extends Controller
{
    // List brands
    public function index(Request $request)
    {
        $query = Brand::query();
    
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }
    
        $listBrands = $query->paginate(10); // Sử dụng phân trang nếu cần
        return view('admin.brands.index', compact('listBrands'));
    }

    // Show create brand form
    public function create()
    {
        return view('Admin.Brands.create');
    }

    // Store new brand
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brands', 'public');
            $validateData['image'] = $imagePath;
        }

        Brand::create([
            'name' => $validateData['name'],
            'image' => $validateData['image'] ?? null,
        ]);

        return redirect()->route('admin-brands.index')->with('success', 'Brand created successfully.');
    }

    // Show edit brand form
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('Admin.Brands.edit', compact('brand'));
    }

    // Update brand
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $brand = Brand::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);
            }

            $imagePath = $request->file('image')->store('brands', 'public');
            $validateData['image'] = $imagePath;
        }

        $brand->update([
            'name' => $validateData['name'],
            'image' => $validateData['image'] ?? $brand->image,
        ]);

        return redirect()->route('admin-brands.index')->with('success', 'Brand updated successfully.');
    }


    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }
        $brand->delete();
        return redirect()->route('admin-brands.index')->with('success', 'Brand deleted successfully.');
    }
}
