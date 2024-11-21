<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoriesController extends Controller
{
    // List categories
    public function index()
    {
        $listCategories = Category::all();
        return view("Admin.Categories.index", compact("listCategories"));
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

    // Delete category
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        // Optionally delete image
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('admin-categories.index')->with('success', 'Category deleted successfully.');
    }
}
