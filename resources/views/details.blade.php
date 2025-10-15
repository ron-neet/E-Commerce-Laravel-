@extends('master')
@section('content')


    <div class="product-details-container">
        <div class="product-details">
            <div class="product-image">
                <img src="{{ asset('storage/' . $products->images) }}" alt="{{ $products->name }}">
            </div>

            <div class="product-info">
                <a href="/" class="back-link">← Go Back</a>
                <h2 class="product-name">{{ $products->name }}</h2>
                <p class="product-price">Rs. {{ $products->price }}</p>
                <p class="product-category"><strong>Category:</strong> {{ $products->category }}</p>
                <p class="product-description">{{ $products->description }}</p>

                <div class="button-group">
                    <form action="{{ route('addtocart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <button class="btn add-cart">🛒 Add to Cart</button>
                    </form>
                    <button class="btn buy-now">💳 Buy Now</button>
                </div>
            </div>
        </div>
    </div>


@endsection