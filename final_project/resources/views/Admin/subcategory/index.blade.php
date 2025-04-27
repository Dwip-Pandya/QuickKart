<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Subcategories</title>

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

        .table {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.05);
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 0.5rem;
        }

        .alert {
            border-radius: 0.75rem;
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
                    <h3>All Subcategories</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('adminsubcategory.create') }}" class="btn btn-primary mb-3">
                        <i class="bi bi-plus-circle me-2"></i>Add Subcategory
                    </a>

                    @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subcategory Name</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->subcat_id }}</td>
                                <td>{{ $subcategory->subcat_name }}</td>
                                <td>{{ $subcategory->category_name }}</td>
                                <td>
                                    <a href="{{ route('adminsubcategory.edit', $subcategory->subcat_id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil me-2"></i>Edit
                                    </a>

                                    <form action="{{ route('adminsubcategory.destroy', $subcategory->subcat_id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this subcategory?')">
                                            <i class="bi bi-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if($subcategories->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">No subcategories found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>