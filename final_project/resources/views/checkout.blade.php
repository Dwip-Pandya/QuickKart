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
    <link rel="stylesheet" href="{{ asset('css/checkout-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart-style.css') }}">
</head>

<body>
    <!-- Header -->
    @include('theme-part.header')


    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 checkout-container">
                <h2 class="mb-4">Checkout</h2>

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($cartItems->isEmpty())
                <p>Your cart is empty.</p>
                <a href="{{ route('cart') }}" class="btn btn-primary">Return to Cart</a>
                @else
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="full_name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" name="state" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="zip" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" name="zip" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="online">UPI</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header order-summary-details">
                            <h4>Order Summary</h4>
                        </div>
                        <div class="card-body">
                            @foreach($cartItems as $cart_item)
                            <div class="d-flex justify-content-between mb-2">
                                <div>{{ $cart_item->product_name }} <small class="text-muted">(x{{ $cart_item->quantity }})</small></div>
                                <div>₹ {{ number_format($cart_item->price * $cart_item->quantity, 2) }}</div>
                            </div>
                            @endforeach
                            <hr>
                            <div class="d-flex justify-content-between"><strong>Total</strong> <strong>₹ {{ number_format($grandTotal, 2) }}</strong></div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Session::get('uid') }}">
                    <input type="hidden" name="grandTotal" value="{{ $grandTotal }}">
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Place Order</button>
                </form>
                @endif
            </div>


            <div class="col-md-4 px-4">
                <div class="card" id="shipping-info-card">
                    <div class="card-header bg-danger text-white">
                        <h4>Notice</h4>
                    </div>
                    <div class="card-body">
                        <li class="text-danger">Razorpay is temporarily unavailable. Please choose Cash on Delivery or use this scanner as an alternative payment option. We apologize for the inconvenience and appreciate your understanding.</li><br>

                        <li class="text-danger">If you Scan this UPI, select Cash on Delivery and move on</li>
                       
                    </div>
                </div>
                <div class="text-center my-3">
                    <img src="{{ asset('images/your-qr-code.jpg') }}" alt="Scan to Pay" class="img-fluid" style="max-width: 200px;">
                    <p class="mt-2">Scan to Pay</p>
                </div>
                <div class="card" id="payment-methods-card">
                    <div class="card-header">
                        <h4>Payment Methods</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-phone me-2"></i>UPI Payments</li>
                            <li><i class="bi bi-cash me-2"></i>Cash on Delivery</li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-3" id="shipping-info-card">
                    <div class="card-header">
                        <h4>Shipping Information</h4>
                    </div>
                    <div class="card-body">
                        <p>Standard Shipping: ₹0</p>
                        <p>Fast Shipping: ₹50</p>
                        <p>Estimated Delivery: 5-7 Business Days</p>
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