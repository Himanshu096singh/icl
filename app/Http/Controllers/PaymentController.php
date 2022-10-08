<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Paytm\Encdec;
use Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($txnData)
    {
        $PAYTM_TXN_URL = 'https://securegw-stage.paytm.in/order/process';
        if (config('paytm.enviroment') == 'PROD') {        
            $PAYTM_TXN_URL = 'https://securegw.paytm.in/order/process';
        }
        
        $paramList = [
            "MID" => config('paytm.merchant_id'),        
            "ORDER_ID" => $txnData['order_id'],
            "CUST_ID" => $txnData['user_id'],
            "INDUSTRY_TYPE_ID" => 'Retail',
            "CHANNEL_ID" => 'WEB',
            "TXN_AMOUNT" => $txnData['amount'],
            "WEBSITE" => config('paytm.merchant_website'),
            "CALLBACK_URL" => url('payment/response'),
        ];
            
        $enc = new Encdec;
        $checkSum = $enc->getChecksumFromArray($paramList, config('paytm.merchant_key'));
        return view('payment_process', compact('paramList', 'checkSum', 'PAYTM_TXN_URL'));
    }
}
