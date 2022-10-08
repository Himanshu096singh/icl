<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product_category;
use App\Models\Admin\Product;

class Brand extends Model
{
    protected $fillable = ['name', 'alt','slug', 'image', 'meta_title', 'meta_keyword', 'meta_description'];

    /**
     * Get all of the categories for the Brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Product_category::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            Product_category::class,
            'brand_id',
            'category_id',
            'id',
            'id'
        );
    }
}
