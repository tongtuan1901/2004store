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
    public function showProductReviewForm(AdminOrder $order, AdminProducts $product)
    {
        if ($order->status !== 'Hoàn thành' || $order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Bạn không thể đánh giá đơn hàng này.');
        }
        return view('Client.ClientRating.create', compact('order', 'product'));
    }
    

    public function submitReview(Request $request, AdminOrder $order, AdminProducts $product)
    {
        $userId = Auth::id();
    
        // Kiểm tra xem đơn hàng đã hoàn thành và thuộc về người dùng hiện tại
        if ($order->status !== 'Hoàn thành' || $order->user_id !== $userId) {
            return redirect()->back()->with('error', 'Bạn không thể đánh giá đơn hàng này.');
        }
    
        // Lưu review vào bảng Review
        Review::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);
    
        // Chuyển hướng đến trang chi tiết sản phẩm sau khi gửi review
        return redirect()->route('client-products.show', ['client_product' => $product->id])
                         ->with('success', 'Đánh giá của bạn đã được gửi.');
    }
    


    
}


