<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timing;
use Auth;

class TimingController extends Controller
{
    
    public function __contstruct(){
        $this->middleware('business');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $timing=Timing::where("user_id",$user_id)->orderBy("day","ASC")->get();
        return view("business.timing.list")->with("timing",$timing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("business.timing.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::user()->id;
        $check=Timing::where("user_id",$user_id)->where("day",$request->day)->count();
        if($check>0){
             $msg=array(
                'message'=>'Timing for selected day is already exists',
                'alert-type'=>'warning'
            );
        }else{
        $timing=new Timing;
        $timing->user_id=$user_id;
        $timing->day=$request->day;
        $timing->start_time=$request->start_time;
        $timing->end_time=$request->end_time;
        $save=$timing->save();
        if($save){
            $msg=array(
                'message'=>'Your Timing Successfuly saved',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
    }
        return redirect(url('business/timing'))->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timing=Timing::find($id);
        return view('business.timing.edit')->with('timing',$timing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id=Auth::user()->id;
        $timing=Timing::find($id);
        $timing->user_id=$user_id;
        $timing->day=$request->day;
        $timing->start_time=$request->start_time;
        $timing->end_time=$request->end_time;
        $save=$timing->save();
        if($save){
            $msg=array(
                'message'=>'Your Timing Successfuly saved',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('business/timing'))->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timing=Timing::destroy($id);
        if($timing){
            $msg=array(
                'message'=>'Timing Slot Successfuly deleted',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('business/timing'))->with($msg);
    }
}
