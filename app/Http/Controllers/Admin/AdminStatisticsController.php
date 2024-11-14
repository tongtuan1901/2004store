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

        // Tính doanh thu hôm nay
        $totalRevenueToday = AdminOrder::where('created_at', '>=', $startOfDay)
            ->where('created_at', '<=', $endOfDay)
            ->sum('total');

        // Lọc theo tháng nếu có
        $month = $request->input('month');
        $revenueData = [];
        $labels = []; 

        if ($month) {
            $year = date('Y');
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $startOfDay = Carbon::createFromDate($year, $month, $day)->startOfDay();
                $endOfDay = Carbon::createFromDate($year, $month, $day)->endOfDay();
                $revenueData[$day] = AdminOrder::where('created_at', '>=', $startOfDay)
                    ->where('created_at', '<=', $endOfDay)
                    ->sum('total');
                $labels[$day] = $day;
            }
            // $data1 = array_values($revenueData); 
            $labels = array_values($labels); 
        }

        return view('admin.statistics.index', compact(
            'totalProductsAddedToday',
            'totalOrdersToday',
            'totalUsersRegisteredToday',
            'totalRevenueToday',
            'date',
            'month',
            'revenueData',
       
        ));
    }
}
