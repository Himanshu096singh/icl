<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public function __construct(){
        $this->middleware("admin");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping=Shipping::orderBy('id','DESC')->get();
        return view("admin.shipping.list")->with("shipping",$shipping);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.shipping.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save=Shipping::create($request->all());
        if($save){
            $msg=array(
                'message'=>'Shipping Charge successfuly saved',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('admin/shipping'))->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipping=Shipping::find($id);
        return view("admin.shipping.create")->with("shipping",$shipping);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping=Shipping::find($id);
        return view("admin.shipping.edit")->with("shipping",$shipping);
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
        $shipping=Shipping::find($id);
        $shipping->type=$request->type;
        $shipping->rate=$request->rate;
        $save=$shipping->save();
        if($save){
            $msg=array(
                'message'=>'Shipping Charge successfuly Updated',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('admin/shipping'))->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Shipping::destroy($id);
        if($delete){
            $msg=array(
                'message'=>'Shipping Charge successfuly Deleted',
                'alert-type'=>'success'
            );
        }else{
            $msg=array(
                'message'=>'Something went wrong',
                'alert-type'=>'danger'
            );
        }
        return redirect(url('admin/shipping'))->with($msg);
    }
}
