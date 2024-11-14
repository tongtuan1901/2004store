<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('Admin.Brands.index', compact('brands'));
    }

    public function create()
    {
        $products = AdminProducts::all();
        return view('Admin.Brands.create', compact('products'));
    }


    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|unique:brands|max:255',
            'slug' => 'required|unique:brands|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_id' => 'required|exists:products,id', // Validate product_id
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->product_id = $request->product_id; // Lưu product_id

        if ($request->hasFile('logo')) {
            $filePath = $request->file('logo')->store('logos', 'public');
            $brand->logo = $filePath;
        }

        $brand->save();

        return redirect()->route('admin-brands.index')->with('success', 'Thương hiệu đã được thêm thành công');
    }

    public function edit(Brand $brand)
    {
        $products = AdminProducts::all(); // Lấy tất cả sản phẩm để hiển thị trong dropdown
        return view('Admin.Brands.edit', compact('brand', 'products'));
    }



    public function update(Request $request, string $id)
    {
        // Tìm thương hiệu theo ID
        $brand = Brand::findOrFail($id);

        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|max:255|unique:brands,name,' . $brand->id,
            'slug' => 'required|max:255|unique:brands,slug,' . $brand->id,
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_id' => 'required|exists:products,id', // Validate product_id
        ]);

        // Cập nhật các trường
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->product_id = $request->product_id; // Cập nhật product_id

        // Xử lý logo
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo); // Xóa logo cũ nếu có
            }
            $filePath = $request->file('logo')->store('logos', 'public');
            $brand->logo = $filePath;
        }

        // Lưu thương hiệu
        $brand->save();

        return redirect()->route('admin-brands.index')->with('success', 'Thương hiệu đã được cập nhật thành công');
    }



    public function destroy(Brand $brand)
    {
        if ($brand->logo) {
            Storage::disk('public')->delete($brand->logo); // Xóa logo khi xóa thương hiệu
        }
        $brand->delete();

        return redirect()->route('admin-brands.index')->with('success', 'Thương hiệu đã được xóa');
    }
}
