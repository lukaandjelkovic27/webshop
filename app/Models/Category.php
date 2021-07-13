<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /*public function categoryProducts()
    {
        return $this->hasMany(CategoryProduct::class);
    }*/

    public function products()
    {
        return $this->hasManyThrough(Product::class, CategoryProduct::class, 'category_id', 'id', 'id', 'product_id');
    }
}
