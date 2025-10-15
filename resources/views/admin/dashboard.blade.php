@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('header', 'Welcome Back, Admin!')

@section('content')
<div class="cards">
    <div class="card">
        <h2>{{ $productsCount ?? 0 }}</h2>
        <p>Total Products</p>
    </div>
    <div class="card">
        <h2>{{ $usersCount ?? 0 }}</h2>
        <p>Total Users</p>
    </div>
    <div class="card">
        <h2>{{ $ordersCount ?? 0 }}</h2>
        <p>Total Orders</p>
    </div>
    <div class="card">
        <h2>{{ $categoriesCount ?? 0 }}</h2>
        <p>Total Categories</p>
    </div>
</div>
@endsection
