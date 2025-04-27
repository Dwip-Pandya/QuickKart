<div class="sidebar">
    <!-- Product Dropdown -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>

        <!-- Product Dropdown -->
        <div class="dropdown">
            <a class="dropdown-toggle text-white d-block px-3 py-2" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('adminproduct.create') }}">Add Product</a></li>
                <li><a class="dropdown-item" href="{{ route('adminproduct.index') }}">View Products</a></li>
            </ul>
        </div>

        <!-- Category Dropdown -->
        <div class="dropdown">
            <a class="dropdown-toggle text-white d-block px-3 py-2" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-tags me-2"></i> Categories
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('admincategory.create') }}">Add Category</a></li>
                <li><a class="dropdown-item" href="{{ route('admincategory.index') }}">View Categories</a></li>
            </ul>
        </div>

        <!-- Subcategory Dropdown -->
        <div class="dropdown">
            <a class="dropdown-toggle text-white d-block px-3 py-2" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-tag me-2"></i> Subcategories
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('adminsubcategory.create') }}">Add Subcategory</a></li>
                <li><a class="dropdown-item" href="{{ route('adminsubcategory.index') }}">View Subcategories</a></li>
            </ul>
        </div>

        <!-- Users Dropdown -->
        <div class="dropdown">
            <a class="dropdown-toggle text-white d-block px-3 py-2" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-people me-2"></i> Users
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('adminuser.create') }}">Add User</a></li>
                <li><a class="dropdown-item" href="{{ route('adminuser.index') }}">View Users</a></li>
            </ul>
        </div>

        <!-- Keep the rest as-is -->
        <a href="{{ route('adminorder.index') }}"><i class="bi bi-cart-check me-2"></i> Orders</a>
        <a href="{{ route('adminrequest.index') }}"><i class="bi bi-boxes me-2"></i> Product Requests</a>
        <a href="{{ route('adminreview.index') }}"><i class="bi bi-star me-2"></i> Reviews</a>
    </div>

    <!-- Keep the rest as-is -->
    <a href="#"><i class="bi bi-cart-check me-2"></i> Orders</a>
    <a href="#"><i class="bi bi-boxes me-2"></i> Product Requests</a>
    <a href="#"><i class="bi bi-star me-2"></i> Reviews</a>
    <a href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
</div>