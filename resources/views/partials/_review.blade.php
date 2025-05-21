@foreach ($reviews as $review)
    <div class="customer-review">
        <div class="customer-info">
            <div class="customer-name">
                <a href="javascript:void(0);"><img
                        src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
                        alt="User"></a>
                <div>
                    <h5><a href="javascript:void(0);">{{ $review->name }}</a></h5>
                    <p>{{ $review->created_at->format('d M Y') }}</p>
                </div>
            </div>
            <div class="rating">
                <span class="rating-count">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->star)
                            <i class="fa-solid fa-star checked"></i>
                        @else
                            <i class="fa-solid fa-star"></i>
                        @endif
                    @endfor
                </span>
                <p class="rating-review"><span>{{ number_format($review->star, 1) }}</span></p>
            </div>
        </div>
        <div class="review-para">
            <p>{{ $review->comment }}</p>
        </div>
    </div>
@endforeach
