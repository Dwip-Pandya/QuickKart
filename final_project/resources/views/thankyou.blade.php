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
    <link rel="stylesheet" href="{{ asset('css/thankyou-style.css') }}">

</head>

<body>
    <!-- Header -->
    @include('theme-part.header')

    <div class="container thank-you-container">
        <div class="thank-you-card">
            <!-- Checkmark Icon Animation -->
            <div class="checkmark-circle">
                <div class="checkmark-icon">
                    <i class="fas fa-check"></i>
                </div>
            </div>

            <!-- Hero Section -->
            <div class="hero-section1">
                <h1 class="thank-you-title">Thank You for Your Purchase!</h1>
                <p class="thank-you-message">We appreciate your trust in QuickKart. Your order is being processed, and we will notify you soon!</p>
            </div>

            <!-- Order Summary Section -->
            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="summary-details">
                    <div class="summary-item">
                        <span class="summary-label">Order Number:</span>
                        <span class="summary-value">#QK283756</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Expected Delivery:</span>
                        <span class="summary-value">April 5, 2025</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Customer Support:</span>
                        <span class="summary-value">support@quickkart.com</span>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="cta-buttons">
                <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Continue Shopping</a>
                <a href="{{ route('vieworder', ['order_id' => $order->order_id]) }}" class="btn btn-primary">View Order Details</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>