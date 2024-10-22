<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AdminOrder;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Http\Controllers\Controller;

class AdminStatisticsController extends Controller
{
    public function index(Request $request)
    {
        // Lấy ngày hiện tại
        $today = Carbon::today();

        // Lọc theo ngày
        $date = $request->input('date', $today->toDateString());
        $startOfDay = Carbon::parse($date)->startOfDay();
        $endOfDay = Carbon::parse($date)->endOfDay();

        // Thống kê sản phẩm thêm hôm nay
        $totalProductsAddedToday = AdminProducts::where('created_at', '>=', $startOfDay)
            ->where('created_at', '<=', $endOfDay)
            ->count();

        // Thống kê đơn hàng bán hôm nay
        $totalOrdersToday = AdminOrder::where('created_at', '>=', $startOfDay)
            ->where('created_at', '<=', $endOfDay)
            ->count();

        // Thống kê khách hàng đăng ký hôm nay
        $totalUsersRegisteredToday = User::where('created_at', '>=', $startOfDay)
            ->where('created_at', '<=', $endOfDay)
            ->count();

        // Lọc theo tháng nếu có
        $month = $request->input('month');
        if ($month) {
            $startOfMonth = Carbon::parse($date)->month($month)->startOfMonth();
            $endOfMonth = Carbon::parse($date)->month($month)->endOfMonth();

            // Cập nhật thống kê theo tháng
            $totalProductsAddedToday = AdminProducts::where('created_at', '>=', $startOfMonth)
                ->where('created_at', '<=', $endOfMonth)
                ->count();

            $totalOrdersToday = AdminOrder::where('created_at', '>=', $startOfMonth)
                ->where('created_at', '<=', $endOfMonth)
                ->count();

            $totalUsersRegisteredToday = User::where('created_at', '>=', $startOfMonth)
                ->where('created_at', '<=', $endOfMonth)
                ->count();
        }

        return view('admin.statistics.index', compact(
            'totalProductsAddedToday',
            'totalOrdersToday',
            'totalUsersRegisteredToday',
            'date',
            'month'
        ));
    }
}
