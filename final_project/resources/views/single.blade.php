<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickKart - Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail-style.css') }}">
</head>

<body>
    <!-- Header -->
    @include('theme-part.header')

    <!-- Product Content -->
    <section class="product-section py-5">
        <div class="container">
            <div class="row">
                <!-- Product Image (Left Side) -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="product-image-card">
                        <div class="product-image-container">
                            <img id="mainImage" src="{{ asset($product->image1) }}" class="main-image"
                                alt="{{ $product->product_name }}" style="height: 200px; object-fit: contain;">
                        </div>

                        <!-- Thumbnail Images -->
                        <div class="thumbnail-container mt-4">
                            <div class="row g-2">
                                @foreach (['image1', 'image2', 'image3', 'image4'] as $image)
                                @if ($product->$image)
                                <div class="col-3">
                                    <div class="thumbnail" onclick="changeImage(this, '{{ asset($product->$image) }}')">
                                        <img src="{{ asset($product->$image) }}" class="main-image"
                                            alt="{{ $product->product_name }}" style="height: 200px; object-fit: contain;">
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($topReview)
                    <div class="top-review mt-4 p-3 border rounded bg-light">
                        <h5 class="mb-2">Top Review</h5>
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                            <div>
                                <strong>{{ ucfirst($topReview->review_title) }}</strong>
                                <span class="text-muted">— Rated: {{ $topReview->product_rating }}/5</span>
                            </div>
                            @if ($topReview->user)
                            <div class="text-muted fst-italic">by {{ $topReview->user->user_name }}</div>
                            @endif
                        </div>
                        <p class="mb-0">"{{ $topReview->review_text }}"</p>
                    </div>
                    @endif
                    <button class="btn reviewbtn mt-3" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                        <i class="bi bi-chat-square-text"></i> Add Review
                    </button>
                    <a href="{{ url('reviews/' . $product->product_id) }}" class="btn reviewbtn mt-3">
                        <i class="bi bi-eye"></i> View Reviews
                    </a>

                </div>
                <!-- Reviews  -->

                <!-- Product Details (Right Side) -->
                <div class="col-lg-6">
                    <div class="product-details-card">
                        <h1 class="product-title" style="font-size: 32px;">{{ $product->product_name }}</h1>
                        <!-- dynamic review  -->
                        @php
                        $filledStars = floor($averageRating);
                        $halfStar = $averageRating - $filledStars >= 0.5;
                        @endphp

                        <div class="ratings mb-3">
                            <span class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <=$filledStars)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    @elseif ($i == $filledStars + 1 && $halfStar)
                                    <i class="bi bi-star-half text-warning"></i>
                                    @else
                                    <i class="bi bi-star text-warning"></i>
                                    @endif
                                    @endfor
                            </span>
                            <span class="reviews-count">({{ $reviewsCount }} Review{{ $reviewsCount != 1 ? 's' : '' }})</span>
                        </div>


                        <!-- Price -->
                        <div class="price-container mb-4">
                            <span class="current-price" style="color: #1a365d;">{{ $product->price }}₹</span>
                            <span class="discount-badge" style="color: black;">28% OFF</span>
                        </div>

                        <!-- Product Description -->
                        <div class="product-description mb-4">
                            <h2 class="section-title">Description</h2>
                            <p>{{ $product->description }}</p>

                            <!-- Key Features -->
                            <div class="key-features mt-3">
                                @foreach (['porduct_point1', 'porduct_point2', 'porduct_point3', 'porduct_point4'] as $feature)
                                @if ($product->$feature)
                                <div class="feature-item">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ $product->$feature }}</span>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Availability & Shipping -->
                        <div class="availability-shipping mb-4">
                            <div class="availability in-stock">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>In Stock</span>
                            </div>
                            <div class="shipping">
                                <i class="bi bi-truck"></i>
                                <span>Free shipping. <strong>Estimated delivery: 2-4 business days</strong></span>
                            </div>
                        </div>

                        <!-- Add to Cart Section -->
                        <form id="addToCartForm" method="post" action="{{ route('cart.add') }}">
                            @csrf
                            <div class="add-to-cart-section">
                                <div class="row g-2 align-items-center">
                                    <div class="col-md-3">
                                        <div class="quantity-selector">
                                            <button type="button" class="qty-btn" id="decreaseBtn">-</button>
                                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                                            <button type="button" class="qty-btn" id="increaseBtn">+</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    @if(session()->has('uid'))
                                    <div class="col-md-9">
                                        <button type="submit" class="btn add-to-cart-btn" style="background-color: #1a365d; color: white;">Add to Cart</button>
                                    </div>
                                    @else
                                    <div class="col-md-9">
                                        <a href="{{ route('login') }}" class="btn btn-danger">Login is Required</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Review Modal -->
    <div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('review.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <input type="hidden" name="user_id" value="{{ session('uid') }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addReviewLabel">Add Your Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Review Title -->
                        <div class="mb-3">
                            <label for="review_title" class="form-label">Overall Experience</label>
                            <select class="form-select" name="review_title" required>
                                <option value="">-- Select --</option>
                                <option value="Excellent">Excellent</option>
                                <option value="Good">Good</option>
                                <option value="Average">Average</option>
                                <option value="Bad">Bad</option>
                                <option value="Worse">Worse</option>
                            </select>
                        </div>

                        <!-- Review Text -->
                        <div class="mb-3">
                            <label for="review_text" class="form-label">Your Review</label>
                            <textarea class="form-control" name="review_text" rows="4" required></textarea>
                        </div>

                        <!-- Rating -->
                        <div class="mb-3">
                            <label for="product_rating" class="form-label">Rating (out of 5)</label>
                            <input type="number" class="form-control" step="0.1" name="product_rating" min="0" max="5" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Footer -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Quantity selector functionality
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const quantityInput = document.getElementById('quantity');

        decreaseBtn.addEventListener('click', () => {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        increaseBtn.addEventListener('click', () => {
            if (quantityInput.value < 10) {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            }
        });
        // Image change functionality
        function changeImage(element, newSrc) {
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });

            // Add active class to clicked thumbnail
            element.classList.add('active');

            // Update the main image
            document.getElementById('mainImage').src = newSrc;
        }


        // Sticky add to cart on mobile
        window.addEventListener('scroll', function() {
            const addToCartSection = document.getElementById('stickyAddToCart');
            if (window.innerWidth < 992) {
                if (window.scrollY > 300) {
                    addToCartSection.classList.add('sticky');
                } else {
                    addToCartSection.classList.remove('sticky');
                }
            }
        });

        // Simple hover zoom effect (basic implementation)
        const mainImage = document.getElementById('mainImage');
        const zoomLens = document.querySelector('.image-zoom-lens');

        mainImage.addEventListener('mousemove', function(e) {
            const boundingRect = this.getBoundingClientRect();

            // Calculate cursor position relative to the image
            const x = e.clientX - boundingRect.left;
            const y = e.clientY - boundingRect.top;

            // Calculate position in percentage
            const xPercent = (x / boundingRect.width) * 100;
            const yPercent = (y / boundingRect.height) * 100;

            // Move the background position of the zoom lens
            zoomLens.style.backgroundImage = `url(${this.src})`;
            zoomLens.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
            zoomLens.style.display = 'block';
        });

        mainImage.addEventListener('mouseleave', function() {
            zoomLens.style.display = 'none';
        });
    </script>
</body>

</html>