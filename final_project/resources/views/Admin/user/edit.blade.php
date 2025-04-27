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
    <div class="container">
        <h1 class="mb-4">Edit User</h1>

        <form action="{{ route('adminuser.update', $user->user_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user_name" class="form-label">User Name</label>
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name', $user->user_name) }}" required>
                @error('user_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="user_email" name="user_email" value="{{ old('user_email', $user->user_email) }}" required>
                @error('user_email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_password" class="form-label">Password (Leave blank to keep unchanged)</label>
                <input type="password" class="form-control @error('user_password') is-invalid @enderror" id="user_password" name="user_password">
                @error('user_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>

    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>