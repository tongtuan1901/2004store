<?php

namespace App\Http\Controllers\client;

use App\Models\Brand;
use App\Models\Banners;


use App\Models\AdminProducts;



use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banners::where('deleted', false)->get();

    $listCategories = Category::all();
    $categories = Category::all(); 
   

       

        $productsSale = AdminProducts::with(['category', 'firstImage'])->orderBy('price_sale', 'asc')->limit(4)->get();
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
        
        // $bestSaller = AdminProducts::select('products.*')
        //     ->join('order_items', 'products.id', '=', 'order_items.product_id')
        //     ->selectRaw('SUM(order_items.quantity) as total_quantity')
        //     ->groupBy('products.id')
        //     ->orderBy('total_quantity', 'desc')
        //     ->limit(4)
        //     ->get();

        $bestSaller = AdminProducts::select('products.*')
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->selectRaw('SUM(order_items.quantity) as total_quantity')
        ->groupBy('products.id')
        ->orderByDesc('total_quantity')
        ->limit(5)
        ->get();

        // $bestSaller->transform(function ($productSeller) {
        //     if ($productSeller->price > 0) {
        //         $productSeller->discount_percentage = 100 - (($productSeller->price_sale / $productSeller->price) * 100);
        //     } else {
        //         $productSeller->discount_percentage = 0;
        //     }
        //     return $productSeller;
        // });

        //list 3 tin tức
        $latestNews = News::orderBy('created_at', 'desc')->take(3)->get();
        // dd($products);

        return view('Client.home', compact('listCategories', 'productsSale', 'bestSaller', 'banners', 'categories','listBrands','latestNews'));

        $listBrands = Brand::all();
        $news = News::latest()->limit(5)->get();

        return view('Client.home',compact('listCategories','productsSale','bestSaller','banners','categories','listBrands','news'));

        



        /**
         * Store a newly created resource in storage.
         */


        /**
         * Display the specified resource.
         */

        // public function show(string $id)
        // {
        //     $productDetail = AdminProducts::with(['category', 'firstImage'])->findOrFail($id);
        //     return view('Client.ClientProducts.ClientDetailProduct',compact('productDetail'));
        // }
    }
}
