<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Billing;
use App\Models\Address;
use App\User;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(["customer", 'verified']);
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $total_orders = Order::where("user_id", $user_id)->count();
        $total_expenses = Order::where("user_id", $user_id)->sum('total_price');
        $customer = User::find($user_id);
        return view("customer.dashboard", compact('total_orders', 'total_expenses', 'customer'));
    }
    public function cart()
    {
        return redirect(url('/customer'));
    }
    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders_count = Order::where("user_id", $user_id)->count();
        $orders = Order::with('transaction')->where("user_id", $user_id)->orderBy("id", "DESC")->paginate(10);
        return view("customer.orders", compact("orders", "orders_count"));
    }
    public function orders_details($id)
    {
        try {
            $ids = base64_decode($id);
            $order_c = Order::where("id", $ids)->first();
            if ($order_c) {
                $order = Order::with(['transaction', 'billing'])->where("id", $ids)->first();
                return view("customer.order_details")->with("order", $order);
            } else {
                return abort(404);
            }
        } catch (\Exception $e) {
            return view('errors.500')->with('error', $e->getMessage());
        }
    }
    public function address()
    {
        $user_id = Auth::user()->id;
        $address = Address::where("user_id", $user_id)->get();
        return view("customer.address")->with("address", $address);
    }
    public function address_edit($id)
    {
        $address = Address::find($id);
        return view("customer.address_edit")->with("address", $address);
    }
    public function address_update(Request $request)
    {
        $address = Address::find($request->id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->zip_code = $request->zip_code;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $save = $address->save();
        if ($save) {
            $msg = array(
                'message' => 'Address Successfully updated',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('customer/address'))->with($msg);
    }
    public function account()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view("customer.account")->with("user", $user);
    }
    public function account_update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        // $user->username = $request->username;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        // $user->country = $request->country;
        // $user->state = $request->state;
        // $user->city = $request->city;
        // $user->address1 = $request->address1;
        // $user->zip_code = $request->zip_code;
        $save = $user->save();
        if ($save) {
            $msg = array(
                'message' => 'Profile Successfully updated',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('customer'))->with($msg);
    }
}
