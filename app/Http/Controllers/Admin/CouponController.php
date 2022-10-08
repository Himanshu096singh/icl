<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Coupon;

class CouponController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	$coupon=Coupon::orderBy("id","desc")->get();
    	return view("admin.coupon.list")->with("coupon",$coupon);
    }
    public function create(){
    	return view("admin.coupon.create");
    }
    public function store(Request $request){
    	$save=$coupon=Coupon::Create($request->all());
    	if($save){
    		$msg = array(
    		'message' => 'Coupon Successfully saved', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/coupon/'))->with($msg);
    }
    public function edit($id){
    	$coupon=Coupon::find($id);
    	return view("admin.coupon.edit")->with("coupon",$coupon);
    }
    public function update(Request $request){
    	$coupon=Coupon::find($request->id);
    	$coupon->name=$request->name;
    	$coupon->type=$request->type;
    	$coupon->coupon_value=$request->coupon_value;
    	$coupon->min_amount=$request->min_amount;
    	$coupon->max_amount=$request->max_amount;
    	$coupon->start_date=$request->start_date;
    	$coupon->end_date=$request->end_date;
    	$coupon->quantity=$request->quantity;
    	$save=$coupon->save();
    	if($save){
    		$msg = array(
    		'message' => 'Coupon Successfully updated', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/coupon/'))->with($msg);
    }
    public function delete($id){
    	$coupon=Coupon::destroy($id);
    	if($coupon){
    		$msg = array(
    		'message' => 'Coupon Successfully updated', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/coupon/'))->with($msg);
    }
    public function update_status(Request $request){
    	$coupon=Coupon::find($request->id);
    	$coupon->status=$request->status;
    	$save=$coupon->save();
    	return 1;
    }
}
