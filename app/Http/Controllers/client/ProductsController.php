<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\AdminProducts;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(string $id)
    {
        $productDetail = AdminProducts::with(['category', 'brand', 'images', 'variations.size', 'variations.color', 'comments.user','reviews.user'])->latest()
            ->findOrFail($id);
        $relatedProducts = AdminProducts::where('category_id', $productDetail->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();

            //lấy giảm
            // $ggiaSale = $productDetail->transform(function ($product) {
            //     if ($product->price > 0) {
            //         $product->discount_percentage = 100 - (($product->price_sale / $product->price) * 100);
            //     } else {
            //         $product->discount_percentage = 0;
            //     }
            //     return $product;
            // });
        

        return view('Client.ClientProducts.ClientDetailProduct', compact('productDetail', 'relatedProducts'));
    }

    public function storeComment(Request $request, $productId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('client-products.show', $productId)->with('success', 'Bình luận của bạn đã được gửi.');
    }
}
