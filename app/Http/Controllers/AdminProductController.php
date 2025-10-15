<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

   public function store(Request $request)
{
    $data = $request->only(['name', 'price', 'category', 'description']); // exclude image for now

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->store('products', 'public'); // stores in storage/app/public/products
        $data['images'] = $path; // make sure DB column is 'images'
    } else {
        return back()->with('error', 'Product image is required.');
    }

    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Product added successfully.');
}


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'images' => 'nullable|image',
            'description' => 'nullable'
        ]);

        $imagePath = $product->images;
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'images' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
