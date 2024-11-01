@extends('Admin1.layouts.master')
@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
                    <div class="card">
                        <div class="card-header">
                            <h1 style="font-size: 1.5em; font-weight: bold; color: #333;">Chi tiết đánh giá</h1>
                        </div>
                        <div class="card-body" style="line-height: 1.6;">
                            <p><strong>ID:</strong> {{ $review->id }}</p>
                            <p><strong>Sản phẩm:</strong>
                                <span style="display: inline-flex; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="blue" style="margin-right: 5px;">
                                        <path d="M5 4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H5zm14 14H5V6h14v12zm-5-7c.55 0 1-.45 1-1s-.45-1-1-1H8c-.55 0-1 .45-1 1s.45 1 1 1h6zm0 4c.55 0 1-.45 1-1s-.45-1-1-1H8c-.55 0-1 .45-1 1s.45 1 1 1h6z"/>
                                    </svg>
                                    {{ $review->product->name }}
                                </span>
                            </p>
                            <p><strong>Người dùng:</strong>
                                <span style="display: inline-flex; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="gray" style="margin-right: 5px;">
                                        <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z"/>
                                    </svg>
                                    {{ $review->user->name }}
                                </span>
                            </p>
                            <p><strong>Điểm đánh giá:</strong>
                                <span style="display: inline-flex;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="{{ $i <= $review->rating ? 'orange' : '#e0e0e0' }}" style="margin-right: 2px;">
                                            <path d="M12 2l2.09 6.26L20 9.27l-4.5 4.2L17.5 20 12 16.9 6.5 20l2-6.53L4 9.27l5.91-.97L12 2z"/>
                                        </svg>
                                    @endfor
                                </span>
                            </p>
                            <p><strong>Bình luận:</strong> {{ $review->comment }}</p>
                            <p><strong>Ngày tạo:</strong> {{ $review->created_at->format('d-m-Y') }}</p>
                        </div>
                        <div class="card-footer" style="text-align: center; padding-top: 15px;">
                            <a href="{{ route('admin.reviews.index') }}" class="btn" style="background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay lại danh sách đánh giá</a>
                        </div>
                    </div>                    
                                       
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection