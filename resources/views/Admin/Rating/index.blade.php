@extends('Admin/layouts/master/master')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách đánh giá</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Người dùng</th>
                    <th>Điểm đánh giá</th>
                    <th>Bình luận</th> 
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
            @foreach($reviews as $review)
<tr>
    <td>{{ $review->id }}</td>
    <td>{{ $review->product ? $review->product->name : 'Sản phẩm không tìm thấy' }}</td>
    <td>{{ $review->user ? $review->user->name : 'Người dùng không tìm thấy' }}</td>
    <td>{{ $review->rating }} sao</td>
    <td>{{ $review->created_at->format('d-m-Y') }}</td>
    <td>
        <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-primary btn-sm">Xem</a>
    </td>
</tr>
@endforeach
=======
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->product->name }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->rating }} sao</td>
                        <td>{{ \Illuminate\Support\Str::limit($review->comment, 50) }}</td> 
                        <td>{{ $review->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
                @endforeach
>>>>>>> 0bd7d0e9e95ad7355468b853abc3da75a62e8448
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $reviews->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection