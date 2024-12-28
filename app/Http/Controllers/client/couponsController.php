<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminCoupons;
use App\Models\CoupontYour;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class couponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khuyenMai = Discount::whereDate('valid_from', '<=', Carbon::now())
            ->whereDate('valid_to', '>', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->get();
        $khuyenMai->each(function ($coupon) {
            $endDate = Carbon::parse($coupon->valid_to);
            $coupon->days_remaining = $endDate->diffInDays(Carbon::now());
            $coupon->soLuongConLai = max(0, $coupon->max_usage - $coupon->usage_count); // Đảm bảo không âm
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
        $exists = CoupontYour::where('couponts_id', $request->couponts_id)
            ->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Bạn đã có mã này rồi!');
        }
        CoupontYour::create($request->all());
        session()->put('coupon_saved', true);
        return redirect()->back()->with('success', 'Đã lưu mã thành công!');
    }
}
