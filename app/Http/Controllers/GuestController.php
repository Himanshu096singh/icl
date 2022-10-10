<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Admin\Page;
use App\Models\Billing;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Cart;
use Mail;
use App\Mail\OrderConfirm;
use App\Mail\UserRegistration;
use App\User;
use Cart as ShoppingCart;
use Auth;
use DB;
use View;
use App\Libraries\Paytm\Encdec;

class GuestController extends Controller
{
   public function __construct(){
        $fpage = Page::get();
        View::share(compact('fpage'));
        }
    public function checkout()
    {
        
        if (count(ShoppingCart::getContent()) == 0) {
            $msg = [
                'message' => 'You must order something first',
                'alert-type' => 'info'
            ];
            return redirect()->to('shop')->with($msg);
        }        
        $cart_content = ShoppingCart::getContent();
        return view('guest_checkout', compact('cart_content'));
    }
    public function place_order(Request $request)
    {
        if(ShoppingCart::isEmpty()){
            $msg = [
                'message' => 'Cart is Empty',
                'alert-type' => 'danger'
            ];
            return redirect()->back()->with($msg);
        }
        $payment_method = $request->payment_method;
        if ($payment_method == 0) {
            
            DB::beginTransaction();
            try {                
                $inputs = $request->all();
                $psw = \Str::random(8);
                $inputs['password'] = \Hash::make($psw);
                $inputs['role'] = '3';
                $inputs['email_verified_at'] = \now();
                $inputs['title'] = 'Default Address';        
                $user = User::where('email',$request->email)->first();
                if(!$user){
                    $regData = [
                        'url' => url('login'),
                        'email' => $request->email,
                        'password' => $psw
                    ];            
                    $user = User::create($inputs);
                    Mail::to($request->email)->send(new UserRegistration($regData));
                }
                $user->address()->create($inputs);        
                $user_id = $user->id;                
                
                $content = ShoppingCart::getContent();
                    $cartid = array();
                    foreach ($content as $values) {
                        $cartid[] = DB::table('carts')->insertGetId(['user_id' => $user_id, 'product_id' => $values->model->id, 'product_name' => $values->name, 'price' => $values->price, 'qty' => $values->quantity, 'attributes' => $values->attributes, 'status' => '1']);
                    }
                    $order_id = "ORD" . rand(11111111, 99999999);
                    $shipping_charge = 0;
                    $total_amount = ShoppingCart::getTotal();
                    $order = new Order;
                    $order->user_id = $user_id;
                    $order->order_id = $order_id;
                    $order->cart_ids = $cartid;
                    $order->shipping_charge = $shipping_charge;
                    $order->total_price = $total_amount + $shipping_charge;
                    $order->payment_method = 'COD';
                    $order->save();
                    $order_details = $order;

                    $inputs['order_id'] = $order_id;
                    $billing = Billing::create($inputs);

                    $txn_id = "";
                    $invoice = new Invoice;
                    $invoice->order_id = $order_id;
                    $invoice->user_id = $user_id;
                    $invoice->txn_id = $txn_id;
                    $invoice->save();

                    $customer_details = User::find($user_id);
                    DB::commit();
                    
                    $data = [
                        'name' => $customer_details->name,
                        'order_id' => $order_id,
                        'time' => $order_details->created_at,
                        'address' => $billing,
                        'payment_method' => 'Cash On Delivery',
                        'cart_ids' => $order_details->cart_ids,
                        'total_amount' => $order_details->total_price,
                    ];
                   // Mail::to($customer_details->email)->send(new OrderConfirm($data));                   
                    
                    ShoppingCart::clear();
                    ShoppingCart::clearCartConditions();

                    return view("order_success", compact("customer_details", "order_details", "billing"));
                
            } catch (\Exception $e) {
                DB::rollback();
                return view('errors.500')->with('error', $e->getMessage());
            }
        }
        // Start Paytm Payment Gateway------------------------------------------------------------
        elseif ($payment_method == 1) {
            
            DB::beginTransaction();
            try {
                $inputs = $request->all();
                $psw = \Str::random(8);
                $inputs['password'] = \Hash::make($psw);
                $inputs['role'] = '3';
                $inputs['email_verified_at'] = \now();
                $inputs['title'] = 'Default Address';        
                $user = User::where('email',$request->email)->first();
                if(!$user){
                    $regData = [
                        'url' => url('customer-login'),
                        'email' => $request->email,
                        'password' => $psw
                    ];            
                    $user = User::create($inputs);
                    Mail::to($request->email)->send(new UserRegistration($regData));
                }
                $user->address()->create($inputs);        
                $user_id = $user->id;              
                $request->session()->put('user_id', $user->id);

                $content = ShoppingCart::getContent();
                $cartid = [];
                    foreach ($content as $values) {
                        $cartid[] = DB::table('carts')->insertGetId(['user_id' => $user_id, 'product_id' => $values->model->id, 'product_name' => $values->name, 'price' => $values->price, 'qty' => $values->quantity, 'attributes' => $values->attributes, 'status' => '1']);
                    }
                    $order_id = "ORD" . rand(11111111, 99999999);
                    $shipping_charge = 0;
                    $total_amount = ShoppingCart::getTotal();
                    
                    $order = Order::create(['user_id' => $user_id,'order_id' => $order_id,'cart_ids' => $cartid,'shipping_charge' => $shipping_charge,'total_price' => $total_amount + $shipping_charge,'payment_method' => 'PAYTM',]);

                    $inputs['order_id'] = $order_id;
                    $billing = Billing::create($inputs);
                    $invoice = Invoice::create(['order_id' => $order_id,'user_id' => $user_id]);
                    $customer_details = User::find($user_id);
                    DB::commit();                    
                
            } catch (\Exception $e) {
                DB::rollback();
                return view('errors.500')->with('error', $e->getMessage());
            }

            $txnData = [
                'order_id' => $order_id,
                'user_id' => $user_id,
                'amount' => $order->total_price,
            ];
            $paytm = new \App\Http\Controllers\PaymentController;
            return $paytm->index($txnData);
            
        } else {
            $msg = [
                'message' => 'Online Payment Method is not Active yet',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($msg);
        }
    }
    public function load_address($id)
    {
        $address = Address::find($id);
        return view('pages.load_address')->with('address', $address);
    }
}
