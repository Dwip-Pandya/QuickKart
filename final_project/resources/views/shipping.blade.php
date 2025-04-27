<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickKart - Shipping & Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shipping.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
     <!-- Header -->
     @include('theme-part.header')

    <!-- Navigation breadcrumb -->
    <div class="container-md mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shipping & Delivery</li>
            </ol>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="container-md">
        <div class="hero-section3 text-center py-5">
            <h2>Shipping & Delivery</h2>
            <p class="subtitle">Learn more about how we deliver your products swiftly and safely.</p>
        </div>

        <!-- Content Cards -->
        <div class="row justify-content-center mb-5">
            <!-- Standard Shipping -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="delivery-card">
                    <div class="card-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h3>Standard Shipping</h3>
                    <div class="pricing">
                        <span class="price">₹50</span>
                    </div>
                    <p>Delivery Time: 5–7 Business Days</p>
                    <p>Available across all serviceable locations in India</p>
                </div>
            </div>

            <!-- Express Shipping -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="delivery-card">
                    <div class="card-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h3>Express Delivery</h3>
                    <div class="pricing">
                        <span class="price">₹100</span>
                    </div>
                    <p>Delivery Time: 1–3 Business Days</p>
                    <p>Available in select metro cities</p>
                </div>
            </div>

            <!-- Free Shipping -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="delivery-card">
                    <div class="card-icon">
                        <i class="bi bi-gift"></i>
                    </div>
                    <h3>Free Shipping</h3>
                    <div class="pricing">
                        <span class="price free">FREE</span>
                    </div>
                    <p>On orders above ₹500</p>
                    <p>Standard delivery timeframe applies</p>
                </div>
            </div>

            <!-- Same Day Delivery -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="delivery-card">
                    <div class="card-icon">
                        <i class="bi bi-alarm"></i>
                    </div>
                    <h3>Same Day Delivery</h3>
                    <div class="pricing">
                        <span class="price">₹150</span>
                    </div>
                    <p>Orders placed before 12 PM</p>
                    <p>Available only in select areas</p>
                </div>
            </div>
        </div>

        <!-- Detailed Information Sections -->
        <div class="info-sections">
            <!-- Delivery Areas -->
            <div class="info-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-geo-alt info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Delivery Areas</h3>
                        <p>We currently deliver across India to over 18,000 pin codes. Enter your pin code during checkout to check availability and estimated delivery time for your area.</p>
                        <p>Some remote areas might have longer delivery timeframes or limited delivery options. We're constantly expanding our network to reach more locations.</p>
                    </div>
                </div>
            </div>

            <!-- Order Tracking -->
            <div class="info-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-search info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Tracking Your Order</h3>
                        <p>Track your order in real-time through these convenient options:</p>
                        <ul>
                            <li>"My Orders" section in your QuickKart account</li>
                            <li>Tracking link sent via email after dispatch</li>
                            <li>SMS updates on your registered mobile number</li>
                        </ul>
                        <p>Once dispatched, you'll receive notifications at key milestones until delivery.</p>
                    </div>
                </div>
            </div>

            <!-- Potential Delays -->
            <div class="info-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-exclamation-triangle info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Potential Delays</h3>
                        <p>While we strive to deliver on time, occasional delays may occur due to:</p>
                        <ul>
                            <li>Adverse weather conditions (heavy rain, floods)</li>
                            <li>Public holidays or festival seasons</li>
                            <li>Local restrictions or strikes</li>
                            <li>Incomplete or incorrect address information</li>
                        </ul>
                        <p>We'll always keep you informed in case of any expected delays.</p>
                    </div>
                </div>
            </div>

            <!-- Shipping Policy -->
            <div class="info-card">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-file-text info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Shipping Policy</h3>
                        <p>Important information about our shipping process:</p>
                        <ul>
                            <li>Orders are processed within 24 hours on business days</li>
                            <li>Multiple items may ship separately to ensure faster delivery</li>
                            <li>Someone must be available to receive the package at delivery</li>
                            <li>Address changes cannot be made after an order is dispatched</li>
                            <li>For specific shipping requirements, please contact customer service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="shipping-faq mt-5 mb-5">
            <h3 class="text-center mb-4">Frequently Asked Questions</h3>
            <div class="accordion" id="shippingFaq">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="shippingQ1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shippingA1" aria-expanded="false" aria-controls="shippingA1">
                            Can I change my delivery address after placing an order?
                        </button>
                    </h4>
                    <div id="shippingA1" class="accordion-collapse collapse" aria-labelledby="shippingQ1" data-bs-parent="#shippingFaq">
                        <div class="accordion-body">
                            Yes, you can change your delivery address as long as your order hasn't been dispatched. Contact our customer service team immediately with your order number and new address details. Once an order is dispatched, address changes are not possible.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="shippingQ2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shippingA2" aria-expanded="false" aria-controls="shippingA2">
                            What happens if I'm not available to receive my delivery?
                        </button>
                    </h4>
                    <div id="shippingA2" class="accordion-collapse collapse" aria-labelledby="shippingQ2" data-bs-parent="#shippingFaq">
                        <div class="accordion-body">
                            If you're not available to receive your delivery, our delivery partner will make one additional attempt the next business day. If the second delivery attempt is unsuccessful, the package will be returned to our facility. You will receive a notification to reschedule the delivery or arrange for pickup.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="shippingQ3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shippingA3" aria-expanded="false" aria-controls="shippingA3">
                            Do you deliver on weekends and holidays?
                        </button>
                    </h4>
                    <div id="shippingA3" class="accordion-collapse collapse" aria-labelledby="shippingQ3" data-bs-parent="#shippingFaq">
                        <div class="accordion-body">
                            Yes, we deliver on Saturdays in most locations. Sunday and holiday deliveries are available in select metro cities for Express and Same Day delivery options. During major national holidays, delivery services might be limited. The expected delivery date shown at checkout takes these factors into account.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-section text-center py-4 mb-5">
            <h3>Need more information?</h3>
            <p>Our customer service team is available to assist you with any shipping inquiries</p>
            <a href="/contact" class="btn btn-primary mt-2">Contact Us</a>
        </div>
    </div>

    <!-- Footer -->
    @include('theme-part.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>