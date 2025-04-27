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
    <link rel="stylesheet" href="{{ asset('css/vieworder-style.css') }}">
</head>

<body>
    <!-- Header -->
    @include('theme-part.header')


    <div class="container view-order-container">
        <div class="order-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1>Your Order Details</h1>
                    <p class="order-number">Order #{{ $orderNumber }} - Placed on {{ $orderDate }}</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="status-badge {{ $statusClass }}">{{ $status }}</span>
                </div>
            </div>
        </div>

        <div class="order-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="order-items">
                        <h2>Ordered Items</h2>
                        @foreach($orderItems as $item)
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="width: 100px;" src="{{ asset($item->image1 ?? 'placeholder.jpg') }}" alt="{{ $item->product_name }}">
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $item->product_name }}</h3>
                                    <p>{{ $item->description ?? 'No description available' }}</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="price-item">
                                        <span class="label">Price:</span>
                                        <span class="value">₹{{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <div class="price-item">
                                        <span class="label">Quantity:</span>
                                        <span class="value">{{ $item->quantity }}</span>
                                    </div>
                                    <div class="price-item subtotal">
                                        <span class="label">Subtotal:</span>
                                        <span class="value">₹{{ number_format($item->price * $item->quantity, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <a href="{{ route('myorders') }}" class="btn" style="background-color: #1a365d; color: aliceblue;">View All Orders</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-summary">
                        <h2>Order Summary</h2>

                        <h3>Shipping Address</h3><br>
                        <p>{{ $userDetails->user_name }}</p>
                        <p>{{ $orderDetails->shipping_address }}</p>
                        <p>{{ $orderDetails->city }}, {{ $orderDetails->state }} {{ $orderDetails->zip }}</p>
                        <p>India</p>
                        <hr>


                        <h3>Payment Method</h3>
                        <p><i class="fas fa-credit-card"></i> {{ $orderDetails->payment_method }}</p>
                        <hr>

                        <h3>Delivery Details</h3>
                        <p>Expected Delivery: <strong>{{ $deliveryDate }}</strong></p>
                        <hr>

                        <h3>Price Breakdown</h3>
                        <p>Subtotal: ₹{{ number_format($subtotal, 2) }}</p>
                        <p>Shipping: ₹{{ number_format($shipping, 2) }}</p>
                        <p>Discount: ₹{{ number_format($discount, 2) }}</p>
                        <p>Tax: ₹{{ number_format($tax, 2) }}</p>
                        <p><strong>Total: ₹{{ number_format($grandTotal, 2) }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>