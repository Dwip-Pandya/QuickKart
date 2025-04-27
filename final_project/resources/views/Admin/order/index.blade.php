<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        /* Alerts */
        .alert {
            border-radius: 0.5rem;
            font-size: 1rem;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- ✅ Sidebar -->
    @include('admin.parts.sidebar')

    <!-- ✅ Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4">Order Management</h1>
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
                Order List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Total Amount</th>
                            <th>Shipping Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->zip }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>