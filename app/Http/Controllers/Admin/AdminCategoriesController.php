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
        ]);



        $category = Category::create([
            'name' => $validateData['name'],
        ]);

        return redirect()->route('admin-categories.index');
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
