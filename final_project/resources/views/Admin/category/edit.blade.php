<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Category - Admin Dashboard</title>

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

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h3 {
            margin-bottom: 1.5rem;
            color: #343a40;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .form-group input {
            width: 100%;
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
            margin-bottom: 1.25rem;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                margin: 0 auto;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
        }
    </style>

</head>

<body>

    <!-- ✅ Sidebar -->
    @include('admin.parts.sidebar')

    <!-- ✅ Main Dashboard Content -->
    <div class="main-content">
        <div class="form-container">
            <h3><i class="bi bi-pencil-square me-2"></i>Edit Category</h3>

            <form action="{{ route('admincategory.update', $category->category_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input
                        type="text"
                        id="category_name"
                        name="category_name"
                        value="{{ $category->category_name }}"
                        class="form-control"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>Update Category
                </button>
            </form>
        </div>
    </div>

    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>