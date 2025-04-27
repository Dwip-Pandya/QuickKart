<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickKart - Returns & Refunds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/return.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <!-- Header -->
    @include('theme-part.header');

    <!-- Navigation breadcrumb -->
    <div class="container-md mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Returns & Refunds</li>
            </ol>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="container-md">
        <div class="hero-section2 text-center py-5">
            <h2>Returns & Refunds</h2>
            <p class="subtitle">Your satisfaction is our priority. Here's how you can initiate a return or refund.</p>
        </div>

        <!-- Policy Highlights -->
        <div class="policy-highlights mb-5">
            <div class="row">
                <!-- Return Window -->
                <div class="col-md-4 mb-4">
                    <div class="policy-card">
                        <div class="card-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h3>Return Window</h3>
                        <p>Products are returnable within <strong>7 days</strong> of delivery</p>
                        <ul>
                            <li>Must be unused and undamaged</li>
                            <li>Original packaging required</li>
                            <li>All accessories & free gifts included</li>
                        </ul>
                    </div>
                </div>

                <!-- Refund Process -->
                <div class="col-md-4 mb-4">
                    <div class="policy-card">
                        <div class="card-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h3>Refund Process</h3>
                        <p>Refunds are initiated after product inspection</p>
                        <ul>
                            <li>Processing time: 1-2 business days</li>
                            <li>Reflects in account: <strong>5-7 business days</strong></li>
                            <li>Original payment method used</li>
                        </ul>
                    </div>
                </div>

                <!-- Non-returnable Items -->
                <div class="col-md-4 mb-4">
                    <div class="policy-card">
                        <div class="card-icon">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <h3>Non-returnable Items</h3>
                        <p>Some products cannot be returned due to their nature</p>
                        <ul>
                            <li>Perishable goods (groceries)</li>
                            <li>Personal hygiene products</li>
                            <li>Undergarments & innerwear</li>
                            <li>Software & digital downloads</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Return Process -->
        <div class="return-process mb-5">
            <h3 class="section-title text-center mb-4">How to Request a Return</h3>

            <div class="process-steps">
                <div class="row">
                    <!-- Step 1 -->
                    <div class="col-md-3 mb-4">
                        <div class="step-card">
                            <div class="step-number">1</div>
                            <div class="step-icon">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <h4>Go to My Orders</h4>
                            <p>Log into your QuickKart account and navigate to the "My Orders" section</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="col-md-3 mb-4">
                        <div class="step-card">
                            <div class="step-number">2</div>
                            <div class="step-icon">
                                <i class="bi bi-arrow-return-left"></i>
                            </div>
                            <h4>Select Return</h4>
                            <p>Find the order with the item you want to return and click the "Return" button</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="col-md-3 mb-4">
                        <div class="step-card">
                            <div class="step-number">3</div>
                            <div class="step-icon">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <h4>Provide Reason</h4>
                            <p>Select a reason for return and add any additional details if necessary</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="col-md-3 mb-4">
                        <div class="step-card">
                            <div class="step-number">4</div>
                            <div class="step-icon">
                                <i class="bi bi-send"></i>
                            </div>
                            <h4>Submit Request</h4>
                            <p>Review your return details and submit the request to initiate the process</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="#" class="btn btn-primary btn-lg">Start a Return Request</a>
                </div>
            </div>
        </div>

        <!-- Detailed Information -->
        <div class="info-sections mb-5">
            <!-- Return Pickup -->
            <div class="info-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-box-seam info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Return Pickup Process</h3>
                        <p>After your return request is approved:</p>
                        <ol>
                            <li>You'll receive a confirmation email with pickup details</li>
                            <li>Our delivery partner will contact you to schedule a pickup</li>
                            <li>Pack the item in its original packaging with all accessories</li>
                            <li>Hand over the package to our delivery executive</li>
                            <li>Get a pickup confirmation receipt for your records</li>
                        </ol>
                        <p>The pickup will typically be scheduled within 2-3 business days from approval.</p>
                    </div>
                </div>
            </div>

            <!-- Refund Methods -->
            <div class="info-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-wallet2 info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Refund Methods</h3>
                        <p>Refunds are processed based on your original payment method:</p>
                        <ul>
                            <li><strong>Credit/Debit Cards:</strong> Refunded to the original card (5-7 business days)</li>
                            <li><strong>Net Banking:</strong> Credited back to your bank account (5-7 business days)</li>
                            <li><strong>UPI:</strong> Sent back to the UPI ID used for payment (3-5 business days)</li>
                            <li><strong>Digital Wallets:</strong> Added back to your wallet (2-3 business days)</li>
                            <li><strong>Cash on Delivery:</strong> Refunded via bank transfer to your provided account (7-10 business days)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Exchange Policy -->
            <div class="info-card">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="bi bi-arrow-repeat info-icon"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Exchange Policy</h3>
                        <p>If you prefer an exchange instead of a refund:</p>
                        <ul>
                            <li>Select "Exchange" instead of "Return" when initiating the process</li>
                            <li>Choose the replacement item of equal or higher value</li>
                            <li>If higher value, pay the difference during the exchange process</li>
                            <li>Exchanges follow the same eligibility criteria as returns</li>
                            <li>The replacement item will be shipped once we receive and verify the returned item</li>
                        </ul>
                        <p><strong>Note:</strong> Some categories might have category-specific exchange policies. Please check the product page for details.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="returns-faq mt-5 mb-5">
            <h3 class="text-center mb-4">Frequently Asked Questions</h3>
            <div class="accordion" id="returnsFaq">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="returnsQ1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnsA1" aria-expanded="false" aria-controls="returnsA1">
                            Can I return part of my order?
                        </button>
                    </h4>
                    <div id="returnsA1" class="accordion-collapse collapse" aria-labelledby="returnsQ1" data-bs-parent="#returnsFaq">
                        <div class="accordion-body">
                            Yes, you can return individual items from an order. During the return process, you'll be able to select which specific items you wish to return. Each item will be evaluated separately according to our return policy criteria.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="returnsQ2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnsA2" aria-expanded="false" aria-controls="returnsA2">
                            What if my product is damaged or defective?
                        </button>
                    </h4>
                    <div id="returnsA2" class="accordion-collapse collapse" aria-labelledby="returnsQ2" data-bs-parent="#returnsFaq">
                        <div class="accordion-body">
                            If you receive a damaged or defective product, please initiate a return within 7 days of delivery. Select "Damaged" or "Defective" as the reason for return. For these cases, we cover all return shipping costs, and our team will expedite the refund or replacement process after verifying the issue. Please take photos of the damage before initiating the return to help with the verification process.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="returnsQ3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnsA3" aria-expanded="false" aria-controls="returnsA3">
                            Are there any return shipping charges?
                        </button>
                    </h4>
                    <div id="returnsA3" class="accordion-collapse collapse" aria-labelledby="returnsQ3" data-bs-parent="#returnsFaq">
                        <div class="accordion-body">
                            For most returns where the reason is "change of mind" or "ordered by mistake," a nominal reverse shipping fee of ₹50 will be deducted from your refund amount. Returns due to reasons like "damaged product," "defective item," or "wrong item delivered" have no return shipping charges. Return shipping is also free for premium members.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-section text-center py-4 mb-5">
            <h3>Need assistance with returns?</h3>
            <p>Our customer service team is ready to help with your return or refund questions</p>
            <a href="#" class="btn btn-primary mt-2">Contact Support</a>
        </div>
    </div>

    <!-- Footer -->
    @include('theme-part.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>