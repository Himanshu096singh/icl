<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Billing;
use App\Models\Order;
use App\Models\Business_order;
use App\Models\Invoice;
use App\User;
use Auth;
use DB;
use Mail;
use App\Mail\OrderConfirm;
use App\Mail\OrderInvoice;

class CartController extends Controller
{
    public function __construct(){

    }
    public function addtocart(Request $request){
		$product_id=$request->product_id;
		$product_data=DB::table("products")->where("id",$product_id)->get();
		foreach($product_data as $pd){
			$product_business="";
			if($pd->business_id==null){
				$product_business=0;
			}
			if($pd->business_id!=null){
				$product_business=$pd->business_id;
			}
			if(Auth::check()){
			$user_id=Auth::user()->id;
			}
			else{
				if(!session("auth_id")){
					$rand_id=rand(11111111,99999999);
					$user_id=$request->session()->put('auth_id', $rand_id);
				}
				else{
				$user_id=session("auth_id");					
				}
			}
			if($pd->is_sale==1){
				$pd_price=$pd->sale_price;
			}else{
				$pd_price=$pd->price;
			}
			
			$product_id=$pd->id;
			$product_name=$pd->name;
			$price=$pd->price;
			$qty=$request->qty;
			$status=0;
		}

		$check_cart=Cart::where("user_id",$user_id)->where("product_id",$product_id)->where("status",0)->count();
		if($check_cart!=0){
			$check_cart1=Cart::where("user_id",$user_id)->where("product_id",$product_id)->where("status",0)->get();
			foreach($check_cart1 as $item){
				$a_qty=$item->qty;
				$cart_ID=$item->id;
			}
			$cart=Cart::find($cart_ID);
		$cart->user_id=$user_id;
		$cart->product_id=$product_id;
		$cart->business_id=$product_business;
		$cart->product_name=$product_name;
		$cart->price=$pd_price;
		$cart->qty=$qty+$a_qty;
		$cart->status=$status;
		$cart_save=$cart->save();
		return 0;
		}
		else{

			$cart= new Cart;
		$cart->user_id=$user_id;
		$cart->product_id=$product_id;
		$cart->business_id=$product_business;
		$cart->product_name=$product_name;
		$cart->price=$pd_price;
		$cart->qty=$qty;
		$cart->status=$status;
		$cart_save=$cart->save();
		return 1;
		}
		
	}
	public function viewcart(){
		$user_id="";
		if(Auth::check()){
			$user_id=Auth::user()->id;
			}
			else{
				if(!session("auth_id")){
					$rand_id=rand(11111111,99999999);
					$user_id=$request->session()->put('auth_id', $rand_id);
				}
				else{
				$user_id=session("auth_id");					
				}
			}
		$content=Cart::where("qty",">",0)
		->where("user_id",$user_id)
		->where("status",0)
		->get();
		return view('cart')->with("content",$content);
	}
	public function update_cart(Request $request){
		$id=$request->cart_id;
		$qty=$request->qty;
		$cart=Cart::find($id);
		$cart->qty=$qty;
		$cart->save();		
	}
	public function delete_cart(Request $request){
		$id=$request->cart_id;
		$cart=Cart::find($id);
		$cart->delete();
	}
	public function cart_content(){
        return view("cart_content");
    }
    public function cart_count(){

    		$user_id="";
		if(Auth::check()){
			$user_id=Auth::user()->id;
			}
			else{
				if(!session("auth_id")){
					$rand_id=rand(11111111,99999999);
					$user_id=$request->session()->put('auth_id', $rand_id);
				}
				else{
				$user_id=session("auth_id");					
				}
			}
		return $content=Cart::where("qty",">",0)
		->where("user_id",$user_id)
		->where("status","0")
		->count();
    }
    public function checkout(Request $request){
    	if(Auth::check() && Auth::user()->role==3){
    	$user_id=Auth::user()->id;
    	$user=DB::table("users")->where("id",$user_id)->get();
    	$content=Cart::where("qty",">",0)
		->where("user_id",$user_id)
		->where("status","0")
		->get();
		 $total_amount=$request->amount;
		 if(isset($request->coupon_id)){
		 	for($i=0;$i<count($_POST['cart_ids']);$i++){
		 		$cart=DB::table('carts')->where('id',$_POST['cart_ids'][$i])->update(['is_coupon'=>'1','coupon_id'=>$request->coupon_id]);
		 	}
		 }
		
    	return view("checkout",compact("user","content",'total_amount'));
    }else{
    	return redirect(url('/customer-login'));
    }
    
    }
    public function place_order(Request $request){
		$payment_method=$request->payment_method;
		
		if($payment_method==0){
		
		$order_id="ORD".rand(11111111,99999999);
		$cartid=$request->cart_id;

               
		$cart_id=implode(",",$cartid);
		$shipping_charge=$request->shipping_charge;
		$total_amount=$request->amount;
		$user_id=Auth::user()->id;

		
		if($request->business_id!=null){
		$business_order1=$_POST['business_id'][0];
		$b_cartid=array();
		$b_amount=0;
		for($i=0;$i<count($cartid);$i++){
        	$get_cart=DB::table("carts")->where("id",$_POST['cart_id'][$i])->first();
        	if($get_cart->business_id!=0){
        		$b_cartid[]=$get_cart->id;
        		$b_amount+=$get_cart->price;
	        }
        }
        // print_r($b_cartid);
        $bcartid=implode(",",$b_cartid);
        
        $business_order= new Business_order;
		$business_order->user_id=$user_id;
		$business_order->order_id=$order_id;
		$business_order->cart_ids=$bcartid;
		$business_order->business_order=$business_order1;
		$order->shipping_charge=$shipping_charge;
		$business_order->total_price=$b_amount+$shipping_charge;
		$business_order_placed=$business_order->save();
        
		}else{
			$business_order1=0;
		}
		// echo $business_order;
		
		$order= new Order;
		$order->user_id=$user_id;
		$order->order_id=$order_id;
		$order->cart_ids=$cart_id;
		$order->business_order=$business_order1;
		$order->shipping_charge=$shipping_charge;
		$order->total_price=$total_amount+$shipping_charge;
		$order_placed=$order->save();



		
		if($order_placed){
			for($i=0;$i<count($cartid);$i++){
			$affected = DB::table('carts')->where('id', $cartid[$i])->update(['status' => 1]);
			}

			$billing= new Billing;
			$billing->user_id=$user_id;
			$billing->order_id=$order_id;
			$billing->name=$request->name;
			$billing->country=$request->country;
			$billing->address1=$request->address1;
			$billing->address2=$request->address2;
			$billing->city=$request->city;
			$billing->state=$request->state;
			$billing->zip_code=$request->zip_code;
			$billing->phone=$request->phone;
			$billing->email=$request->email;
			$billing->notes=$request->notes;
			$billing->save();
		}
		
		$customer_details=User::find($user_id);
		$order_details=Order::where("order_id",$order_id)->get();
		$billing_details=Billing::where("order_id",$order_id)->get();
		$name=$request->name;
		Mail::to($request->email)->send(new OrderConfirm($name));
		
		$txn_id="";
		$invoice=new Invoice;
		$invoice->order_id=$order_id;
		$invoice->user_id=$user_id;
		$invoice->txn_id=$txn_id;
		$invoice->save();

		$invoice_data=array(
			"order_id"=>$order_id
		);

		// Mail::to($request->email)->send(new OrderInvoice($invoice_data));

		return view("order_success",compact("customer_details","order_details","billing_details"));		
	  }
	  else{
		  echo  "Please Select COD";
	  }
	  
	
	
	}
}
