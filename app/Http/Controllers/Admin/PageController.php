<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Product;
use Illuminate\Support\Str;
use App\Models\Admin\Page;

class PageController extends Controller
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
        $page = Page::latest()->get();
        return view('admin.pages.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug'  => 'required|string|max:255|unique:pages,slug',
            'metatitle' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ]); 

       if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $page               = new Page;
        $page->name         = $request->name;
        $page->slug         = Str::slug($request->slug);
        $page->metatitle       = $request->metatitle;
        $page->metadescription = $request->metadescription;
        $page->metakeywords    = $request->metakeywords;
        $page->description     = $request->description;
        
        $save = $page->save();
        if ($save) {
            $msg = array(
                'message' => 'Page Successfully added',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url("admin/page/"))->with($msg);
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
       $page = Page::find($id);
       return view('admin.pages.edit',compact('page'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug'  => 'required|string|max:255|unique:pages,slug,'.$id,
            'metatitle' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ]); 

       if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $page                   = Page::find($id);
        $page->name             = $request->name;
        $page->slug             = Str::slug($request->slug);
        $page->metatitle        = $request->metatitle;
        $page->metadescription  = $request->metadescription;
        $page->metakeywords     = $request->metakeywords;
        $page->description      = $request->description;
        
        $save = $page->save();
        if ($save) {
            $msg = array(
                'message' => 'Page Successfully added',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url("admin/page/"))->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Page::destroy($id);
        if ($delete) {
            $msg = array(
                'message' => 'Successfully deleted',
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
