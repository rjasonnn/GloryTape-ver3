<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Bahan; // Assuming model name for bahan
use App\Models\Warna; // Assuming model name for warna
use App\Models\Ukuran; // Assuming model name for ukuran
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['bahan', 'warna', 'ukuran'])->get(); // Eager load relationships for efficiency
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahans = Bahan::all();
        $warnas = Warna::all();
        $ukurans = Ukuran::all();
        return view('admin.products.create', compact('bahans', 'warnas', 'ukurans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $bahans = Bahan::all();
        $warnas = Warna::all();
        $ukurans = Ukuran::all();
        return view('admin.products.edit', compact('product', 'bahans', 'warnas', 'ukurans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function getProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
