<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách banner từ cơ sở dữ liệu
        $banners = Banners::where('deleted', false)->get();
    
        // Lấy danh sách categories
        $categories = Category::all();
    
        // Truyền dữ liệu banner và categories vào view
        return view('Client.home', compact('banners', 'categories'));
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
