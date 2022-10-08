<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['CURRENCY','GATEWAYNAME','RESPMSG','BANKNAME','PAYMENTMODE','MID','RESPCODE','TXNID','TXNAMOUNT','ORDERID','STATUS','BANKTXNID','TXNDATE','CHECKSUMHASH'];
}
