<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickKart - Payment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Secure payment page for QuickKart. Complete your order with Razorpay.">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment-page.css') }}">

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    @include('theme-part.header')

    <div class="container">
        <div class="payment-container">
            <div class="payment-header">
                <h2>Complete Your Payment</h2>
                <p>Order #{{ $order_id }}</p>
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="order-detail">
                    <span>Order Total</span>
                    <span>₹{{ number_format($amount, 2) }}</span>
                </div>
                <div class="order-detail">
                    <span>Taxes</span>
                    <span>Included</span>
                </div>
                <div class="order-total">
                    <span>Total</span>
                    <span>₹{{ number_format($amount, 2) }}</span>
                </div>
            </div>

            <div class="payment-methods">
                <span>Secured Payment via</span><br>
                <img src="{{ asset('images/razorpay-logo.png') }}" alt="Razorpay" title="Razorpay">
            </div>

            <form id="paymentForm">
                <input type="hidden" id="amount" value="{{ $amount }}">
                <input type="hidden" id="order_id" value="{{ $order_id }}">
                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
                <button type="button" id="pay-btn" class="btn btn-primary">
                    <i class="bi bi-credit-card me-2"></i>Pay ₹{{ number_format($amount, 2) }}
                </button>
            </form>

            <div class="spinner" id="loading-spinner"></div>

            <!-- Success animation -->
            <div id="success-container" style="display: none; text-align: center;">
                <svg class="checkmark" id="success-animation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
                <div class="mt-3">
                    <h4>Payment Successful!</h4>
                    <p>Your order has been placed successfully.</p>
                    <a href="/orders" class="btn btn-success mt-3">View Orders</a>
                </div>
            </div>

            <div class="security-badge mt-3">
                <i class="bi bi-shield-check"></i> Your payment is secure and encrypted
            </div>
        </div>
    </div>

    @include('theme-part.footer')

    <script>
        document.getElementById('pay-btn').onclick = function(e) {
            const amount = document.getElementById('amount').value;
            const orderId = document.getElementById('order_id').value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.getElementById('loading-spinner').style.display = 'block';
            document.getElementById('pay-btn').disabled = true;
            document.getElementById('pay-btn').innerHTML = 'Processing...';

            // Use FormData for the request
            const formData = new FormData();
            formData.append('amount', amount);
            formData.append('order_id', orderId);
            formData.append('_token', token);

            fetch('/create_order', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    body: formData
                })
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Server responded with status: ' + res.status);
                    }
                    return res.json();
                })
                .then(order => {
                    document.getElementById('loading-spinner').style.display = 'none';
                    document.getElementById('pay-btn').disabled = false;
                    document.getElementById('pay-btn').innerHTML = '<i class="bi bi-credit-card me-2"></i>Pay ₹' + parseFloat(amount).toFixed(2);

                    if (order.error) {
                        alert("Failed to create order: " + order.error);
                        return;
                    }

                    const options = {
                        "key": "rzp_test_cF1Zbsgks1AQbM", // Using the key directly for troubleshooting
                        "amount": order.amount,
                        "currency": "INR",
                        "name": "QuickKart",
                        "description": "Payment for Order #" + order.order_ref,
                        "order_id": order.id,
                        "handler": function(response) {
                            document.getElementById('loading-spinner').style.display = 'block';
                            document.getElementById('pay-btn').style.display = 'none';

                            // Verify payment on the server
                            const verifyData = new FormData();
                            verifyData.append('order_id', response.razorpay_order_id);
                            verifyData.append('payment_id', response.razorpay_payment_id);
                            verifyData.append('signature', response.razorpay_signature);
                            verifyData.append('order_ref', orderId);
                            verifyData.append('_token', token);

                            fetch('/razorpay/verify', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': token
                                    },
                                    body: verifyData
                                })
                                .then(res => {
                                    if (!res.ok) {
                                        throw new Error('Server responded with status: ' + res.status);
                                    }
                                    return res.json();
                                })
                                .then(data => {
                                    document.getElementById('loading-spinner').style.display = 'none';

                                    if (data.success) {
                                        document.getElementById('success-container').style.display = 'block';
                                    } else {
                                        alert("Payment verification failed: " + data.message);
                                        document.getElementById('pay-btn').style.display = 'block';
                                    }
                                })
                                .catch(err => {
                                    document.getElementById('loading-spinner').style.display = 'none';
                                    document.getElementById('pay-btn').style.display = 'block';
                                    alert("Payment verification error: " + err.message);
                                    console.error(err);
                                });
                        },
                        "prefill": {
                            "name": "",
                            "email": "",
                            "contact": ""
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };

                    const rzp = new Razorpay(options);
                    rzp.open();
                })
                .catch(err => {
                    alert("Something went wrong. Please try again: " + err.message);
                    console.error(err);
                    document.getElementById('loading-spinner').style.display = 'none';
                    document.getElementById('pay-btn').disabled = false;
                    document.getElementById('pay-btn').innerHTML = '<i class="bi bi-credit-card me-2"></i>Pay ₹' + parseFloat(amount).toFixed(2);
                });
        }
    </script>
</body>

</html>