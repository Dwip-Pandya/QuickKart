<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Category</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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
            color: white;
            z-index: 999;
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

        /* Custom Styles for the Layout */
        .main-content {
            margin-left: 250px;
            /* Sidebar width */
            padding: 2rem;
        }

        .product-table {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
        }

        .product-table h3 {
            margin-bottom: 2rem;
            color: #343a40;
        }

        .product-table .table {
            background-color: #fff;
            border: none;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
        }

        .product-table .btn-primary,
        .product-table .btn-warning,
        .product-table .btn-danger {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
        }

        .product-table .btn-danger {
            background-color: #dc3545;
        }

        .product-table .btn-warning {
            background-color: #ffc107;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .product-table {
                width: 100%;
                margin: 0 auto;
            }
        }

        .main {
            margin-left: 240px;
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            background-color: #fff;
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .btn-success {
            border-radius: 0.5rem;
            padding: 0.6rem 1.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 1rem;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    @include('admin.parts.sidebar')

    <!-- Main content -->
    <div class="main">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Add New Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admincategory.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter category name" required>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> Add Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>