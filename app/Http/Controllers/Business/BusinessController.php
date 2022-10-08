<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Business;
use App\Models\Businessuser;
use App\Models\Businesscategory;
use App\Models\Order;
use App\Models\Service;
use App\Models\Business_order;
use Auth;
use DB;

class BusinessController extends Controller
{
     public function __construct(){
    	$this->middleware("business");
    }
    public function index(){
        $user_id=Auth::user()->id;
       $revenue=Business_Order::where("business_order",$user_id)->sum("total_price");
        $total_order=DB::table("orders")->where("business_order",$user_id)->where("status","0")->count();
    	return view("business.dashboard",compact("revenue","total_order"));
    }
    public function profile(){
    	// $user=Business::find(Auth::user()->id);
        $category=Businesscategory::orderby("id","DESC")->get();
        $service=Service::orderby("id","DESC")->get();
        $userdetails=DB::table("business")->select("business.*","users.email")->join("users","business.user_id",'=','users.id')->where("users.id",Auth::user()->id)->get();
    	return view("business.profile",compact("userdetails","category","service"));
    }
    public function profile_update(Request $request){
        if($request->file('image')!=null){
        $imgName=$request->file('image')->getClientOriginalName();
        $imgUrl= "storage/business/image/".$imgName;
        Storage::putFileAs('public/business/image/', $request->file('image'), $imgName);

    	$user=Businessuser::where("user_id",Auth::user()->id)->first();
    	$user->name=$request->name;
    	$user->business_email=$request->business_email;
        $user->business_name=$request->business_name;
    	$user->business_type=$request->business_type;
        $user->service_id=implode(",",$_POST['services']);
    	$user->phone=$request->phone;
    	$user->address1=$request->address1;
        $user->address2=$request->address2;
        $user->city=$request->city;
        $user->state=$request->state;
        $user->zip_code=$request->zip_code;
        $user->country=$request->country;
        $user->image=$imgUrl;
    	$save=$user->save();
    	if($save){
    		$msg = array(
    		'message' => 'Profile Successfully updated', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    }
    else{
        $user=Businessuser::where("user_id",Auth::user()->id)->first();
        $user->name=$request->name;
        $user->business_email=$request->business_email;
        $user->business_name=$request->business_name;
        $user->business_type=$request->business_type;
        $user->service_id=implode(",",$_POST['services']);
        $user->phone=$request->phone;
        $user->address1=$request->address1;
        $user->address2=$request->address2;
        $user->city=$request->city;
        $user->state=$request->state;
        $user->zip_code=$request->zip_code;
        $user->country=$request->country;
        $save=$user->save();
        if($save){
            $msg = array(
            'message' => 'Profile Successfully updated', 
            'alert-type' => 'success'
        );
        }
        else{
            $msg = array(
            'message' => 'Something went wrong', 
            'alert-type' => 'danger'
        );
        }
    }
    	return redirect(url('business/profile/'))->with($msg);
    }
    public function password_update(Request $request){
    	$id=Auth::user()->id;
    	$user=Business::find($id);
    	echo $user->password."<br/>";
    	return Hash::make($request->password);
    	if($user->password==Hash::make($request->password)){
    		$updateuser=Business::find($id);
    		$updateuser->password=Hash::make($request->newpassword);
    		$updateuser->save();  
    		$msg = array(
    		'message' => 'Profile Successfully updated', 
    		'alert-type' => 'success'
    	);  		
    	}
    	else{
    		$msg = array(
    		'message' => 'You Entered wrong password', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('business/profile/'))->with($msg);
    }
}
