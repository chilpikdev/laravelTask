<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::all();

        return view('pages.catalogs')->with(['catalogs' => $catalogs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
        ];

        Catalog::create($data);

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $catalog = Catalog::findOrFail($request->id);

        $data = [
            'title' => $request->title,
        ];

        $catalog->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax())
        {
            Catalog::destroy($request->id);
        }
    }
}
