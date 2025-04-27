<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Subcategory</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 1rem;
        }

        .sidebar a {
            color: #ced4da;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
            color: #fff;
        }

        .main {
            margin-left: 240px;
            padding: 2rem;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .card-header {
            background-color: #ffffff;
            font-weight: 600;
            font-size: 1.5rem;
            color: #343a40;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            background-color: #ffffff;
            padding: 2rem;
        }

        .form-control,
        .form-select {
            border-radius: 0.75rem;
        }

        .btn-primary {
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
                <div class="card-header">
                    <h3>Edit Subcategory</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('adminsubcategory.update', $subcategory->subcat_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="subcat_name" class="form-label">Subcategory Name</label>
                            <input type="text" name="subcat_name" class="form-control" value="{{ $subcategory->subcat_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->category_id }}" {{ $cat->category_id == $subcategory->category_id ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>