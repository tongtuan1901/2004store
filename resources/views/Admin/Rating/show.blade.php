@extends('Admin/layouts/master/master')

@section('content')

<div class="card">
    <div class="card-header">
        <h1>Chi tiết đánh giá</h1>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $review->id }}</p>
        <p><strong>Sản phẩm:</strong> <span class="badge badge-info">{{ $review->product->name }}</span></p>
        <p><strong>Người dùng:</strong> <span class="badge badge-secondary">{{ $review->user->name }}</span></p>
        <p><strong>Điểm đánh giá:</strong> <span class="badge badge-warning">{{ $review->rating }} sao</span></p>
        <p><strong>Bình luận:</strong> {{ $review->comment }}</p>
        <p><strong>Ngày tạo:</strong> {{ $review->created_at->format('d-m-Y') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">Quay lại danh sách đánh giá</a>
    </div>
</div>

@endsection