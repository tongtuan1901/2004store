<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(string $id)
    {
        $productDetail = AdminProducts::with(['category', 'brand', 'images', 'variations.size', 'variations.color'])
            ->findOrFail($id);

        return view('Client.ClientProducts.ClientDetailProduct', compact('productDetail'));
    }
    
}
