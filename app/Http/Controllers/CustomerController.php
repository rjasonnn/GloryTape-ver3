<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all(); // Retrieve all customers
        return view('admin.customers.index', compact('customers')); // Pass customers to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create'); // Display the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->all()); // Create a new customer using validated data
        return redirect()->route('customers.index')->with('success', 'Customer created successfully'); // Redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer')); // Display the customer details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer')); // Display the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all()); // Update the customer with validated data
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete(); // Delete the customer
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully'); // Redirect with success message
    }
}
