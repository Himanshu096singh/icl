<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Businessuser extends Model
{
    protected $table="business";
    protected $fillable=['name','business_email','business_type','business_name','phone','password','address1','address2','city','state','zip_code'];
}
