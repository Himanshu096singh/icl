<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Product;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\Imageposition;
use App\Models\Productpage;
use DB;

class MarkupController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	$product=Product::orderBy("id","desc")->where("business_id","!=",null)->get();
    	return view("admin.markup_product.list")->with("product",$product);
    }
    public function edit($id){
    	$product=Product::find($id);
    	$category=Product_category::orderBy("id","desc")->where("status","0")->get();
    	$subcategory=Product_subcategory::orderBy("id","desc")->where("status","0")->get();
    	return view("admin.markup_product.edit",compact("category","subcategory","product"));
    }
    public function update(Request $request){
    	$product=Product::find($request->id);
    	$product->commission_value=$request->commission_value;
    	$product->commission_price=$request->commission_price;
    	$save=$product->save();
    	if($save){
    		$msg=array(
    			'message'=>'Product Successfully Updated.',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message'=>'Something went wrong',
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('admin/product/business-product'))->with($msg);
    }
    public function update_status(Request $request){
    	$product=Product::find($request->product_id);
    	$cprice=$product->price*(20/100);
    	$product->status=$request->status;
    	$product->commission_value=20;
    	$product->commission_price=$cprice;
    	$save=$product->save();
    	if($save){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
