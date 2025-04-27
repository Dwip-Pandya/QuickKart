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
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">

</head>

<body>

    <!-- Header Include with Categories Data -->
    @include('theme-part.header', ['categories' => $categories])

    <div class="container py-4">
        <h2 class="mb-4">My Reviews</h2>

        @if ($reviews->count())
        <div class="row">
            @foreach ($reviews as $review)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4">
                            @if ($review->product && $review->product->image1)
                            <img src="{{ asset($review->product->image1) }}" class="img-fluid rounded-start"
                                alt="{{ $review->product->product_name }}" style="object-fit: contain; height: 150px;">
                            @else
                            <img src="{{ asset('default-image.jpg') }}" class="img-fluid rounded-start" alt="No Image">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review->product->product_name ?? 'Product Not Found' }}</h5>
                                <p class="mb-1"><strong>Rating:</strong> {{ $review->product_rating }}/5</p>
                                <p class="mb-1"><strong>Title:</strong> {{ ucfirst($review->review_title) }}</p>
                                <p class="mb-0"><strong>Your Review:</strong> {{ $review->review_text }}</p>
                                <form action="{{ route('review.destroy', $review->review_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info">You haven't reviewed any products yet.</div>
        @endif
    </div>

    <!-- Footer Section -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper (for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>