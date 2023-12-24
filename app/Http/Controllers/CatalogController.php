<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $catalogs = Catalog::all();
        return view('admin.catalogs.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function create()
    {
        return view('admin.catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatalogRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCatalogRequest $request)
    {
        Catalog::create($request->validated());
        return redirect()->route('catalogs.index')->with('success', 'Catalog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(Catalog $catalog)
    {
        return view('admin.catalogs.show', compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit(Catalog $catalog)
    {
        return view('admin.catalogs.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatalogRequest  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        $catalog->update($request->validated());
        return redirect()->route('catalogs.index')->with('success', 'Catalog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect()->route('catalogs.index')->with('success', 'Catalog deleted successfully.');
    }
}
