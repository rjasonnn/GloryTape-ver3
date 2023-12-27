<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::all(); // Retrieve all deliveries
        return view('admin.deliveries.index', compact('deliveries')); // Pass deliveries to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.deliveries.create'); // Display the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryRequest $request)
    {
        Delivery::create($request->all()); // Create a new delivery using validated data
        return redirect()->route('deliveries.index')->with('success', 'Delivery created successfully'); // Redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        return view('admin.deliveries.show', compact('delivery')); // Display the delivery details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('admin.deliveries.edit', compact('delivery')); // Display the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        $delivery->update($request->all()); // Update the delivery with validated data
        return redirect()->route('deliveries.index')->with('success', 'Delivery updated successfully'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete(); // Delete the delivery
        return redirect()->route('deliveries.index')->with('success', 'Delivery deleted successfully'); // Redirect with success message
    }
}
