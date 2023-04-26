<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $catalogs = Catalog::all();

        return view('pages.products')->with(['products' => $products, 'catalogs' => $catalogs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'catalog_id' => $request->catalog_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'promoprice' => $request->promoprice,
            'promostart' => $request->promostart,
            'promoend' => $request->promoend,
        ];

        Product::create($data);

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $data = [
            'title' => $request->title,
            'catalog_id' => $request->catalog_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'promoprice' => $request->promoprice,
            'promostart' => $request->promostart,
            'promoend' => $request->promoend,
        ];

        $product->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax())
        {
            Product::destroy($request->id);
        }
    }
}
