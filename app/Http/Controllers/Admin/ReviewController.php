<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Crypt;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = Review::with('products')->latest()->get();
        return view('admin.product_review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $review = Review::with('products')->find($id);
        if($review){
            return view('admin.product_review.edit',compact('review'));
        } else {
            abort(404);
        }
    
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
        $review = Review::find($id);
        $review->name = $request->name;
        $review->email = $request->email;
        $review->message = $request->message;
        $review->rating = $request->rating;
        $review->status = $request->status;
        $save = $review->save();

        if($save){
            $msg = array(
            'message' => 'Review Successfully Update.', 
            'alert-type' => 'success'
        );
        } else {
            $msg = array(
            'message' => 'Something went wrong', 
            'alert-type' => 'danger'
            );
        }
        return redirect()->back()->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $del = Review::destroy($id);
        if($del){
            $msg = array(
            'message' => 'Review Successfully Delete.', 
            'alert-type' => 'success'
        );
        } else {
            $msg = array(
            'message' => 'Something went wrong', 
            'alert-type' => 'danger'
            );
        }
        return redirect()->back()->with($msg);
    }
}
