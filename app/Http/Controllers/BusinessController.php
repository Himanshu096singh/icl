<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businesscategory;
use App\Models\Businessuser;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Admin\Product;
use App\Models\Timing;
use DB;

class BusinessController extends Controller
{
    public function index(){
    	$popular_business=Businessuser::where("status","0")->orderBy("id","ASC")->limit(3)->get();
    	$category=Businesscategory::orderBy("id","DESC")->limit(5)->get();
    	return view("business_directory.home",compact("category","popular_business"));
    }
    public function search(Request $request){
    	if(isset($_GET['keyword']) && isset($_GET['category'])){
    	$category=Businesscategory::where("name",'like','%'.$_GET['category'].'%')->first();
    	$search=Businessuser::orderBy("id","DESC")->where("status","0")->where("business_type",'like',$category->id)->count();
    		if($search>0){
    		$business=Businessuser::orderBy("id","DESC")
    		->where("business_type",$category->id)
    		->orWhere("city",'like','%'.$_GET['keyword'].'%')
    		->orWhere("state",'like','%'.$_GET['keyword'].'%')
    		->orWhere("zip_code",'like','%'.$_GET['keyword'].'%')
    		->get();
    		}else{
    			$business=Businessuser::orderBy("id","DESC")->where("status","0")->Where("id",'0')->get();
    		}
    		
    	}else if(isset($_GET['category'])){
            $business=Businessuser::where("status","0")->where("business_type",$_GET['category'])->orderBy("id","DESC")->get();
        }
        else if(isset($_GET['service'])){
            $business=DB::table("business")->where("status","0")->whereRaw("find_in_set(".$_GET['service'].",service_id)")->orderBy("id","DESC")->get();
        }
        else{
    		$business=Businessuser::where("status","0")->orderBy("id","DESC")->get();
    	}
    	$category=Businesscategory::orderBy("id","DESC")->get();
        $service=Service::orderBy("id","DESC")->get();
    	return view("business_directory.businesslisting",compact("business","category","service"));
    }
    public function business_details($id){
        $business_id=base64_decode($id);
        $business=Businessuser::find($business_id);
        $timing=Timing::where("user_id",$business->user_id)->orderBy("day","ASC")->get();
        $gallery=Gallery::where("business_id",$business->user_id)->orderBy("id","DESC")->limit(3)->get();
        $product_list=Product::where("business_id",$business->user_id)->where('status','1')->get();
        return view("business_directory.business_detail",compact("business","gallery","product_list","timing"));
    }
    public function business_gallery($id){
        $business_id=base64_decode($id);
        $business=Businessuser::find($business_id);
        $user_id=$business->id;
        // $gallery=Gallery::where("business_id",$business->user_id)->order("");
        return view("business_directory.gallery",compact("user_id","business"));
    }
    public function category_list(){
        $category=Businesscategory::orderBy("id","DESC")->get();
        return view("business_directory.category")->with("category",$category);
    }
}
