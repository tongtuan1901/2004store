<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategories = Category::all();
         return view("Admin.Categories.index",compact("listCategories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Tạo danh mục mới
        $category = Category::create([
            'name' => $validateData['name'],
        ]);

        // Chuyển hướng về trang danh sách danh mục với thông báo thành công
        return redirect()->route('admin-categories.index')->with('status', 'Thêm danh mục thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::FindorFail($id);
        return view('Admin.Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::FindorFail($id);

        $category -> update([
            'name' => $validateData['name'],
        ]);
        return redirect()->route('admin-categories.index')->with('status', 'Sửa danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::FindorFail($id);
        $category -> delete();
        return redirect()->route('admin-categories.index');
    }

}
