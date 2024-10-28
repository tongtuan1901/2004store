<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategories = Category::all();

        $productsSale = AdminProducts::with(['category', 'firstImage'])->orderBy('price_sale', 'asc')->limit(4)->get();
        $productsSale->transform(function ($product) {
            if ($product->price > 0) {
                $product->discount_percentage = 100 - (($product->price_sale / $product->price) * 100);
            } else {
                $product->discount_percentage = 0;
            }
            return $product;
        });
        $top4SPBanChay = AdminProducts::select('products.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('SUM(order_items.quantity) as total_quantity')
            ->groupBy('products.id')
            ->orderBy('total_quantity', 'desc')
            ->limit(4)
            ->get();
        // dd($products);
        return view('Client.home',compact('listCategories','productsSale','top4SPBanChay'));
    }

    public function show(string $id)
    {
        $productDetail = AdminProducts::with(['category', 'firstImage'])->findOrFail($id);
        return view('Client.ClientProducts.ClientDetailProduct',compact('productDetail'));
    }
}
