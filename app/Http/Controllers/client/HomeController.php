<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Banners;

use App\Models\AdminProducts;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $banners = Banners::where('deleted', false)->get();
        $listCategories = Category::all();
        $categories = Category::all(); 
        $productsSale = AdminProducts::with(['category', 'firstImage'])
            ->orderBy('price_sale', 'asc')
            ->limit(4)
            ->get();
    
        $productsSale->transform(function ($product) {
            if ($product->price > 0) {
                $product->discount_percentage = 100 - (($product->price_sale / $product->price) * 100);
            } else {
                $product->discount_percentage = 0;
            }
            return $product;
        });
    
        // Truy vấn để lấy top 5 sản phẩm bán chạy nhất dựa trên tổng số lượng đã bán
        // $bestSaller = AdminProducts::select('products.*')
        //     ->join('order_items', 'products.id', '=', 'order_items.product_id')
        //     ->selectRaw('SUM(order_items.quantity) as total_quantity')
        //     ->groupBy('products.id')
        //     ->orderByDesc('total_quantity')
        //     ->limit(5)
        //     ->get();
        
        $bestSaller = AdminProducts::select('products.*')
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->selectRaw('SUM(order_items.quantity) as total_quantity')
        ->groupBy('products.id')
        ->orderByDesc('total_quantity')
        ->limit(5)
        ->get();
    

    
        $bestSaller->transform(function ($productSeller) {
            if ($productSeller->price > 0) {
                $productSeller->discount_percentage = 100 - (($productSeller->price_sale / $productSeller->price) * 100);
            } else {
                $productSeller->discount_percentage = 0;
            }
            return $productSeller;
        });
    
        return view('Client.home', compact('listCategories', 'productsSale', 'bestSaller', 'banners', 'categories'));
    }
    
}