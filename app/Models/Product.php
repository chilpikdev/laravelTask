<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'catalog_id',
        'category_id',
        'price',
        'promoprice',
        'promostart',
        'promoend',
    ];

    public function getCatalog() {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id');
    }

    public function getCategory() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
