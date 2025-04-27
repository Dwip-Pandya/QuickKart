<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Product Reviews</title>

    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Main Content */
        .main-content {
            margin-left: 240px;
            padding: 30px;
            transition: margin-left 0.3s ease-in-out;
        }

        .main-content h1 {
            font-weight: 600;
            color: #343a40;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        th {
            background-color: #343a40;
            color: #fff;
            font-weight: 600;
        }

        td {
            color: #495057;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
        }

        /* Card Style */
        .card {
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: #343a40;
            color: white;
            font-size: 1.25rem;
        }

        .card-body {
            background-color: white;
            padding: 20px;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        /* Responsive Sidebar for Mobile */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            table {
                font-size: 0.9rem;
            }

            .sidebar-toggle {
                display: block;
                font-size: 1.5rem;
                color: #212529;
                cursor: pointer;
            }
        }
    </style>
</head>

<body>

    <!-- ✅ Sidebar -->
    @include('admin.parts.sidebar')

    <!-- ✅ Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4">Product Reviews Management</h1>
            <button class="sidebar-toggle d-md-none btn btn-primary">☰</button>
        </div>

        <!-- Example Alert -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                Product Reviews List
            </div>
            <div class="container">
                <h1 class="my-4">Product Reviews</h1>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Review ID</th>
                            <th>Product Name</th>
                            <th>User Name</th>
                            <th>Review Title</th>
                            <th>Review Text</th>
                            <th>Rating</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->review_id }}</td>
                            <td>{{ $review->product_name }}</td>
                            <td>{{ $review->user_name }}</td>
                            <td>{{ $review->review_title }}</td>
                            <td>{{ $review->review_text }}</td>
                            <td>{{ $review->product_rating }}</td>
                            <td>{{ $review->created_at }}</td>
                            <td>{{ $review->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>