<header class="sticky-top">
    <!-- First Row - Info & Branding Section -->
    <div class="container-fluid top-bar">
        <div class="row py-2 align-items-center">
            <div class="col-md-4 contact-info">
                <i class="bi bi-telephone-fill"></i>
                <span>Call Us: +91 9429108956</span>
            </div>

            <div class="col-md-4 text-center brand-name">
                <h1>QuickKart</h1>
            </div>

            <div class="col-md-4">
                <form class="d-flex search-form" action="{{ url('search') }}" method="GET">
                    <input class="form-control search-input" type="search" name="query" placeholder="Search for products..." required>
                    <button class="btn search-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Second Row - Navigation Menu -->
    <nav class="navbar navbar-expand-lg main-menu">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left Section: Home -->
                <ul class="navbar-nav left-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>
                </ul>

                <!-- Center Section: Category Menus -->
                <ul class="navbar-nav center-menu">
                    @foreach($categories as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ url('products/' . $category->category_id) }}">
                            {{ $category->category_name }}
                        </a>

                        @if($category->subcategories->count() > 0)
                        <ul class="dropdown-menu">
                            @foreach($category->subcategories as $subcategory)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('subcategory.products', ['category_id' => $category->category_id ?? 0, 'subcat_id' => $subcategory->subcat_id ?? 0]) }}">
                                    {{ $subcategory->subcat_name }}
                                </a>

                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>


                <!-- Right Section: Account, Cart, Contact -->
                <ul class="navbar-nav right-menu">
                    @if(session()->has('uid'))
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('login') }}">
                            <i class="bi bi-person-circle"></i> Hi, {{ session('uname') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                            <li><a class="dropdown-item" href="{{ url(path: 'myorders') }}">My Orders</a></li>
                            <li><a class="dropdown-item" href="{{ url('myreviews') }}">My Reviews</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cart') }}">
                            <i class="bi bi-cart-fill"></i> Your Cart
                        </a>
                    </li>

                    @else
                    <a class="nav-link" href="{{ url('login') }}">
                        <i class="bi bi-person-circle"></i> Login
                    </a>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">
                            <i class="bi bi-chat-dots-fill"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ url('change-password') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
                            <div class="d-flex">
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Include SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session("error") }}',
        confirmButtonColor: '#d33'
    });
</script>
@endif