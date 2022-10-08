<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use App\Models\Billing;
use App\User;

class Order extends Model
{
    protected $fillable = ['user_id','order_id','cart_ids','shipping_charge','total_price','payment_method','transaction_id'];

    protected $casts  = [
        'cart_ids' => 'array',
    ];

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'TXNID', 'transaction_id');
    }
    /**
     * Get the billing associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function billing()
    {
        return $this->hasOne(Billing::class, 'order_id', 'order_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
