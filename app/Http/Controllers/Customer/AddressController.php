<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $address = Address::where("user_id", $user_id)->get();
        return view("customer.address")->with("address", $address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customer.address_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = Address::Create($request->all());
        if ($save) {
            $msg = array(
                'message' => 'Address Successfully Added',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('customer/address'))->with($msg);
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
        $address = Address::find($id);
        return view("customer.address_edit")->with("address", $address);
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
        $address = Address::find($id);
        $user_id = Auth::user()->id;
        if (isset($request->is_default)) {
            Address::where('user_id', $user_id)->where('id', '!=', $id)->update(['is_default' => '0']);
        }
        $save = $address->fill($request->all())->save();
        if ($save) {
            $msg = array(
                'message' => 'Address Successfully updated',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('customer/address'))->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->is_default;
        if ($address->is_default == '1') {
            $msg = [
                'message' => 'You cannot delete your Default Address',
                'alert-type' => 'error'
            ];
        } else {
            Address::destroy($id);
            $msg = [
                'message' => 'Your Address Successfully Deleted',
                'alert-type' => 'success'
            ];
        }
        return redirect(url('customer/address'))->with($msg);
    }
}
