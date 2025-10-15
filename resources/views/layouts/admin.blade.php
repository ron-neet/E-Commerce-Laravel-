<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            min-height: 100vh;
        }

        /* Top navigation */
        .top-nav {
            position: sticky; /* makes it stick when scrolling */
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #4a90e2;
            padding: 15px 30px;
            color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .top-nav h1 {
            font-size: 22px;
        }

        .top-nav .nav-links a {
            margin-left: 15px;
            padding: 8px 15px;
            background: #fff;
            color: #4a90e2;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .top-nav .nav-links a:hover {
            background: #e1f0ff;
            transform: translateY(-2px);
        }

        /* Main content */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        /* Cards */
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 30px;
            flex: 1 1 200px;
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #4a90e2;
        }

        .card p {
            font-size: 16px;
            color: #555;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cards { flex-direction: column; align-items: center; }
            .top-nav { flex-direction: column; gap: 10px; text-align: center; }
            .top-nav .nav-links a { margin-left: 0; margin-right: 10px; }
        }
    </style>
</head>
<body>

    <!-- Top Navigation -->
    <div class="top-nav">
        <h1>@yield('header', 'Welcome Admin')</h1>
        <div class="nav-links">
            <a href="{{ route('products.index') }}">Manage Products</a>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>

    <!-- Main content -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
