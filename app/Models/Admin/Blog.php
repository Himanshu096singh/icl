<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function faq(){
    	return $this->hasMany(Blogfaq::class);
    }
}
