<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(string $id){
    {
        // $productsSale->transform(function ($product) {
        //     if ($product->price > 0) {
        //         $product->discount_percentage = 100 - (($product->price_sale / $product->price) * 100);
        //     } else {
        //         $product->discount_percentage = 0;
        //     }
        //     return $product;
        // });
        $productDetail = AdminProducts::with(['category'])->findOrFail($id);
        return view('Client.ClientProducts.ClientDetailProduct', compact('productDetail'));
    }
        $productDetail = AdminProducts::with(['category', 'brand', 'images', 'variations.size', 'variations.color'])
            ->findOrFail($id);

        return view('Client.ClientProducts.ClientDetailProduct', compact('productDetail'));
    }
    
}
