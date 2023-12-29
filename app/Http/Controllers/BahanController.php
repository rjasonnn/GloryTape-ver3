<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Http\Requests\StoreBahanRequest;
use App\Http\Requests\UpdateBahanRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $bahans = Bahan::all();
        return view('admin.bahan.index', compact('bahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function create()
    {
        return view('admin.bahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBahanRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBahanRequest $request)
    {
        Bahan::create($request->validated());
        return redirect()->route('bahans.index')->with('success', 'Bahan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Bahan $bahan
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(Bahan $bahan)
    {
        return view('admin.bahan.show', compact('bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bahan $bahan
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit(Bahan $bahan)
    {
        return view('admin.bahan.edit', compact('bahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanRequest  $request
     * @param Bahan $bahan
     * @return RedirectResponse
     */
    public function update(UpdateBahanRequest $request, Bahan $bahan)
    {
        $bahan->update($request->validated());
        return redirect()->route('bahans.index')->with('success', 'Bahan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bahan $bahan
     * @return RedirectResponse
     */
    public function destroy(Bahan $bahan)
    {
        $bahan->delete();
        return redirect()->route('bahans.index')->with('success', 'Bahan deleted successfully.');
    }
}
