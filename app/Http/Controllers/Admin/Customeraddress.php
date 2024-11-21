<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Customeraddress extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('customeraddresses')->get();
        return view('admin\customeraddress.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin\customeraddress.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        // ], [
        //     'name.required' => 'Vui lòng nhập tên',
        //     'address.required' => 'Vui lòng nhập địa chỉ',
        //     'phone.required' => 'Vui lòng nhập số điện thoại',
        // ]);
    
        $fullAddress = $request->address . ', ' . $request->ward_name . ', ' . $request->district_name . ', ' . $request->province_name;

        DB::table('customeraddresses')->insert([
            'name' => $request->name,
            'address' => $fullAddress, // lưu địa chỉ đầy đủ vào cột 'address'
            'phone' => $request->phone,
        ]);
        
    
        return redirect()->route('customeraddress.index');
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
        DB::table('customeraddresses')->where('id', $id)->delete();
        return back();
    }
}
