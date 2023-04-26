<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return redirect(route('products.index'));
});

Route::get('getcategory', [AjaxController::class, 'getCategory']);

Route::get('catalogs', [CatalogController::class, 'index'])->name('catalogs.index');
Route::post('catalogs', [CatalogController::class, 'store'])->name('catalogs.store');
Route::put('catalogs', [CatalogController::class, 'update'])->name('catalogs.update');
Route::get('deletecatalog', [CatalogController::class, 'destroy']);

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('categories', [CategoryController::class, 'update'])->name('categories.update');
Route::get('deletecategory', [CategoryController::class, 'destroy']);

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::put('products', [ProductController::class, 'update'])->name('products.update');
Route::get('deleteproduct', [ProductController::class, 'destroy']);
