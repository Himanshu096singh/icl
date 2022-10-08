<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Gallerycategory;
use Illuminate\Support\Facades\Storage;
use Auth;

class GalleryController extends Controller
{
    public function __construct(){
    	$this->middleware("business");
    }
    public function index(){
        $user_id=Auth::user()->id;
    	$gallery=Gallery::orderBy("id","DESC")->where("business_id",$user_id)->get();
    	return view("business.gallery.list")->with("gallery",$gallery);
    }
    public function create(){
    	$category=Gallerycategory::orderBy("id","DESC")->get();
    	return view("business.gallery.create")->with("category",$category);
    }
    public function store(Request $request){
    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/business/gallery/".$imgName;
    	Storage::putFileAs('public/business/gallery/', $request->file('image'), $imgName);

    	$gallery= new Gallery;
    	$gallery->business_id=Auth::user()->id;
    	$gallery->title=$request->title;
    	$gallery->category=$request->category;
    	$gallery->image=$imgUrl;
    	$save=$gallery->save();
    	if($save){
    		$msg=array(
    			'message' => 'Your Image has been uploaded.',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('business/gallery/'))->with($msg);

    }
    public function edit($id){
    	$gallery=Gallery::orderBy("id","DESC")->find($id);
    	$category=Gallerycategory::orderBy("id","DESC")->get();
    	return view("business.gallery.edit",compact("category","gallery"));
    }
     public function update(Request $request){
     	if($request->file('image')!=null){

    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/business/gallery/".$imgName;
    	Storage::putFileAs('public/business/gallery/', $request->file('image'), $imgName);

    	$gallery=Gallery::find($request->id);
    	$gallery->business_id=Auth::user()->id;
    	$gallery->title=$request->title;
    	$gallery->category=$request->category;
    	$gallery->image=$imgUrl;
    	$save=$gallery->save();
    	if($save){
    		$msg=array(
    			'message' => 'Your Image has been uploaded.',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    }
    else{
    	$gallery=Gallery::find($request->id);
    	$gallery->business_id="0";
    	$gallery->title=$request->title;
    	$gallery->category=$request->category;
    	// $gallery->image=$imgUrl;
    	$save=$gallery->save();
    	if($save){
    		$msg=array(
    			'message' => 'Your Image has been updated.',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    }
    	return redirect(url('business/gallery/'))->with($msg);

    }
    public function delete($id){
    	$delete=Gallery::destroy($id);
    		if($delete){
    		$msg=array(
    			'message' => 'Your Image successfuly Deleted',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('business/gallery'))->with($msg);
    }


    public function category(){
    	$category=Gallerycategory::orderBy("id","DESC")->get();
    	return view("business.gallery.category")->with("category",$category);
    }
    public function category_save(Request $request){
    	$category=Gallerycategory::Create($request->all());
    	if($category){
    		$msg=array(
    			'message' => 'Your Image category successfuly added',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('business/gallery/category'))->with($msg);
    }

    public function category_edit($id){
    	$category=Gallerycategory::find($id);
    	return view("business.gallery.categoryedit")->with("category",$category);
    }
    public function category_update(Request $request){
    	$category=Gallerycategory::find($request->id);
    	$category->name=$request->name;
    	$save=$category->save();
    	if($save){
    		$msg=array(
    			'message' => 'Your Image category successfuly updated',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('business/gallery/category'))->with($msg);
    }
    public function category_delete($id){
    	$delete=Gallerycategory::destroy($id);
    		if($delete){
    		$msg=array(
    			'message' => 'Your Image category successfuly Deleted',
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg=array(
    			'message' => 'Something Went Wrong',
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('business/gallery/category'))->with($msg);
    }

}
