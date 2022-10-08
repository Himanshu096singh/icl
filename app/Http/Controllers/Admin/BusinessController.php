<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\Admin\Business;
use App\Models\Businessuser;
use App\Models\Businesscategory;

class BusinessController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	// $users=Businessuser::orderBy("id","DESC")->get();
        $users=DB::select("SELECT business.* FROM business LEFT JOIN users ON business.user_id=users.id");
    	return view("admin.business.list")->with("users",$users);
    }
    public function create(){
    	return view("admin.business.create");
    }
    public function store(Request $request){
    	$business=Businessuser::create($request->all());
    		if($business){
    		$msg = array(
    		'message' => 'Business user Successfully saved', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/business/'))->with($msg);
    }
    public function edit($id){
    	$user=Businessuser::find($id);
        $cate=Businesscategory::orderBy("id","DESC")->get();
    	return view("admin.business.edit",compact("user","cate"));
    }
    public function update(Request $request){

    	$user=Businessuser::find($request->id);
        $user->business_name=$request->business_name;
    	$user->name=$request->name;
    	$user->business_email=$request->email;
        $user->phone=$request->phone;
    	$user->business_type=$request->business_type;
    	$user->how_old=$request->how_old;
    	$user->address1=$request->address1;
        $user->address2=$request->address2;
        $user->city=$request->city;
        $user->zip_code=$request->zip_code;
        $user->state=$request->state;
        $user->country=$request->country;
    	$user->save();
    	
    		$msg = array(
    		'message' => 'Business user Successfully updated', 
    		'alert-type' => 'success'
    	);
    	
    	return redirect(url('admin/business/'))->with($msg);
    }
    public function update_status(Request $request){
    	$user=Businessuser::find($request->id);
    	$user->status=$request->status;
    	$user->save();
    	return 1;
    }
    public function delete($id){
    	$delete=Business::destroy($id);
    	if($delete){
    		$msg = array(
    		'message' => 'Business user Successfully deleted', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('admin/business/'))->with($msg);
    }
}
