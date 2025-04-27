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
    <link rel="stylesheet" href="{{ asset('css/cart-style.css') }}">
</head>

<body>
    <!-- Header -->
    @include('theme-part.header')

    <section id="custom-cart-section">
        <div id="cart-container">
            <div id="cart-row">
                <!-- Left Column - Cart Items -->
                <div id="cart-items-column">
                    <h2 id="cart-title">Your Cart</h2>

                    <div id="cart-table">
                        @if (!empty($cartItems) && count($cartItems) > 0)
                        @foreach ($cartItems as $cartItem)
                        <div class="cart-item-row">
                            <div class="item-image-container">
                                <img src="{{ asset($cartItem->image1) }}" alt="{{ $cartItem->product_name }}">
                            </div>
                            <div class="item-details-container">
                                <h3 class="item-name-heading">{{ $cartItem->product_name }}</h3>
                                <p class="item-price-text">₹ {{ number_format($cartItem->price, 2) }}</p>
                            </div>
                            <div class="item-quantity-container">
                                <form method="POST" action="{{ route('cart.update', $cartItem->cart_id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="quantity-selector-wrapper">
                                        <input type="hidden" name="cart_id" value="{{ $cartItem->cart_id }}">
                                        <button type="button" class="quantity-decrease-btn">-</button>
                                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="quantity-input-field" onChange="this.form.submit();">

                                        <button type="button" class="quantity-increase-btn">+</button>
                                        <button type="submit" class="btn view-details-btn" id="update-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="item-total-container">
                                ₹ {{ number_format($cartItem->price * $cartItem->quantity, 2) }}
                            </div>
                            <div class="item-remove-container">
                                <form method="POST" action="{{ route('cart.remove', $cartItem->cart_id) }}">
                                    @csrf
                                    @method('DELETE') <!-- Ensure DELETE request -->
                                    <button type="submit" class="remove-item-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="empty-cart">Your cart is empty</div>
                        @endif
                    </div>
                </div>

                <!-- Order Summary Column -->
                <div id="order-summary-column">
                    <div id="summary-box">
                        <h2 id="summary-title">Order Summary</h2>

                        <div class="summary-row-item">
                            <span>Subtotal</span>
                            <span class="price-value">₹ {{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="summary-row-item">
                            <span>Shipping Fee</span>
                            <span class="price-value">₹ {{ number_format($shipping, 2) }}</span>
                        </div>

                        <div class="summary-row-item" id="discount-row">
                            <span>Discount</span>
                            <span class="price-value">-₹ {{ number_format($discount, 2) }}</span>
                        </div>

                        <div class="summary-row-item" id="total-row">
                            <span>Grand Total</span>
                            <span class="price-value">₹ {{ number_format($grandTotal, 2) }}</span>
                        </div>

                        <a href="{{ route('checkout.index') }}" style="text-decoration: none;">
                            <button id="checkout-button">Proceed to Checkout</button>
                        </a>
                        <a href="{{ route('products.index', ['category_id' => $cartItems->first()->category_id ?? 1]) }}" style="text-decoration: none;">
                            <button id="continue-shopping-button">Continue Shopping</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Quantity selector functionality
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".quantity-decrease-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let input = this.nextElementSibling;
                    if (input.value > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });
            });

            document.querySelectorAll(".quantity-increase-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let input = this.previousElementSibling;
                    input.value = parseInt(input.value) + 1;
                });
            });
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