<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = ['user_id', 'order_id', 'name', 'country', 'address1', 'address2', 'city', 'state', 'zip_code', 'phone', 'email'];
}
