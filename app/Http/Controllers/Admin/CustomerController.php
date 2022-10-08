<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Order;

class CustomerController extends Controller
{
     public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	$customer=User::where("role","3")->orderBy("id","DESC")->get();
    	return view("admin.customer.list")->with("customer",$customer);
    }
    public function create(){
    	return view("admin.customer.create");
    }
    public function store(Request $request){
    	$user= new User;
    	$user->name=$request->name;
    	$user->username=$request->username;
    	$user->email=$request->email;
    	$user->phone=$request->phone;
    	$user->location=$request->location;
    	$save=$user->save();
    	if($save){
    		$msg = array(
    		'message' => 'Customer Successfully Added', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/customer/'))->with($msg);
    }
    public function edit($id){
    	$user=User::find($id);
        $orders=Order::where("user_id",$id)->get();
    	return view("admin.customer.edit",compact("user","orders"));
    }
    public function update(Request $request){
    		$user= User::find($request->id);
    	$user->name=$request->name;
    	$user->username=$request->username;
    	$user->email=$request->email;
    	$user->phone=$request->phone;
    	$user->country=$request->country;
        $user->state=$request->state;
        $user->city=$request->city;
        $user->address1=$request->address1;
        $user->zip_code=$request->zip_code;
    	$save=$user->save();
    	if($save){
    		$msg = array(
    		'message' => 'Customer Successfully updated', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/customer/'))->with($msg);
    }
    public function delete($id){
    	$delete=User::destroy($id);
    	 	if($delete){
    		$msg = array(
    		'message' => 'Customer user Successfully deleted', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/customer/'))->with($msg);
    }
    public function update_status(Request $request){
    	$user=User::find($request->id);
    	$user->status=$request->status;
    	$user->save();
    	return 1;
    }
}
