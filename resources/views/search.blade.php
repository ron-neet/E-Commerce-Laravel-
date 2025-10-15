@extends('master')
@section('content')

<div class="search-page">
    <div class="com-sm-4">
        <a href="#">Filter</a>
    </div>
    <h2 class="search-title">🔍 Search Results</h2>
    <p class="search-subtitle">Showing results for "<span style="color:#007bff;">{{ $query }}</span>"</p>

    <div class="search-results">
        @if(isset($product) && $product->count() > 0)
            @foreach ($product as $item)
                <div class="search-card">
                    <a href="detail/{{ $item->id }}">
                        <img src="{{ asset('storage/' . $products->images) }}" alt="{{ $item->name }}">
                        <div class="search-info">
                            <h3>{{ $item->name }}</h3>
                            <p class="price">Rs. {{ $item->price }}</p>
                            <p class="category">{{ $item->category }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="no-results">
                <p>No products found. Try searching something else!</p>
            </div>
        @endif
    </div>
</div>

@endsection
