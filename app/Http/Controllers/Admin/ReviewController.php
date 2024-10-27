<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\AdminProducts;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::with('product', 'user')->paginate(10); // Phân trang 10 đánh giá mỗi trang
        return view('admin.Rating.index', compact('reviews'));
    }

    // Hiển thị chi tiết một đánh giá
    public function show(Review $review)
    {
        return view('admin.Rating.show', compact('review'));
    }
    public function store(Request $request, $productId)
    {
            
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được lưu.');
    }
}
