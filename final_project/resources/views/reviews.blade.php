<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickKart - Online Shopping</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allreview.css') }}">

</head>

<body>

    <!-- Header Include -->
    @include('theme-part.header', ['categories' => $categories])

    <div class="container">
        <div class="top-section">
            <!-- Product Display - 70% width -->
            <div class="product-hero">
                <div class="product-image-container">
                    <img src="{{ asset($product->image1) }}" alt="{{ $product->product_name }}">
                </div>
                <div class="product-details">
                    <div class="product-category">Product</div>
                    <h1 class="product-name">{{ $product->product_name }}</h1>

                    <div class="product-rating-summary">
                        <div class="rating-stars">
                            @php
                            $avgRating = $product->reviews->avg('product_rating') ?? 0;
                            $fullStars = floor($avgRating);
                            $halfStar = $avgRating - $fullStars >= 0.5;
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                @if($i <=$fullStars)
                                ★
                                @elseif($i==$fullStars + 1 && $halfStar)
                                ★
                                @else
                                ☆
                                @endif
                                @endfor
                                </div>
                                <div class="rating-count">
                                    {{ number_format($avgRating, 1) }} ({{ $product->reviews->count() }} reviews)
                                </div>
                        </div>

                        <div class="product-price-container">
                            <div class="price-tag">
                                <span class="product-price">₹{{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                        <div class=" mt-4 mb-3">
                            <a href="{{ route('product.details', ['id' => $product->product_id]) }}" class="btn backbtn">
                                <i class="bi bi-arrow-left-circle"></i> Back to Product
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Featured Review - 30% width -->
                @if($product->reviews->count())
                @php
                $bestReview = $product->reviews->sortByDesc('product_rating')->first();
                @endphp
                <div class="featured-review">
                    <div class="featured-header">
                        <span>Top Review</span>
                        <span class="featured-badge">Featured</span>
                    </div>
                    <h3 class="featured-title">{{ ucfirst($bestReview->review_title) }}</h3>
                    <div class="featured-content">
                        <div class="featured-text">{{ $bestReview->review_text }}</div>
                        <div class="featured-footer">
                            <div class="featured-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$bestReview->product_rating)
                                    ★
                                    @else
                                    ☆
                                    @endif
                                    @endfor
                            </div>
                            <div class="featured-reviewer">by {{ $bestReview->user->user_name ?? 'Unknown User' }}</div>
                        </div>
                    </div>
                </div>
                @else
                <div class="featured-review">
                    <div class="featured-header">
                        <span>Reviews</span>
                    </div>
                    <div class="featured-content">
                        <div class="featured-text">No reviews available for this product yet. Be the first to leave a review!</div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Reviews Section - Same as before -->
            <div class="reviews-section">
                <div class="section-title">
                    Customer Reviews
                    <span class="reviews-counter">{{ $product->reviews->count() }}</span>
                </div>

                @if($product->reviews->count())
                <div class="reviews-grid">
                    @foreach($product->reviews as $review)
                    <div class="review-card">
                        <div class="review-header">
                            <h3 class="review-title">{{ ucfirst($review->review_title) }}</h3>
                            <div class="review-meta">
                                <div class="review-rating">
                                    <span class="stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <=$review->product_rating)
                                            ★
                                            @else
                                            ☆
                                            @endif
                                            @endfor
                                    </span>
                                    <span>{{ $review->product_rating }}/5</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p class="review-text">{{ $review->review_text }}</p>
                            <div class="reviewer">by {{ $review->user->user_name ?? 'Unknown User' }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="no-reviews">
                    <p>No reviews available for this product.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Footer Section -->
        @include('theme-part.footer')

        <!-- Bootstrap JS Bundle with Popper (for dropdowns) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>