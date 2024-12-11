<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //biểu đồ tỷ lệ đăt hàng
        $totalOrders = AdminOrder::count();
        $successfulOrders = AdminOrder::where('status', 'Hoàn thành')->count();
        $failedOrders = AdminOrder::where('status', 'Hủy')->count();

        $successRate = $totalOrders > 0 ? ($successfulOrders / $totalOrders) * 100 : 0;
        $failureRate = $totalOrders > 0 ? ($failedOrders / $totalOrders) * 100 : 0;
        //end

        //top 5 khách hàng chi tiêu nhiều nhất
        $topCustomers = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('users.name', DB::raw('SUM(orders.total) as total_spent'))
        ->where('orders.status', 'Hoàn thành')
        ->groupBy('users.id', 'users.name')
        ->orderByDesc('total_spent')
        ->limit(5)
        ->get();
        //end

        //tính doanh thu tháng này
        $doanhThu = DB::table('orders')
        ->where('status', 'Hoàn thành')
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('total');
        // dd($doanhThu);
        //end

        // doanh thu ngay hôm nay
        $doanhThuToday = DB::table('orders')
        ->where('status', 'Hoàn thành')
        ->whereDate('created_at', Carbon::today())
        ->sum('total');
        //end

        //tính tổng số tài khoản tạo tháng này
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

            // Đếm số user được tạo trong tháng và năm hiện tại
            $countAcc = User::whereMonth('created_at', $currentMonth)
                 ->whereYear('created_at', $currentYear)
                 ->count();
        //end

        //tính số đơn hàng bán ra tháng này
        $soDonHang = DB::table('orders')
        ->where('status', 'Hoàn thành') // Giả sử chỉ tính các đơn hàng đã hoàn thành
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();
        //end
        return view("admin.Home.index",compact('successRate',
         'failureRate',
         'topCustomers',
         'doanhThu',
         'countAcc',
         'doanhThuToday',
         'soDonHang'));
    }
    public function filterByDate(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
    
        // Lấy dữ liệu và nhóm theo ngày
        $chart_data = AdminOrder::select(
            DB::raw('DATE(created_at) as ngayDat'), // Lấy ngày
            DB::raw('SUM(total) as total'),        // Tổng doanh thu
            DB::raw('COUNT(id) as soLuongDon')     // Số lượng đơn
        )
        ->whereBetween('created_at', [$from_date, $to_date])
        ->groupBy('ngayDat') // Nhóm theo ngày
        ->orderBy('ngayDat', 'ASC')
        ->get();
    
        return response()->json($chart_data);
    }
    // public function filterByBtn(Request $request){
    //     $data = $request->all();
    //     $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    //     $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    //     $cuoithangtrc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

    //     $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    //     $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

    //     $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    //     if($data['dashboard_value'] == '7day') {
    //         $get = AdminOrder::whereBetween('created_at', [$sub7days, $now])
    //                          ->orderBy('created_at', 'ASC')
    //                          ->get();
    //     } elseif($data['dashboard_value'] == 'thangTrc') {
    //         $get = AdminOrder::whereBetween('created_at', [$dauthangtruoc, $cuoithangtrc])
    //                          ->orderBy('created_at', 'ASC')
    //                          ->get();
    //     } elseif($data['dashboard_value'] == 'thangNay') {
    //         $get = AdminOrder::whereBetween('created_at', [$dauthangnay, $now])
    //                          ->orderBy('created_at', 'ASC')
    //                          ->get();
    //     } else {
    //         $get = AdminOrder::whereBetween('created_at', [$sub365day, $now])
    //                          ->orderBy('created_at', 'ASC')
    //                          ->get();
    //     }        
    //     foreach ($get as $val) {
    //         $chart_data[] = [
    //             'ngayDat' => $val->created_at->format('Y-m-d'),
    //             'total' => (float) $val->total,
    //             'status' => $val->status,
    //             'payment_method' => $val->payment_method,
    //         ];
    //     }        
    
    //     return response()->json($chart_data);
    // }
    public function filterByBtn(Request $request)
{
    $data = $request->all();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    $cuoithangtrc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

    if ($data['dashboard_value'] == '7day') {
        $from_date = $sub7days;
        $to_date = $now;
    } elseif ($data['dashboard_value'] == 'thangTrc') {
        $from_date = $dauthangtruoc;
        $to_date = $cuoithangtrc;
    } elseif ($data['dashboard_value'] == 'thangNay') {
        $from_date = $dauthangnay;
        $to_date = $now;
    } else {
        $from_date = $sub365day;
        $to_date = $now;
    }

    // Nhóm dữ liệu theo ngày và tính tổng doanh thu + số lượng đơn hàng
    $chart_data = AdminOrder::select(
        DB::raw('DATE(created_at) as ngayDat'),
        DB::raw('SUM(total) as total'),
        DB::raw('COUNT(id) as soLuongDon')
    )
    ->whereBetween('created_at', [$from_date, $to_date])
    ->groupBy('ngayDat')
    ->orderBy('ngayDat', 'ASC')
    ->get();

    return response()->json($chart_data);
}
}