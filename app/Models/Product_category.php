<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Brand;
use App\Models\Admin\Product;

class Product_category extends Model
{
     // use SoftDeletes;
     protected $fillable = ['brand_id', 'name', 'slug', 'image'];

     public function brand()
     {
          return $this->belongsTo(Brand::class);
     }
     public function products()
     {
          return $this->hasMany(Product::class, 'category_id');
     }     
}
