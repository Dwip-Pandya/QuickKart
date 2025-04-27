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
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <!-- Header -->
    @include('theme-part.header')

    <!-- Product Page Content -->
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Left Side - Category Box (30%) -->
            <div class="col-md-4 col-lg-3 categories-sidebar">
                <div class="category-box">
                    <div class="category-header">
                        <h2><i class='fas fa-list-ul'></i> {{ $category->category_name ?? 'Browse Categories' }}</h2>
                    </div>
                    <div class="category-content">
                        <ul class="category-list">
                            @if($subcategories->count() > 0)
                            @foreach($subcategories as $sub)
                            <li class='category-item'>
                                <a href="{{ route('subcategory.products', ['category_id' => $category->category_id, 'subcat_id' => $sub->subcat_id]) }}">
                                    <i class='fas fa-chevron-right'></i> {{ $sub->subcat_name }}
                                </a>
                            </li>
                            @endforeach
                            @else
                            <li class='category-item'><a href="#">No Subcategories Found</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Right Side - Product Listing (70%) -->
            <div class="col-md-8 col-lg-9 product-listing">
                <div class="product-header">
                    <h1 id="category-title">{{ $category->category_name ?? 'Products' }}</h1>
                    <p class="category-description">Browse our latest {{ $category->category_name ?? '' }} products</p>
                </div>

                <!-- Sorting & Filtering -->
                <div class="filter-search-container">
                    <!-- Left: Sort + Request -->
                    <div class="left-controls">
                        <form method="GET" class="sorting-form">
                            <select name="sort" onchange="this.form.submit()" class="form-select">
                                <option value="">Sort by</option>
                                <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </form>

                        <!-- Request Product Button -->
                        <button type="button" class="btn request-product-btn" data-bs-toggle="modal" data-bs-target="#productRequestModal">
                            <i class="bi bi-box-seam"></i> Request Product
                        </button>
                    </div>

                    <!-- Right: Search -->
                    <form method="GET" class="search-form d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
                        <button type="submit" class="btn searchbtn ms-2">
                            <i class="fas fa-search"></i>
                        </button>
                        @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                    </form>
                </div>

                <div class="row product-grid">
                    @forelse($products as $product)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card product-card">
                            <img src="{{ asset($product->image1) }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 200px; object-fit: contain;">

                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="product-price">₹{{ number_format($product->price, 2) }}</div>
                                <a href="{{ url('single/' . $product->product_id) }}" class="btn btn-primary view-details-btn">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">No products found in this category.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Product Request Modal -->
    <div class="modal fade" id="productRequestModal" tabindex="-1" aria-labelledby="productRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('product.request') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="productRequestModalLabel" style="color: #1a365d;">Request a Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="mb-3">
                            <label for="product_name" class="form-label" style="color: #1a365d; ">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label" style="color: #1a365d; ">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn" style="background-color: #1a365d; color: aliceblue;">Submit Request</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('theme-part.footer')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>