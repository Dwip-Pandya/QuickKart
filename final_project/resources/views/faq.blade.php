<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickKart - Frequently Asked Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
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
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="container-md">
        <div class="hero-section1 text-center">
            <h2>Frequently Asked Questions</h2>
            <p class="subtitle">We've compiled answers to common questions for your convenience.</p>
        </div>

        <!-- Search Bar -->
        <div class="search-container mb-4">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" id="faq-search" placeholder="Search FAQs...">
            </div>
        </div>

        <!-- FAQ Accordion -->
        <div class="accordion mb-5" id="faqAccordion">
            <!-- Order Tracking -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-truck me-2"></i> How do I track my order?
                    </button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can track your order by logging into your QuickKart account and visiting the "My Orders" section. Click on the specific order you want to track, and you'll see the current status. We also send tracking updates via email and SMS once your order is dispatched.
                    </div>
                </div>
            </div>

            <!-- Cancellation -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="bi bi-x-circle me-2"></i> Can I cancel or change my order?
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, you can cancel your order as long as it hasn't been dispatched. Go to "My Orders," find the order you wish to cancel, and click the "Cancel Order" button. For changes to your order, please contact our customer service as soon as possible. Once an order is dispatched, it cannot be changed or canceled.
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="bi bi-credit-card me-2"></i> What payment methods are accepted?
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        QuickKart accepts multiple payment methods including:
                        <ul>
                            <li>Credit and Debit Cards (Visa, MasterCard, Rupay)</li>
                            <li>Net Banking</li>
                            <li>UPI (Google Pay, PhonePe, Paytm)</li>
                            <li>Digital Wallets (Amazon Pay, Paytm Wallet)</li>
                            <li>Cash on Delivery (COD)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cash on Delivery -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i class="bi bi-cash-stack me-2"></i> Do you offer cash on delivery?
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, we offer Cash on Delivery (COD) for most locations across India. However, there might be a limit on the maximum order value for COD orders (typically ₹15,000). COD may also be restricted for certain high-value products or during promotional events. You can check COD availability at checkout.
                    </div>
                </div>
            </div>

            <!-- Product Returns -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <i class="bi bi-arrow-return-left me-2"></i> How do I return a product?
                    </button>
                </h3>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        To return a product:
                        <ol>
                            <li>Go to "My Orders" in your QuickKart account</li>
                            <li>Select the order containing the item you want to return</li>
                            <li>Click "Return Item" and select the specific product</li>
                            <li>Choose a reason for return and submit the request</li>
                            <li>Pack the item in its original packaging</li>
                            <li>Our delivery partner will pick up the item on the scheduled date</li>
                        </ol>
                        Please note that returns are only accepted within 7 days of delivery, and the product must be unused and in its original packaging.
                    </div>
                </div>
            </div>

            <!-- Delivery Times -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <i class="bi bi-clock-history me-2"></i> How long will my delivery take?
                    </button>
                </h3>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Standard delivery typically takes 5-7 business days across India. Metro cities usually receive deliveries within 3-5 business days. The exact delivery time will be shown at checkout based on your location and the items in your cart. For expedited options, please check our Shipping & Delivery page.
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-section text-center py-4 mb-5">
            <h3>Still have questions?</h3>
            <p>Our customer service team is here to help you</p>
            <a href="#" class="btn btn-primary mt-2">Contact Us</a>
        </div>
    </div>

    <!-- Footer -->
        <!-- Header -->
        @include('theme-part.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>