<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCategory(Request $request)
    {
        if ($request->ajax())
        {
            $id = $request->CatalogId;
            $categories = Category::where('catalog_id', $id)->get();

            foreach ($categories as $value)
            {
                printf("<option value='%s'>%s</option>", $value->id, $value->title);
            }
        }
    }
}
