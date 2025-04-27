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
    </style>

</head>

<body>

    <!-- ✅ Sidebar -->
    @include('admin.parts.sidebar');

    <!-- ✅ Main Dashboard Content -->
    <div class="main-content">
        <h3>All Products</h3>

        <!-- Add New Product Button -->
        <a href="{{ route('adminproduct.create') }}" class="btn btn-primary mb-3">Add New</a>

        <!-- Product Table -->
        <div class="product-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <!-- <th>Image</th> -->
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <!-- <td><img src="{{ asset( $product->image1) }}" alt="{{ $product->product_name }}" width="100"></td> -->
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>
                            <a href="{{ route('adminproduct.edit', $product->product_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('adminproduct.destroy', $product->product_id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>