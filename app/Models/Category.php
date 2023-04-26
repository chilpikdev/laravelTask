<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'catalog_id',
    ];

    public function getCatalog() {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id');
    }
}
