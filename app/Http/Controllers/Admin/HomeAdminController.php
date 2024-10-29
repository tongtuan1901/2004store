<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\AdminProducts;
use App\Models\Dashboard;
use App\Models\OderItem;
use Carbon\Carbon;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $das = Dashboard::all();

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $startDateOld = Carbon::now()->subMonth()->startOfMonth();
        $endDateOld = Carbon::now()->subMonth()->endOfMonth();

        $total = OderItem::whereBetween('created_at', [$startDate, $endDate])->sum('price');
        $quantity = OderItem::whereBetween('created_at', [$startDate, $endDate])->sum('quantity');

        $totalOld = OderItem::whereBetween('created_at', [$startDateOld, $endDateOld])->sum('price');
        $count = OderItem::whereBetween('created_at', [$startDateOld, $endDateOld])->count();

        // Tính giá bán trung bình
        $doanhThuThangTruoc = $count > 0 ? $totalOld / $count : 0;
        $salesData = OderItem::whereBetween('created_at', [$startDate, $endDate])
            ->select('product_id', DB::raw('COUNT(*) as total_sales'))
            ->groupBy('product_id')
            ->get();
        $productIds = $salesData->pluck('product_id')->toArray();
        $products = AdminProducts::whereIn('id', $productIds)->pluck('name', 'id');
        $labels = $products->toArray();
        $data = $salesData->map(function ($item) use ($products) {
            return $item->total_sales;
        })->toArray();

        // sản phẩm bán chayk
        $salesDataSPBanChay = OderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('products.name')
            ->orderBy('total_quantity', 'desc')
            ->get();
        $productNamesSPBanChay = $salesDataSPBanChay->pluck('name')->toArray();
        $quantitiesSPBanChay = $salesDataSPBanChay->pluck('total_quantity')->toArray();


        // $top5SanPhamBanChay = AdminProducts::select('products.id', 'products.name', 'products.price', 'products.price_sale', 'products.created_at', 'products.updated_at')
        //     ->join('order_items', 'products.id', '=', 'order_items.product_id')
        //     ->selectRaw('SUM(order_items.quantity) as total_quantity')
        //     ->groupBy('products.id', 'products.name', 'products.price', 'products.created_at', 'products.updated_at')
        //     ->orderBy('total_quantity', 'desc')
        //     ->limit(5)
        //     ->get();

        // Lấy top 5 sản phẩm bán chạy trong tháng này
        $startOfThisMonth = Carbon::now()->startOfMonth();
        $endOfThisMonth = Carbon::now()->endOfMonth();

        $top5Products = OderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->whereBetween('order_items.created_at', [$startOfThisMonth, $endOfThisMonth])
            ->groupBy('products.name')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();
        $labelstop5Products = $top5Products->pluck('name')->toArray(); // Tên sản phẩm
        $datatop5Products = $top5Products->pluck('total_quantity')->toArray(); // Số lượng bán
        //end

        // biểu  đồ check đơn hàng thành công, thất bại
        $tongDonHang = AdminOrder::count();
        $datHangThanhCong = AdminOrder::where('status', 'Thành công')->count();
        $datHangThatBai = AdminOrder::where('status', 'Thất bại')->count();
        $datHangThanhCong = $tongDonHang > 0 ? ($datHangThanhCong / $tongDonHang) * 100 : 0;
        $datHangThatBai = $tongDonHang > 0 ? ($datHangThatBai / $tongDonHang) * 100 : 0;
        //end
        // doanh thu ngay homo nay
        $today = Carbon::today();
        $doanhThuNgayHomNay = AdminOrder::whereDate('created_at', $today)->where('status', 'Thành công')->sum('total');
        //end

        // Tính số lượng đơn hàng trong tháng này và tháng trước
        $startOfThisMonth = Carbon::now()->startOfMonth();
        $endOfThisMonth = Carbon::now()->endOfMonth();

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        $salesThisMonth = AdminOrder::whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count();
        $salesLastMonth = AdminOrder::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $labelsDonHangThang = ['Tháng trước', 'Tháng này'];
        $dataDonHangThang = [$salesLastMonth, $salesThisMonth];
        //end

        //số lượng sản phẩm bán ra hôm nay
        $soLuongBanHomNay = OderItem::whereDate('created_at', $today)->sum('quantity');
        //end

        //top khách hàng
        $topKH = AdminOrder::select('name', DB::raw('SUM(total) as total_spent'))
            ->groupBy('name')
            ->orderBy('total_spent', 'desc')
            ->limit(5)
            ->get();
        //end


        // dd($doanhThuThangTruoc);
        // dd($labelsSPBanChay);
        // dd($dataSPBanChay);
        return view('Admin.HomeAdmin', compact('das', 'total', 'quantity', 'doanhThuThangTruoc', 'labels', 'data', 'productNamesSPBanChay', 'quantitiesSPBanChay', 'datHangThanhCong', 'datHangThatBai', 'doanhThuNgayHomNay', 'labelsDonHangThang', 'dataDonHangThang', 'soLuongBanHomNay', 'topKH', 'labelstop5Products', 'datatop5Products'));
        // return view('Admin.layouts.master.footer', compact('das'));
    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        // Fetch records between dates
        $get = Dashboard::whereBetween('ngay_dat', [$from_date, $to_date])
            ->orderBy('ngay_dat', 'ASC')
            ->get();

        $char_data = [];
        foreach ($get as $key => $val) {
            $char_data[] = [
                'ngay_dat' => $val->ngay_dat,
                'so_don_hang' => $val->so_don_hang,
                'doang_so' => $val->doang_so,
                'so_luong' => $val->so_luong,
            ];
        }
        echo json_encode($char_data);
        // dd($char_data);

        // return $data = response()->json($char_data);
    }
    public function filter_by_select(Request $request)
    {
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {
            $get = Dashboard::whereBetween('ngay_dat', [$sub7day, $now])
                ->orderBy('ngay_dat', 'ASC')
                ->get();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = Dashboard::whereBetween('ngay_dat', [$dau_thangtruoc, $cuoi_thangtruoc])
                ->orderBy('ngay_dat', 'ASC')
                ->get();
        } elseif ($data['dashboard_value'] == 'thangnay') {
            $get = Dashboard::whereBetween('ngay_dat', [$dauthangnay, $now])
                ->orderBy('ngay_dat', 'ASC')
                ->get();
        } else {
            $get = Dashboard::whereBetween('ngay_dat', [$sub365day, $now])
                ->orderBy('ngay_dat', 'ASC')
                ->get();
        }

        foreach ($get as $key => $val) {
            $char_data[] = [
                'ngay_dat' => $val->ngay_dat,
                'so_don_hang' => $val->so_don_hang,
                'doang_so' => $val->doang_so,
                'so_luong' => $val->so_luong,
            ];
        }
        return response()->json($char_data);
    }
}
