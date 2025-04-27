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
            z-index: 1000;
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

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 2rem;
            color: #343a40;
        }

        .form-row .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }

        .form-group textarea {
            min-height: 150px;
        }

        .form-group input[type="file"] {
            padding: 0.75rem;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
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
        <div class="form-container">
            <h3>Add Product</h3>
            <form action="{{ route('adminproduct.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Price">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="stock_quantity" class="form-label">Stock Quantity</label>
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" placeholder="Stock">
                    </div>
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="subcat_id" class="form-label">Subcategory</label>
                        <select name="subcat_id" id="subcat_id" class="form-select">
                            @foreach($subcategories as $subcat)
                            <option value="{{ $subcat->subcat_id }}">{{ $subcat->subcat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <h5 class="mb-3 mt-4">Upload Product Images</h5>
                <div class="row mb-4">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-md-6 mb-3">
                        <label for="image{{ $i }}" class="form-label">Image {{ $i }}</label>
                        <input type="file" name="image{{ $i }}" id="image{{ $i }}" class="form-control">
                </div>
                @endfor
        </div>

        <h5 class="mb-3 mt-4">Product Points</h5>
        <div class="row mb-4">
            @for ($i = 1; $i <= 4; $i++)
                <div class="col-md-6 mb-3">
                <label for="product_point{{ $i }}" class="form-label">Point {{ $i }}</label>
                <input type="text" name="product_point{{ $i }}" id="product_point{{ $i }}" class="form-control" placeholder="Point {{ $i }}">
        </div>
        @endfor
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-success px-4 py-2">Add Product</button>
    </div>
    </form>

    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>