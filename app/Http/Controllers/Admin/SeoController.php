<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoContent;
use Illuminate\Http\Request;
use App\Libraries\Frontend;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seos = SeoContent::orderBy('id', 'DESC')->get();
        return view('admin.seo.list')->with('seos', $seos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frontend = new Frontend;
        return $pagename = $frontend->routes();
        return view('admin.seo.create')->with('pagename', $pagename);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $check = SeoContent::where('page_name', $request->page_name)->first();
            if ($check) {
                $check->fill($request->all())->save();
            } else {
                SeoContent::Create($request->all());
            }
            $msg = [
                'message' => 'Meta Content Has been updated.',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $msg = [
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            ];
        }
        return redirect()->to('admin/seo')->with($msg);
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
        $seo = SeoContent::find($id);
        return view('admin.seo.edit')->with('seo', $seo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeoContent $seo)
    {
        try {
            $seo->fill($request->all())->save();
            $msg = [
                'message' => 'Meta Content Has been updated.',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $msg = [
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            ];
        }
        return redirect()->to('admin/seo')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            SeoContent::destroy($id);
            $msg = [
                'message' => 'Meta Content Has been Deleted.',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $msg = [
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            ];
        }
        return redirect()->to('admin/seo')->with($msg);
    }
}
