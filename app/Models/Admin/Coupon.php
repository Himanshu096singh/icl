<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=['name','type','coupon_value','min_amount','max_amount','start_date','end_date','quantity'];
}
