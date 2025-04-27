<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Subcategory</title>

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

        .main {
            margin-left: 240px;
            padding: 2rem;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            font-size: 1.5rem;
            font-weight: 600;
            color: #343a40;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-control,
        .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem;
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

    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <div class="card">
                <div class="card-header">Add Subcategory</div>
                <div class="card-body">
                    <form action="{{ route('adminsubcategory.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="subcat_name" class="form-label">Subcategory Name</label>
                            <input type="text" name="subcat_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Add Subcategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>