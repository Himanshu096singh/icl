<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Admin\Setting;
use App\Models\Offerbannerone;

class PagesController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
        $setting=DB::table("settings")->limit(1)->get();
        return view("admin.pages.settings")->with("setting",$setting);
    }
    public function update(Request $request){
       
        if($request->file('image')){
             $imgName=$request->file('image')->getClientOriginalName();
        $imgUrl= "storage/settings/".$imgName;
        Storage::putFileAs('public/settings/', $request->file('image'), $imgName);
        
        $setting=Setting::find($request->id);
        $setting->store_name=$request->store_name;
        $setting->store_phone=$request->store_phone;
        $setting->store_email=$request->store_email;
        $setting->alt=$request->alt;
        $setting->store_logo=$imgUrl;
        $setting->store_address=$request->store_address;
        $save=$setting->save();
        if($save){
            $msg = array(
            'message' => 'Setting Successfully saved', 
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
        $setting=Setting::find($request->id);
        $setting->store_name=$request->store_name;
        $setting->store_phone=$request->store_phone;
        $setting->alt=$request->alt;
        $setting->store_email=$request->store_email;
        $setting->store_address=$request->store_address;
        $save=$setting->save();
        if($save){
            $msg = array(
            'message' => 'Setting Successfully saved', 
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


        return redirect(url('admin/settings/'))->with($msg);
    }
  
}
