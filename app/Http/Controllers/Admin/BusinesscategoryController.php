<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesscategory;
use App\Models\Business_subcategory;
use Illuminate\Support\Facades\Storage;

class BusinesscategoryController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	$category=Businesscategory::orderBy("id","DESC")->get();
    	return view("admin.businesscategory.categorylist")->with("category",$category);
    }
    public function store(Request $request){
    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/businesscategory/".$imgName;
    	Storage::putFileAs('public/businesscategory/', $request->file('image'), $imgName);

    	$cate=new Businesscategory;
    	$cate->name=$request->name;
    	$cate->image=$imgUrl;
    	$save=$cate->save();
    	if($save){
    		$msg = array(
    		'message' => 'Business Category Successfully added', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url("admin/business/category"))->with($msg);
    }
    public function edit($id){
    	$category=Businesscategory::find($id);
    	return view("admin.businesscategory.categoryedit")->with("category",$category);
    }
    public function update(Request $request){
    	if($request->file('image')!=null){

    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/businesscategory/".$imgName;
    	Storage::putFileAs('public/businesscategory/', $request->file('image'), $imgName);

    	$cate=Businesscategory::find($request->id);
    	$cate->name=$request->name;
    	$cate->image=$imgUrl;
    	$save=$cate->save();
    	if($save){
    		$msg = array(
    		'message' => 'Business Category Successfully added', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    }else{
    		$cate=Businesscategory::find($request->id);
    	$cate->name=$request->name;
    	// $cate->image=$imgUrl;
    	$save=$cate->save();
    	if($save){
    		$msg = array(
    		'message' => 'Business Category Successfully added', 
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
    	return redirect(url("admin/business/category"))->with($msg);

    }
    public function delete($id){
    	$delete=Businesscategory::destroy($id);
    	if($delete){
    		$msg = array(
    		'message' => 'Business Category Successfully deleted', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url("admin/business/category"))->with($msg);
    }

    public function subcategory(){
    	$category=Businesscategory::orderBy("id","DESC")->get();
    	$subcategory=Business_subcategory::orderBy("id","DESC")->get();
    	return view("admin.businesscategory.subcategorylist",compact("subcategory","category"));
    }
    public function subcategory_store(Request $request){
    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/businesssubcategory/".$imgName;
    	Storage::putFileAs('public/businesssubcategory/', $request->file('image'), $imgName);

    	$cate=new Business_subcategory;
    	$cate->category_id=$request->category_id;
    	$cate->name=$request->name;
    	$cate->image=$imgUrl;
    	$save=$cate->save();
    	if($save){
    		$msg = array(
    		'message' => 'Business Sub Category Successfully added', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url("admin/business/subcategory"))->with($msg);
    }
    public function subcategory_edit($id){
    	$category=Businesscategory::orderBy("id","DESC")->get();
    	$subcategory=Business_subcategory::find($id);
    	return view("admin.businesscategory.subcategoryedit",compact("subcategory","category"));
    }
    public function subcategory_update(Request $request){
    	if($request->file('image')!=null){

    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/businesscategory/".$imgName;
    	Storage::putFileAs('public/businesscategory/', $request->file('image'), $imgName);

    	$cate=Business_subcategory::find($request->id);
    	$cate->name=$request->name;
    	$cate->category_id=$request->category_id;
    	$cate->image=$imgUrl;
    	$save=$cate->save();
    	if($save){
    		$msg = array(
    		'message' => 'Business Sub Category Successfully added', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    }else{
    		$cate=Business_subcategory::find($request->id);
    		$cate->category_id=$request->category_id;
    	$cate->name=$request->name;
    	// $cate->image=$imgUrl;
    	$save=$cate->save();
    	if($save){
    		$msg = array(
    		'message' => 'Business Sub Category Successfully added', 
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
    	return redirect(url("admin/business/subcategory"))->with($msg);

    }
    public function subcategory_delete($id){
    	$delete=Business_subcategory::destroy($id);
    	if($delete){
    		$msg = array(
    		'message' => 'Business Sub Category Successfully deleted', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url("admin/business/subcategory"))->with($msg);
    }

}
