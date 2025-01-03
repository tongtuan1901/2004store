<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoriesController extends Controller
{
    // List categories
    public function index(Request $request)
    {
        $query = Category::query(); // Model của bạn

        // Kiểm tra nếu có từ khóa tìm kiếm
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $listCategories = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.categories.index', compact('listCategories'));
    }
    // Show create category form
    public function create()
    {
        return view('Admin.Categories.create');
    }


    // Store new category
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ], [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.regex' => 'Tên danh mục chỉ được phép chứa chữ cái và khoảng trắng.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'image.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpg, png, jpeg, gif.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $validateData['image'] = $imagePath;
        }

        Category::create([
            'name' => $validateData['name'],
            'image' => $validateData['image'] ?? null,
        ]);

        return redirect()->route('admin-categories.index')->with('success', 'Category created successfully.');
    }

    // Show edit category form
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.Categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('categories', 'public');
            $validateData['image'] = $imagePath;
        }

        $category->update([
            'name' => $validateData['name'],
            'image' => $validateData['image'] ?? $category->image, // Keep old image if no new image uploaded
        ]);

        return redirect()->route('admin-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->products()->exists()) {
            return redirect()->route('admin-categories.index')->with('error', 'Không thể xóa danh mục vì có sản phẩm liên kết.');
        }

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin-categories.index')->with('success', 'Xóa danh mục thành công.');
    }

}
