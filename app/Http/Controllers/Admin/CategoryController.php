<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Imageposition;
use App\Models\Categoryimage;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Product_category::with('brand')->orderby('id', 'desc')->get();
        $position = Imageposition::all();
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.category.create', compact('category', 'position', 'brands'));
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
        $inputs = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:product_categories,name',
            'image' => 'required|mimes:jpeg,jpg,png,gif,webp|required|max:10000',
            'alt' => 'required',
            'metatitle' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ]); 

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $inputs = $request->all();
            if ($request->has('image')) {
                $fileName = uniqid().'_'.$request->file('image')->getClientOriginalName();
                $fileUrl = 'storage/product_category/' . $fileName;
                \Storage::putFileAs('public/product_category/', $request->file('image'), $fileName);
                $inputs['image'] = $fileUrl;
            }
            $inputs['slug'] = Str::slug($inputs['name']);
            Product_category::create($inputs);
            $msg = [
                'message' => 'Category Successfully saved',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $msg = [
                'message' => $e->getMessage(),
                'alert-type' => 'success'
            ];
        }
        return redirect()->back()->with($msg);
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
        $cate = Product_category::find($id);
        $subcate = Product_subcategory::where('category_id', $id)->get();
        $position = Imageposition::all();
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.category.edit', compact('cate', 'subcate', 'position', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_category $category)
    {
        try {
            $inputs = $request->all();
            if ($request->file('image') != null) {

                if(File::exists(public_path($request->oldimage))) {
                    unlink(public_path($request->oldimage));
                }
                $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/category');
            } else {
                $imgUrl = $request->oldimage;
            }
            // $inputs['slug'] = Str::slug($inputs['name']);
            $cat = Product_category::find($request->id);
            $cat->meta_title     = $request->metatitle;
            $cat->meta_description = $request->metadescription;
            $cat->meta_keyword  = $request->metakeywords;
            $cat->image         = $imgUrl;
            $cat->alt           = $request->alt;
            $save               = $cat->save();            
            $msg = [
                'message' => 'Category Successfully updated',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $msg = [
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            ];
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
        $delete = Product_category::destroy($id);
        if ($delete) {
            $msg = array(
                'message' => 'Category Successfully deleted',
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
