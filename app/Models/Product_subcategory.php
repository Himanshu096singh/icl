<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;
class Product_subcategory extends Model
{
    public function products()
    {
         return $this->hasMany(Product::class, 'subcategory_id');
    } 
}
