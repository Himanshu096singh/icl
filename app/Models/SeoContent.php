<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoContent extends Model
{
    protected $fillable = ['page_name', 'meta_title', 'meta_keyword', 'meta_description'];
}
