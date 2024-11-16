<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\AdminProducts;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientReviewsController extends Controller
{
    public function showReviewForm(AdminOrder $order)
    {
        // Kiểm tra xem đơn hàng đã hoàn thành và thuộc về người dùng hiện tại chưa
        if ($order->status !== 'Hoàn thành' || $order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Bạn không thể đánh giá đơn hàng này.');
        }

        // Lấy các sản phẩm trong đơn hàng để đánh giá
        $products = $order->products;

        return view('Client.ClientRating.create', compact('order', 'products'));
    }

    public function submitReview(Request $request, AdminOrder $order)
{
    $userId = Auth::id();

    foreach ($request->reviews as $productId => $reviewData) {
        Review::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $reviewData['rating'],
            'comment' => $reviewData['comment'],
        ]);
    }

    // Redirect về trang chi tiết sản phẩm sau khi gửi review
    return redirect()->route('client-products.show', ['client_product' => $productId])
                     ->with('success', 'Đánh giá của bạn đã được gửi.');
}

    
}


