@extends('master')
@section('content')

    <!-- Bootstrap 5 Carousel -->
    <div id="productCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        
        <div class="carousel-inner">
            @foreach ($product->take(3) as $products)
                <div class="carousel-item {{$products['id'] == 1 ? 'active' : ''}}">
                    <a href="detail/{{ $products->id }}">
                        <img src="{{ asset('storage/' . $products->images) }}" class="d-block w-100" style="height:500px; object-fit:contain"
                            alt="Washing Machine">
                        <div class="carousel-caption d-none d-md-block text-start" style="color:black">
                            <h3 class="fw-bold" style="color:black">{{ $products->name }}</h3>
                            <p>{{ $products->price }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <div class="trending-wrapper">
        <h1 class="trending-title">Trending Products</h1>
        <div class="trending-products">
            @foreach ($product as $products)

                <div class="trending-item">
                    <a href="detail/{{ $products->id }}">
                    <img src="{{ asset('storage/' . $products->images) }}" alt="{{ $products->name }}">
                    <div class="trending-info">
                        <h3 class="fw-bold">{{ $products->name }}</h3>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


@endsection