@extends('layouts.admin')

@section('content')
<style>
    body {
        background-color: #f3f4f6;
        font-family: 'Inter', sans-serif;
    }

    .edit-product-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        padding: 35px 40px;
        max-width: 750px;
        margin: 50px auto;
        transition: all 0.3s ease;
    }

    .edit-product-card:hover {
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
    }

    .form-title {
        font-size: 30px;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 0.5px;
    }

    .form-label {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 6px;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #d1d5db;
        padding: 10px 14px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.15rem rgba(37, 99, 235, 0.25);
    }

    textarea.form-control {
        resize: none;
    }

    .image-preview {
        display: block;
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #2563eb;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    .btn-secondary {
        background-color: #9ca3af;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 20px;
    }

    .btn-secondary:hover {
        background-color: #6b7280;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
</style>

<div class="edit-product-card">
    <h1 class="form-title">✏️ Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required step="0.01">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($product->images)
                <img src="{{ asset('storage/' . $product->images) }}" class="image-preview">
            @else
                <p class="text-muted">No image available</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Change Image (optional)</label>
            <input type="file" name="images" class="form-control">
        </div>

        <div class="btn-container">
            <button type="submit" class="btn btn-primary">💾 Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">↩️ Cancel</a>
        </div>
    </form>
</div>
@endsection
