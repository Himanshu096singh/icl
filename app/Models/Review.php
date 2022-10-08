<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Review extends Model
{
    public function products(){
       return $this->belongsTo(Product::class, 'product_id');
    }
}
