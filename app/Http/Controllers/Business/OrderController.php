<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Business_order;
use App\Models\Payout;
use App\Models\Cart;
use DB;
use Auth;

class OrderController extends Controller
{
    public function __construct(){
    	$this->middleware("business");
    }
    public function index(){
    	$id=Auth::user()->id;
    	$order=Business_Order::where("business_order",$id)->orderBy("id","DESC")->get();
    	return view("business.order.list")->with("order",$order);
    }
    public function details($id){
    	$order_id=base64_decode($id);
    	$order=Business_Order::where("order_id",$order_id)->get();
    	return view("business.order.details")->with("order",$order);
    }
    public function earning(){
        $id=Auth::user()->id;
        $order=Business_Order::where("business_order",$id)->where("status","2")->where("payment_status","1")->orderBy("id","DESC")->get();
        // foreach ($order as $ord){
        //     $carts=explode(",",$ord->cart_ids);
        //     // echo ."<br/>";
        //     for($j=0;$j<count($carts);$j++){
        //         // echo $carts[$j]."<br/>";
        //         $prd=Cart::find($carts[$j]);
        //         echo $prd->product_name;

        //     }
           
        // }
        // die;
        $payouts=Payout::where("user_id",$id)->orderBy("id","DESC")->get();
        $total_earning=Business_Order::where("business_order",$id)->where("status","2")->where("payment_status","1")->orderBy("id","DESC")->sum("total_price");
        $total_payout=Payout::where("user_id",$id)->orderBy("id","DESC")->sum("paid_amount");
        $earning=$total_earning-$total_payout;
        
        return view("business.earning",compact("order","payouts","earning"));
    }
    public function payout_request(Request $request){
        $id=Auth::user()->id;
        $payout=new Payout;
        $payout->user_id=$id;
        $payout->request_amount=$request->amount;
        $payout->status='0';
        $save=$payout->save();
        if($save){
            $msg=array(
                'message'=>'Your Payout Request has been successfully proccessed',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something Went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('business/earning'))->with($msg);
    }
    public function delete($id){
    	$order_id=base64_decode($id);
        $order=Business_Order::destroy($order_id);
        if($order){
            $msg=array(
                'message'=>'Order Successfully Deleted',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('business/order'))->with($msg);
    }
    public function update_order_status(Request $request){
        $ord_id=$request->id;
        $ord_status=$request->status;
        // $status="";
        if($ord_status==0){
            $status="Pending";
        }
        else if($ord_status==1){
            $status="Accept";
        }
        else if($ord_status==2){
            $status="Complete";
        }
        else if($ord_status==3){
            $status="Rejected";
        }
        $order=Order::find($request->id);
        if($order){
            
            $order->status=$request->status;
            $status_p=$order->save();
            if($status_p){
                if($request->status==2){
                    // $payment=Order::find($request->id);
                    // $payment->payment_status=1;
                    // $payment->save();

                }
                  $msg = array(
            'message' => 'Order Status Successfully Changed', 
            'alert-type' => 'success'
        );
            }
             else{
            $msg = array(
            'message' => 'Something went wrong', 
            'alert-type' => 'danger'
        );
        }
            
            $customer_id=$order->user_id;
            $cart_id=$order->cart_ids;
            $order_id=$order->order_id;
            $order_status=$order->status;
            $total_price=$order->total_price;
        }
        /*$order->status=$request->status;
        $order->save();*/
                
        return redirect(url('business/order/details/'.base64_encode($order_id)))->with($msg);
    }
}
