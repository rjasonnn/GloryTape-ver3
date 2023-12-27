<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use App\Http\Requests\StoreWarnaRequest;
use App\Http\Requests\UpdateWarnaRequest;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warnas = Warna::all(); // Retrieve all warnas
        return view('admin.warnas.index', compact('warnas')); // Pass warnas to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.warnas.create'); // Display the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarnaRequest $request)
    {
        Warna::create($request->all()); // Create a new warna using validated data
        return redirect()->route('warnas.index')->with('success', 'Warna created successfully'); // Redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Warna $warna)
    {
        return view('admin.warnas.show', compact('warna')); // Display the warna details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warna $warna)
    {
        return view('admin.warnas.edit', compact('warna')); // Display the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarnaRequest $request, Warna $warna)
    {
        $warna->update($request->all()); // Update the warna with validated data
        return redirect()->route('warnas.index')->with('success', 'Warna updated successfully'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warna $warna)
    {
        $warna->delete(); // Delete the warna
        return redirect()->route('warnas.index')->with('success', 'Warna deleted successfully'); // Redirect with success message
    }
}
