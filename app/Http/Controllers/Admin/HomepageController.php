<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\Imageposition;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
        $image=Homepage::orderby("position",'ASC')->get();
    	return view("admin.homepage.list")->with('image',$image);
    }
    public function create(){
    	$position=Imageposition::all();
        return view("admin.homepage.create")->with('position',$position);
    }
    public function store(Request $request){
    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/homepage/".$imgName;
    	Storage::putFileAs('public/homepage/', $request->file('image'), $imgName);

    	$img= new Homepage;
    	$img->heading=$request->heading;
    	$img->description=$request->description;
    	$img->link=$request->link;
    	$img->image=$imgUrl;
    	$img->position=$request->position;
    	$save=$img->save();
    	if($save){
    		$msg = array(
    			'message' => 'Banner Successfully Uploaded',
    			'alert-type'=>'success' 
    		);
    	}else{
    		$msg = array(
    			'message' => 'Something went wrong',
    			'alert-type'=>'danger' 
    		);
    	}
    	return redirect(url('/admin/homepage'))->with($msg);
    }
}
