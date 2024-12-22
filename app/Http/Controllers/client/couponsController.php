<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminCoupons;
use Carbon\Carbon;
use Illuminate\Http\Request;

class couponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khuyenMai = AdminCoupons::whereDate('starts_at', '<=', Carbon::now())->whereDate('expires_at', '>=', Carbon::now())->orderBy('created_at', 'desc')->with('product')->get();
        // dd($khuyenMai);
        $khuyenMai->each(function ($coupon) {
            $endDate = Carbon::parse($coupon->expires_at);
            $coupon->days_remaining = $endDate->diffInDays(Carbon::now());
        });
        return view('Client.ClientCoupons.index',compact('khuyenMai'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
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
