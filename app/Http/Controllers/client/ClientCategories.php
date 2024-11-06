<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Banners;

use App\Models\AdminProducts;

class ClientCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $banners = Banners::where('deleted', false)->get();
    $listCategories = Category::all();
    $categories = Category::all();
    
    // Thiết lập các giá trị mặc định
    $sortBy = $request->input('sortBy', 'name:asc'); // Mặc định là sắp xếp theo tên tăng dần
    $sortField = 'name'; // Trường mặc định
    $sortDirection = 'asc'; // Hướng mặc định

    // Phân tích giá trị sắp xếp
    if ($sortBy) {
        list($sortField, $sortDirection) = explode(':', $sortBy);
    }

    // Thay đổi số lượng sản phẩm mỗi trang thành 12
    $productsSale = AdminProducts::with(['category', 'firstImage']);

    // Sắp xếp theo các trường tương ứng
    switch ($sortField) {
        case 'price_min':
            $productsSale->orderBy('price_sale', $sortDirection); // Sắp xếp theo giá bán
            break;
        case 'created_on':
            // Nếu là trường created_on, sử dụng created_at để sắp xếp
            if ($sortDirection === 'asc') {
                $productsSale->orderBy('created_at', 'asc'); // Hàng mới nhất
            } else {
                $productsSale->orderBy('created_at', 'desc'); // Hàng cũ nhất
            }
            break;
        default:
            $productsSale->orderBy($sortField, $sortDirection); // Sắp xếp theo trường mặc định (tên)
            break;
    }

    // Lấy danh sách sản phẩm đã sắp xếp và phân trang
    $productsSale = $productsSale->paginate(12); // Sử dụng paginate để phân trang

    // Tính toán phần trăm giảm giá cho từng sản phẩm
    $productsSale->transform(function ($product) {
        if ($product->price > 0) {
            $product->discount_percentage = 100 - (($product->price_sale / $product->price) * 100);
        } else {
            $product->discount_percentage = 0;
        }
        return $product;
    });

    // Lấy danh sách sản phẩm bán chạy nhất
    $bestSaller = AdminProducts::select('products.*')
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->selectRaw('SUM(order_items.quantity) as total_quantity')
        ->groupBy('products.id')
        ->orderBy('total_quantity', 'desc')
        ->limit(4)
        ->get();

    // Tính toán phần trăm giảm giá cho sản phẩm bán chạy
    $bestSaller->transform(function ($productSeller) {
        if ($productSeller->price > 0) {
            $productSeller->discount_percentage = 100 - (($productSeller->price_sale / $productSeller->price) * 100);
        } else {
            $productSeller->discount_percentage = 0;
        }
        return $productSeller;
    });

    return view('client.clientcategories.listcategories', compact('listCategories', 'productsSale', 'bestSaller', 'banners', 'categories', 'sortBy'));
}



    



    // public function index()
    // {
    //     $categories = Category::all();
    //     return view("Client.ClientCategories.ListCategories", compact('categories'));
    // }

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
