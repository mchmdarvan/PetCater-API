<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'categories_id', 'price', 'description',
    ];

    protected $hidden = [

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
}
