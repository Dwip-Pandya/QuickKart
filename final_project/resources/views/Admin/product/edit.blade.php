<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product - Admin Dashboard</title>

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

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .edit-form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
        }

        .edit-form-container h3 {
            margin-bottom: 2rem;
            color: #343a40;
        }

        .edit-form-container .form-group {
            margin-bottom: 1.5rem;
        }

        .edit-form-container label {
            font-weight: bold;
            color: #495057;
        }

        .edit-form-container input,
        .edit-form-container select,
        .edit-form-container textarea {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }

        .edit-form-container textarea {
            min-height: 150px;
        }

        .edit-form-container input[type="file"] {
            padding: 0.75rem;
        }

        .edit-form-container button[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-form-container button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .edit-form-container {
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
        <div class="edit-form-container">
            <h3>Edit Product</h3>

            <form action="{{ route('adminproduct.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" class="form-control">
                </div>

                <!-- Product Description -->
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" value="{{ $product->price }}" class="form-control">
                </div>

                <!-- Stock Quantity -->
                <div class="form-group">
                    <label for="stock_quantity">Stock Quantity</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity }}" class="form-control">
                </div>

                <!-- Category Selection -->
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" @if($category->category_id == $product->category_id) selected @endif>
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Subcategory Selection -->
                <div class="form-group">
                    <label for="subcat_id">Subcategory</label>
                    <select id="subcat_id" name="subcat_id" class="form-control">
                        @foreach($subcategories as $subcat)
                        <option value="{{ $subcat->subcat_id }}" @if($subcat->subcat_id == $product->subcat_id) selected @endif>
                            {{ $subcat->subcat_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Image Uploads -->
                @for ($i = 1; $i <= 4; $i++)
                    <div class="form-group">
                    <label for="image{{ $i }}">Image {{ $i }}: {{ $product->{'image'.$i} }}</label>
                    <input type="file" id="image{{ $i }}" name="image{{ $i }}" class="form-control">
        </div>
        @endfor

        <!-- Product Points -->
        @for ($i = 1; $i <= 4; $i++)
            <div class="form-group">
            <label for="product_point{{ $i }}">Product Point {{ $i }}</label>
            <input type="text" id="product_point{{ $i }}" name="porduct_point{{ $i }}" value="{{ $product->{'porduct_point'.$i} }}" class="form-control">
    </div>
    @endfor

    <!-- Submit Button -->
    <button type="submit" class="btn btn-success">Update Product</button>
    </form>
    </div>
    </div>

    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>