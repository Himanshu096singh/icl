<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Paytm\Encdec;
use App\Models\Transaction;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Billing;
use App\User;
use Auth;
use Mail;
use Cart as ShoppingCart;
use App\Mail\OrderConfirm;


class PaytmController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('customer');
    // }
    public function index(Request $request)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = $request->session()->get('user_id');
        } 

        $isValidChecksum = "FALSE";
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

        $enc = new Encdec;
        $isValidChecksum = $enc->verifychecksum_e($request->all(), config('paytm.merchant_key'), $paytmChecksum); 
        
        if($isValidChecksum == "TRUE") {
            if ($request->STATUS == "TXN_SUCCESS") {
                
                $txn = Transaction::firstOrCreate($request->all());     
                $order = Order::where('order_id',$txn->ORDERID)->update([
                    'status'=>'1',
                    'payment_status' => '1',
                    'transaction_id' => $txn->TXNID,
                ]);
                Invoice::where('order_id',$txn->ORDERID)->update(['status'=>'1']);
		        $customer_details=User::find($user_id);
		        $order_details=Order::where("order_id",$txn->ORDERID)->first();
		        $billing=Billing::where("order_id",$txn->ORDERID)->first();                
                $data = [
                    'name' => $customer_details->name,
                    'order_id' => $txn->ORDERID,
                    'time' => $order_details->created_at,
                    'address' => $billing,
                    'payment_method' => 'Paytm',
                    'cart_ids' => $order_details->cart_ids,
                    'total_amount' => $order_details->total_price,
                ];
                // Mail::to($customer_details->email)->send(new OrderConfirm($data)); 
                ShoppingCart::clear();
                ShoppingCart::clearCartConditions();               
		        return view('order_success',compact("customer_details","order_details","billing","txn"));    

	        }
            if($request->STATUS == 'TXN_FAILURE'){
                return view('errors.500')->with('error', $request->RESPMSG);
            }
             else {
                $txn = Transaction::firstOrCreate($request->all());	
                $order = Order::where('order_id',$txn->ORDERID)->delete();
                $delete = Transaction::where('ORDERID',$txn->ORDERID)->delete();
                $msg = [
                    'message' => 'Paytm Transaction is Failed',
                    'alert-type' => 'danger'
                ];
                return view('payment_fail',compact('msg'));
            }  

        } else {
            $msg = [
                'message' => 'Paytm Checksum is mismtached',
                'alert-type' => 'danger'
            ];
        	return view('payment_fail',compact('msg'));
        }        
    }
}
