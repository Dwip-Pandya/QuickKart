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
</head>

<body>

    <!-- Header Include with Categories Data -->
    @include('theme-part.header', ['categories' => $categories])

    <!-- Hero Section with Video Background -->
    <section class="hero-section position-relative overflow-hidden">
        <!-- Video Background -->
        <div class="video-container">
            <video autoplay muted loop playsinline class="hero-video">
                <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-overlay"></div>
        </div>

        <!-- Hero Content -->
        <div class="container hero-content">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-8 col-md-10">
                    <div class="hero-text text-white fade-in">
                        <h1 class="display-3 fw-bold mb-3">Shop Smarter, Live Better!</h1>
                        <h4 class="fw-light mb-4">
                            Explore the best deals on electronics, clothing, and more – all in one place!
                        </h4>
                        <div class="hero-buttons">
                            <a href="#" class="btn btn-primary btn-lg shop-now-btn me-3 mb-2 mb-md-0">Shop Now</a>
                            <a href="/about" class="btn btn-outline-light btn-lg explore-btn">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Controls -->
        <button class="video-control" aria-label="Play/Pause video">
            <i class="fas fa-pause" id="control-icon"></i>
        </button>
    </section>
    <!-- Hero Section Ends -->
    <!-- Top of This Month Section -->
    @if(isset($topProduct) && $topProduct)
    <section class="container my-5">
        <h2 class="mb-4">Top of This Month</h2>
        <div class="card shadow-sm p-3">
            <div class="row align-items-center">
                <!-- Left Side (70%) -->
                <div class="col-md-8 d-flex">
                    <div class="me-3" style="flex: 0 0 40%;">
                        <img src="{{ asset($topProduct->image1) }}" class="img-fluid rounded" alt="{{ $topProduct->product_name }}">
                    </div>
                    <div>
                        <h3>{{ $topProduct->product_name }}</h3>
                        <p class="text-muted">₹{{ number_format($topProduct->price, 2) }}</p>
                        <div>
                            @php
                            $rating = $topProduct->reviews->avg('product_rating') ?? 0;
                            $fullStars = floor($rating);
                            $halfStar = $rating - $fullStars >= 0.5;
                            @endphp
                            <span class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$fullStars)
                                    ★
                                    @elseif($i==$fullStars + 1 && $halfStar)
                                    ☆
                                    @else
                                    ☆
                                    @endif
                                    @endfor
                                    </span>
                                    <span class="ms-2">({{ number_format($rating, 1) }}/5)</span>
                        </div>
                        <p class="mt-2">{{ Str::limit($topProduct->description, 150) }}</p>
                        <a href="{{ route('product.details', ['id' => $topProduct->product_id]) }}" class="btn btn-primary mt-2">View Product</a>
                    </div>
                </div>

                <!-- Right Side (30%) -->
                <div class="col-md-4 border-start ps-4">
                    <h5 class="text-secondary">Top Review</h5>
                    @php
                    $topReview = $topProduct->reviews->sortByDesc('product_rating')->first();
                    @endphp

                    @if($topReview)
                    <p class="mb-1"><strong>{{ $topReview->review_title }}</strong></p>
                    <div class="text-warning mb-1">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <=$topReview->product_rating)
                            ★
                            @else
                            ☆
                            @endif
                            @endfor
                            <span class="ms-2 text-muted">({{ $topReview->product_rating }}/5)</span>
                    </div>
                    <p class="text-muted">{{ Str::limit($topReview->review_text, 100) }}</p>
                    <p class="fw-light fst-italic text-end">- {{ $topReview->user->user_name ?? 'Anonymous' }}</p>
                    @else
                    <p>No reviews yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif


    <!-- Highlighted Products Section -->
    @if(isset($highlightedProducts) && $highlightedProducts->count())
    <section class="container my-5">
        <h2 class="mb-4">Highlighted Products</h2>
        <div class="row">
            @foreach($highlightedProducts as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($product->image1) }}" class="card-img-top" alt="{{ $product->product_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text text-muted">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('product.details', ['id' => $product->product_id]) }}" class="btn btn-outline-primary">See Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif


    <!-- Footer Section -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper (for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Video Control Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const video = document.querySelector(".hero-video");
            const controlIcon = document.getElementById("control-icon");

            document.querySelector(".video-control").addEventListener("click", function() {
                if (video.paused) {
                    video.play();
                    controlIcon.classList.replace("fa-play", "fa-pause");
                } else {
                    video.pause();
                    controlIcon.classList.replace("fa-pause", "fa-play");
                }
            });
        });
    </script>

</body>

</html>