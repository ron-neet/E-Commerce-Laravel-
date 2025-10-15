@extends('layouts.admin')

@section('title', 'Add Product')
@section('header', 'Add New Product')

@section('content')
<div style="max-width: 700px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 20px;">
            <label for="name" style="display:block; font-weight: 600; margin-bottom:5px;">Product Name</label>
            <input type="text" name="name" id="name" placeholder="Enter product name" required 
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="price" style="display:block; font-weight: 600; margin-bottom:5px;">Price</label>
            <input type="number" name="price" id="price" placeholder="Enter price" required 
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="category" style="display:block; font-weight: 600; margin-bottom:5px;">Category</label>
            <input type="text" name="category" id="category" placeholder="Enter category" required 
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="description" style="display:block; font-weight: 600; margin-bottom:5px;">Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Enter description" 
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="image" style="display:block; font-weight: 600; margin-bottom:5px;">Product Image</label>
            <input type="file" name="image" id="image" 
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
        </div>

        <button type="submit" 
            style="background:#4a90e2; color:#fff; padding:12px 25px; border:none; border-radius:6px; font-size:16px; cursor:pointer; transition:0.3s;">
            Add Product
        </button>
    </form>
</div>
@endsection
