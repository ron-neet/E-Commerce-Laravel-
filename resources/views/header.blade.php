<?php
use App\Http\Controllers\ProductController;

$total = 0;

if (Session::has('user')) {
    $total = ProductController::cartItem();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Techify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orderlist">Orders</a>
                </li>
            </ul>

            <!-- Search form -->
            <form action="/search" class="d-flex me-3" role="search">
                <input class="form-control me-auto" name="query" type="search" value="{{ request('query') }}"
                    placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <!-- Right links (move slightly left using ms-3) -->
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                <!-- Cart Items -->
                <li class="nav-item me-3">
                    <a class="nav-link position-relative" href="/cartlist">
                        Cart Items
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                            {{ $total }}
                        </span>
                    </a>
                </li>

                <!-- User Dropdown -->
                @if(Session::has('user'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Session::get('user')['name'] }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-info text-sucess px-3" href="/login">Login</a>
                    </li>
                @endif
            </ul>


        </div>
    </div>
</nav>

<!-- Include Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>