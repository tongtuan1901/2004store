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
        return view('Admin1.Rating.index', compact('reviews'));
    }

    // Hiển thị chi tiết một đánh giá
    public function show(Review $review)
    {
        return view('Admin1.Rating.show', compact('review'));
    }
}
