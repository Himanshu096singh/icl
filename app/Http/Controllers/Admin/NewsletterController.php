<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\NewsletterSubscribe;
use Mail;

class NewsletterController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function index(){
    	$newsletter=Newsletter::orderby("id","DESC")->get();
    	return view("admin.newsletter.list")->with("newsletter",$newsletter);
    }
    public function create(){
    	$newsletter=Newsletter:: orderby("id","DESC")->get();
        return view("admin.newsletter.create")->with("newsletter",$newsletter);
    }
    public function store(Request $request){
    	// $message='This email is generated from admin panel';
        $emails=$_POST['email'];
        
    	$send=Mail::send("emails.newsletter",[],function($message) use ($emails){
            $message->to($emails)->subject('Newsletter Email from Shopunity');
        });
        // var_dump(Mail::failures());
        // exit;
    	  	
    		$msg = array(
    			'message' =>'Email Successfully sent' , 
    			'alert-type'=>'success'
    		);
    	
    		// $msg = array(
    		// 	'message' =>'Something went wrong' , 
    		// 	'alert-type'=>'danger'
    		// );
    	
    	return redirect(url('admin/newsletter'))->with($msg);
    }
    public function edit($id){

    }
    public function update(Request $request){

    }
    Public function delete($id){
    	$delete=Newsletter::destroy($id);
    	if($delete){
    		$msg = array(
    			'message' =>'Subscriber Successfully Deleted' , 
    			'alert-type'=>'success'
    		);
    	}else{
    		$msg = array(
    			'message' =>'Something went wrong' , 
    			'alert-type'=>'danger'
    		);
    	}
    	return redirect(url('admin/newsletter'));
    }
}
