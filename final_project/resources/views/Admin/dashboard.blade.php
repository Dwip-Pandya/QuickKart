<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- ✅ Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #343a40;
            padding-top: 1rem;
            z-index: 1000;
            color: white;
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar .active {
            background-color: #007bff;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .dashboard-card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 2rem;
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <!-- ✅ Sidebar -->
    @include('admin.parts.sidebar');


    <!-- ✅ Main Dashboard Content -->
    <div class="main-content">
        <h2 class="mb-4 text-center fw-bold">Admin Dashboard</h2>

        <div class="row g-4">

            <!-- Total Products -->
            <div class="col-md-4">
                <a href="/adminproduct" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-primary p-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="display-6">{{ $totalProducts ?? '0' }}</p>
                            <i class="bi bi-box-seam card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Categories -->
            <div class="col-md-4">
                <a href="/admincategory" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-success p-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Categories</h5>
                            <p class="display-6">{{ $totalCategories ?? '0' }}</p>
                            <i class="bi bi-tags card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Subcategories -->
            <div class="col-md-4">
                <a href="/adminsubproduct" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-warning p-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Subcategories</h5>
                            <p class="display-6">{{ $totalSubcategories ?? '0' }}</p>
                            <i class="bi bi-tag card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Orders -->
            <div class="col-md-4">
                <a href="/adminorder" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-info p-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="display-6">{{ $totalOrders ?? '0' }}</p>
                            <i class="bi bi-cart-check card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Users -->
            <div class="col-md-4">
                <a href="/adminuser" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-dark p-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="display-6">{{ $totalUsers ?? '0' }}</p>
                            <i class="bi bi-people card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Product Requests -->
            <div class="col-md-4">
                <a href="/adminrequest" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-danger p-3">
                        <div class="card-body">
                            <h5 class="card-title">Product Requests</h5>
                            <p class="display-6">{{ $totalRequests ?? '0' }}</p>
                            <i class="bi bi-boxes card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/adminreview" style="text-decoration: none;">
                    <div class="card dashboard-card text-white bg-secondary p-3">
                        <div class="card-body">
                            <h5 class="card-title">Product Reviews</h5>
                            <p class="display-6">{{ $totalReviews ?? '0' }}</p>
                            <i class="bi bi-boxes card-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>