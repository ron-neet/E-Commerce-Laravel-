@extends('master')
@section('content')

<div class="container my-5">
    <h2 class="text-center mb-5 fw-bold text-primary">
        🛒 My Order
    </h2>

    @if(count($product) > 0)
        @foreach ($product as $item)
            <div class="cart-item d-flex flex-wrap align-items-center justify-content-between p-3 mb-4 border rounded shadow-sm bg-white">

                <!-- Product Image -->
                <div class="cart-image mb-3 mb-md-0">
                    <a href="{{ url('detail/' . $item->id) }}">
                        <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}" class="img-fluid rounded"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </a>
                </div>

                <!-- Product Info -->
                <div class="cart-info flex-grow-1 ms-md-4 mb-3 mb-md-0">
                    <h4 class="fw-bold mb-1">{{ $item->name }}</h4>
                    <p class="text-muted mb-1">Category: {{ $item->category }}</p>
                    <p class="text-primary fw-semibold">Rs. {{ number_format($item->price) }}</p>
                </div>

                <!-- Order Status -->
                <div class="cart-info flex-grow-1 ms-md-4 mb-3 mb-md-0">
                    <h5 class="fw-bold mb-1">Delivery Status: <span class="text-success">{{ $item->status }}</span></h5>
                    <p class="text-muted mb-1">Payment Status: <span class="fw-semibold text-primary">{{ $item->payment_status }}</span></p>
                    <p class="text-primary fw-semibold">Payment Method: {{ $item->payment }}</p>
                </div>

                <!-- Address -->
                <div class="ms-md-4 mt-3 mt-md-0">
                    <p class="text-muted mb-0"><strong>Address:</strong> {{ $item->address }}</p>
                </div>

            </div>
        @endforeach
    @else
        <div class="text-center text-muted mt-5">
            <h5>Your order is empty 🛍️</h5>
        </div>
    @endif
</div>

<style>
.cart-item {
    transition: transform 0.2s, box-shadow 0.2s;
}
.cart-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}
.cart-info h4, .cart-info h5 {
    font-size: 1.1rem;
}
.cart-info p {
    font-size: 0.95rem;
}
@media (max-width: 768px) {
    .cart-item {
        flex-direction: column;
        text-align: center;
    }
    .cart-info {
        margin-left: 0 !important;
    }
}
</style>

@endsection
