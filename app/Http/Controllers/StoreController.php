<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all(); // Retrieve all stores
        return view('admin.stores.index', compact('stores')); // Pass stores to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stores.create'); // Display the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        Store::create($request->all()); // Create a new store using validated data
        return redirect()->route('stores.index')->with('success', 'Store created successfully'); // Redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return view('admin.stores.show', compact('store')); // Display the store details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('admin.stores.edit', compact('store')); // Display the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all()); // Update the store with validated data
        return redirect()->route('stores.index')->with('success', 'Store updated successfully'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete(); // Delete the store
        return redirect()->route('stores.index')->with('success', 'Store deleted successfully'); // Redirect with success message
    }
}
