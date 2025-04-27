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
    </style>
</head>

<body>

    <!-- ✅ Sidebar -->
    @include('admin.parts.sidebar')

    <!-- ✅ Main Content Area -->
    <div class="main-content">
        <div class="content-header">
            <h3>All Categories</h3>
            <a href="{{ route('admincategory.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Category</a>
        </div><br>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-container">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $cat)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cat->category_name }}</td>
                        <td>
                            <a href="{{ route('admincategory.edit', $cat->category_id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admincategory.destroy', $cat->category_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>