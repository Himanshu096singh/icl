<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = ['user_id', 'title', 'name', 'country', 'address1', 'address2', 'city', 'state', 'zip_code', 'phone', 'email', 'is_default'];
}
