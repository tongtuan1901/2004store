<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminCoupons;
use App\Models\CoupontYour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class couponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khuyenMai = AdminCoupons::whereDate('starts_at', '<=', Carbon::now())
            ->whereDate('expires_at', '>', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->with('product')
            ->get();
        $khuyenMai->each(function ($coupon) {
            $endDate = Carbon::parse($coupon->expires_at);
            $coupon->days_remaining = $endDate->diffInDays(Carbon::now());
        });

        return view('Client.ClientCoupons.index', compact('khuyenMai'));
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
        $exists = CoupontYour::where('product_id', $request->product_id)
            ->where('couponts_id', $request->couponts_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Bạn đã có mã này rồi!');
        }
        CoupontYour::create($request->all());
        session()->put('coupon_saved', true);
        return redirect()->back()->with('success', 'Đã lưu mã thành công!');
    }
}
