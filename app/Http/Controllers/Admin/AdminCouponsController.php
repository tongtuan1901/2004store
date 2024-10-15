<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCoupons;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminCouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coupons = AdminCoupons::all();
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'code' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'value' => 'required|numeric',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date|after:starts_at',
        ]);

        AdminCoupons::create($request->all());

        return redirect()->route('admin-coupons.index')
                         ->with('success', 'Mã giảm giá được tạo thành công.');
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
    public function edit($id)
    {
        // dd($coupon);
        $coupon = AdminCoupons::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
{
    $request->validate([
        'code' => 'required|string|max:50',
        'type' => 'required|string|max:50',
        'value' => 'required|numeric',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date|after:starts_at',
    ]);

    $coupon = AdminCoupons::findOrFail($id);
    $coupon->update($request->all());

    return redirect()->route('admin-coupons.index')
                     ->with('success', 'Mã giảm giá được cập nhật thành công.');
}

    /**
     * Remove the specified resource from storage.
     */
     // Xóa mã giảm giá
     public function destroy($id)
     {
         $coupon = AdminCoupons::findOrFail($id);
         $coupon->delete();

         return redirect()->route('admin-coupons.index')
                          ->with('success', 'Mã giảm giá đã bị xóa.');
     }
}
