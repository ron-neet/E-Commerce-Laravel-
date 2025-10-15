@extends('layouts.admin')

@section('title', 'All Products')
@section('header', 'All Products')

@section('content')
    <a href="{{ route('products.create') }}" style="margin-bottom: 20px; display:inline-block; padding: 10px 20px; background:#4a90e2; color:#fff; border-radius:6px; text-decoration:none; transition:0.3s;">
        Add Product
    </a>

    <table style="width:100%; border-collapse: collapse; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,0.1); border-radius:8px; overflow:hidden;">
        <thead>
            <tr style="background:#4a90e2; color:#fff;">
                <th style="padding:12px 15px;">ID</th>
                <th style="padding:12px 15px;">Name</th>
                <th style="padding:12px 15px;">Price</th>
                <th style="padding:12px 15px;">Category</th>
                <th style="padding:12px 15px;">Image</th>
                <th style="padding:12px 15px;">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr style="text-align:center;">
                <td style="padding:12px 15px;">{{ $loop->iteration }}</td>
                <td style="padding:12px 15px;">{{ $product->name }}</td>
                <td style="padding:12px 15px;">{{ $product->price }}</td>
                <td style="padding:12px 15px;">{{ $product->category }}</td>
                <td style="padding:12px 15px;">
                    <img src="{{ asset('storage/' . $product->images) }}" width="50" style="border-radius:4px;">
                </td>
                <td style="padding:12px 15px;">
                    <a href="{{ route('products.edit', $product->id) }}" style="padding:5px 10px; background:#27ae60; color:#fff; border-radius:4px; text-decoration:none;">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:#e74c3c; border:none; color:#fff; padding:5px 10px; border-radius:4px; cursor:pointer; margin-left:5px;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
