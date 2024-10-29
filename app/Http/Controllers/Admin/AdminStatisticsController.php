<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
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
        $revenueData = array_fill(0, 31, 0); // Khởi tạo mảng doanh thu
    
        if ($month) {
            $year = date('Y'); // Năm hiện tại
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Số ngày trong tháng
        
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $startOfDay = Carbon::createFromDate($year, $month, $day)->startOfDay();
                $endOfDay = Carbon::createFromDate($year, $month, $day)->endOfDay();
        
                $revenueData[$day - 1] = AdminOrder::where('created_at', '>=', $startOfDay)
                    ->where('created_at', '<=', $endOfDay)
                    ->sum('total');
            }
        }
    
        // Ghi log để kiểm tra dữ liệu
        // Log::info('Revenue Data: ', $revenueData);

        return view('admin.statistics.index', compact(
            'totalProductsAddedToday',
            'totalOrdersToday',
            'totalUsersRegisteredToday',
            'totalRevenueToday',
            'date',
            'month',
            'revenueData'
        ));
    }
}
