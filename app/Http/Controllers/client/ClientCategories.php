<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("Client.ClientCategories.ListCategories", compact('categories'));
    }

    public function showByBrand($id)
    {
        $categories = Category::all(); // Nếu bạn cần hiển thị danh mục
        $products = AdminProducts::where('brand_id', $id)->get(); // Lấy sản phẩm theo ID thương hiệu
    
        return view('Client.ClientCategories.ListCategories', compact('categories', 'products'));
    }
    

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
