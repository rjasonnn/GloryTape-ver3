<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use App\Http\Requests\StoreUkuranRequest;
use App\Http\Requests\UpdateUkuranRequest;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukurans = Ukuran::all(); // Retrieve all ukurans
        return view('admin.ukurans.index', compact('ukurans')); // Pass ukurans to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ukurans.create'); // Display the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUkuranRequest $request)
    {
        Ukuran::create($request->all()); // Create a new ukuran using validated data
        return redirect()->route('ukurans.index')->with('success', 'Ukuran created successfully'); // Redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Ukuran $ukuran)
    {
        return view('admin.ukurans.show', compact('ukuran')); // Display the ukuran details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ukuran $ukuran)
    {
        return view('admin.ukurans.edit', compact('ukuran')); // Display the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUkuranRequest $request, Ukuran $ukuran)
    {
        $ukuran->update($request->all()); // Update the ukuran with validated data
        return redirect()->route('ukurans.index')->with('success', 'Ukuran updated successfully'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ukuran $ukuran)
    {
        $ukuran->delete(); // Delete the ukuran
        return redirect()->route('ukurans.index')->with('success', 'Ukuran deleted successfully'); // Redirect with success message
    }
}
