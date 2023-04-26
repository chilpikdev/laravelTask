<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::all();
        $categories = Category::all();

        return view('pages.categories')->with(['categories' => $categories, 'catalogs' => $catalogs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'catalog_id' => $request->catalog_id,
        ];

        Category::create($data);

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $data = [
            'title' => $request->title,
            'catalog_id' => $request->catalog_id,
        ];

        $category->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax())
        {
            Category::destroy($request->id);
        }
    }
}
