@extends('Client.layouts.paginate.master')

@section('contentClient')
<h2 class="text-center mt-4">Đánh giá sản phẩm "{{ $product->name }}" của đơn hàng #{{ $order->id }}</h2>

<form action="{{ route('client.product.submitReview', ['order' => $order->id, 'product' => $product->id]) }}" method="POST" class="container mt-4 p-4 border rounded">
    @csrf
    <div class="product-review mb-4 p-3 border-bottom">
        <div class="form-group">
            <label class="form-label d-block">Đánh giá:</label>
            <div class="rating" data-product-id="{{ $product->id }}">
                @for ($i = 1; $i <= 5; $i++)
                <span class="material-icons rating-star text-gray-400 cursor-pointer" data-value="{{ $i }}">
                    star_outline
                </span>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating-{{ $product->id }}" value="0">
        </div>

        <div class="form-group mt-3">
            <label for="comment-{{ $product->id }}" class="form-label">Nhận xét:</label>
            <textarea name="comment" id="comment-{{ $product->id }}" rows="4" class="form-control"></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
</form>
<style>
    .rating-star {
    font-size: 36px; /* Kích thước ngôi sao */
    transition: color 0.3s ease, transform 0.3s ease;
    }

    .rating-star:hover,
    .rating-star.active {
        color: #ffcc00; /* Màu vàng */
        transform: scale(1.2);
    }
</style>
<script>
    document.querySelectorAll('.rating').forEach(ratingContainer => {
        const productId = ratingContainer.getAttribute('data-product-id');
        const stars = ratingContainer.querySelectorAll('.rating-star');
        const hiddenInput = document.getElementById(`rating-${productId}`);

        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                stars.forEach(s => s.classList.remove('active'));
                for (let i = 0; i < star.dataset.value; i++) {
                    stars[i].classList.add('active');
                }
            });

            star.addEventListener('click', () => {
                hiddenInput.value = star.dataset.value;
            });
        });

        ratingContainer.addEventListener('mouseleave', () => {
            const value = hiddenInput.value;
            stars.forEach(s => s.classList.remove('active'));
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('active');
            }
        });
    });
</script>

@endsection
