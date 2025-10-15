@extends('master')
@section('content')

    <div class="container my-5">
        <h2 class="text-center mb-4 fw-bold text-primary">
            🛒 Cart List
        </h2>
        <a class="btn btn-success" href="/ordernow">Order now</a>
        @if(count($product) > 0)
            @foreach ($product as $item)
                <div
                    class="cart-item d-flex flex-wrap align-items-center justify-content-between p-3 mb-3 border rounded shadow-sm bg-light">

                    <!-- Product Image (Left) -->
                    <div class="cart-image mb-3 mb-md-0">
                        <a href="{{ url('detail/' . $item->id) }}">
                            <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}" class="img-fluid rounded"
                                style="width: 120px; height: 120px; object-fit: cover;">
                        </a>
                    </div>

                    <!-- Product Details (Center) -->
                    <div class="cart-info flex-grow-1 ms-md-4">
                        <h4 class="fw-bold mb-1">{{ $item->name }}</h4>
                        <p class="text-muted mb-1">Category: {{ $item->category }}</p>
                        <p class="text-primary fw-semibold">Rs. {{ number_format($item->price) }}</p>
                    </div>

                    <!-- Remove Button (Right) -->
                    <div class="cart-remove">
                        <form action="{{ url('/removecart/' . $item->cart_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-flex align-items-center gap-1">
                                <i class="bi bi-trash"></i> Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center text-muted mt-5">
                <h5>Your cart is empty 🛍️</h5>
            </div>
        @endif
    </div>

@endsection