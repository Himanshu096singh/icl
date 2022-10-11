<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Brand;
use App\Models\Admin\Product;
use App\Models\Product_subcategory;

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
     public function subcategory(){
          return $this->hasMany(Product_subcategory::class,'category_id');
     }
}
