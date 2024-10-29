<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoriesController extends Controller
{
  //list
    public function index()
    {
        $listCategories = Category::all();
         return view("Admin.Categories.index",compact("listCategories"));
    }
// add
    public function create()
    {
        return view('Admin.Categories.create');
    }

   //store
   public function store(Request $request)
{
    $validateData = $request->validate([
        'name' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Thêm phần validation cho ảnh
    ]);

    // Kiểm tra nếu có file ảnh được upload
    if ($request->hasFile('image')) {
        // Lưu file ảnh vào thư mục 'categories' trong 'storage/app/public'
        $imagePath = $request->file('image')->store('categories', 'public');
        $validateData['image'] = $imagePath; // Lưu đường dẫn tương đối vào cơ sở dữ liệu
    }

    // Tạo mới category với tên và (nếu có) đường dẫn ảnh
    $category = Category::create([
        'name' => $validateData['name'],
        'image' => $validateData['image'] ?? null, // Lưu đường dẫn ảnh hoặc null nếu không có
    ]);

    return redirect()->route('admin-categories.index')->with('success', 'Category created successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //edit
    public function edit(string $id)
    {
        $category = Category::FindorFail($id);
        return view('Admin.Categories.edit', compact('category'));
    }

   // update
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::FindorFail($id);

        $category -> update([
            'name' => $validateData['name'],
        ]);
        return redirect()->route('admin-categories.index');
    }
// delete
    public function destroy(string $id)
    {
        $category = Category::FindorFail($id);
        $category -> delete();
        return redirect()->route('admin-categories.index');
    }

}
