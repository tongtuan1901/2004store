<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(string $id)
    {
<<<<<<< HEAD
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
=======
        $productDetail = AdminProducts::with(['category', 'brand', 'images', 'variations.size', 'variations.color'])
            ->findOrFail($id);
>>>>>>> 7c530d06ed645330b04d4db4ea81a9e5786f4856

        return view('Client.ClientProducts.ClientDetailProduct', compact('productDetail'));
    }
    
}
