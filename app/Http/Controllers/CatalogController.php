<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * @param StoreCatalogRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCatalogRequest $request)
    {
        $newFilename = null;
        if ($request->hasFile('image_path')) {
            $date = now()->format('ymd_His');
            $originalFilename = $request->file('image_path')->getClientOriginalName();
            $newFilename = 'catalog_' . $date . '_' . $originalFilename;

            // Store the file in the storage disk (you mentioned 'public')
            $imagePath = $request->file('image_path')->storeAs('public', $newFilename);

            // Update the request with the new file path
//            $request->image_path = $newFilename;
            $request->merge(['image_path' => $newFilename]);
        }

//        dd($request->validated());

        Catalog::create([
            'image_path' => $newFilename,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->route('catalogs.index')->with('success', 'Catalog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Catalog $catalog
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(Catalog $catalog)
    {
        return view('admin.catalogs.show', compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Catalog $catalog
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit(Catalog $catalog)
    {
        return view('admin.catalogs.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCatalogRequest $request
     * @param Catalog $catalog
     * @return RedirectResponse
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        $request->image_path = $catalog->image_path;

        if ($request->image_path) {
            Storage::delete($catalog->image_path);
        }

        $newFilename = $catalog->image_path;
        if ($request->hasFile('image_path')) {
            $date = now()->format('ymd_His');
            $originalFilename = $request->file('image_path')->getClientOriginalName();
            $newFilename = 'catalog_' . $date . '_' . $originalFilename;

            // Store the file in the storage disk (you mentioned 'public')
            $imagePath = $request->file('image_path')->storeAs('public', $newFilename);

            // Update the request with the new file path
//            $request->image_path = $newFilename;
            $request->merge(['image_path' => $newFilename]);
        }



        $catalog->update([
            'image_path' => $newFilename,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->route('catalogs.index')->with('success', 'Catalog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Catalog $catalog
     * @return RedirectResponse
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect()->route('catalogs.index')->with('success', 'Catalog deleted successfully.');
    }
}
