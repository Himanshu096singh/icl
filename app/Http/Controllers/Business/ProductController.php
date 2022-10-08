<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Product;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Color;
use App\Models\Size;
use DB;
use Auth;

class ProductController extends Controller
{
    public function __Construct(){
    	$this->middleware("business");
    }
    public function index(){
    	$product=Product::orderBy("id","desc")->where("business_id",Auth::user()->id)->get();
    	return view("business.product.list")->with("product",$product);
    }
    public function get_subcategory(Request $request){
        $subcategory=Product_subcategory::where("category_id",$_GET['category_id'])->where("status","0")->get();
        return view("admin.product.subcategory_list")->with("subcategory",$subcategory);
    }
    public function create(){
        $color=Color::all();
        $size=Size::all();
    	$category=Product_category::orderBy("id","desc")->where("status","0")->get();
    	$subcategory=Product_subcategory::orderBy("id","desc")->where("status","0")->get();
    	return view("business.product.create",compact("category","subcategory","color","size"));
    }
    public function store(Request $request){
    	$imgName=$request->file('image')->getClientOriginalName();
    	$imgUrl= "storage/products/".$imgName;
    	Storage::putFileAs('public/products/', $request->file('image'), $imgName);

    	$product= new Product;
        $product->name=$request->name;
        $product->business_id=Auth::user()->id;
        $product->slug=$request->slug;
        $product->price=$request->price;
        $product->is_sale=$request->is_sale;
        $product->sale_price=$request->sale_price;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->image=$imgUrl;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->additional_information=$request->additional_information;
        $product->shipping_return=$request->shipping_return;
        $product->meta_title=$request->meta_title;
        $product->meta_description=$request->meta_description;
        $product->meta_keyword=$request->meta_keyword;
        $save=$product->save();
        $product_id=$product->id;

        if($_POST['color']=="" || $_POST['color']== NULL ){
          $cc=count($_POST['color']);
          for($i=0;$i<$cc;$i++){
          $ii=count($_POST['size'][$i]);
            for($j=0;$j<$ii;$j++){
            DB::table('attributes')->insert(['product_id' => $product_id, 'color_id' =>$_POST['color'][$i],
                'size_id'=>$_POST['size'][$i][$j]  ]);            
            }
          }
        }
        if($save){
            
        if($request->hasFile('an_img')){
           $an_imgs=$_FILES["an_img"]["tmp_name"];
        for($i=0;$i<count($an_imgs);$i++){
           $imgName= $_FILES["an_img"]["name"][$i];
           $imgUrl= "storage/productimg/".$_FILES["an_img"]["name"][$i];
           Storage::putFileAs('public/productimg/', $_FILES["an_img"]["tmp_name"][$i], $imgName);
           $save=DB::table("productimages")->insert(['product_id' => $product_id, 'image' => $imgUrl]);
          }            
        }        
        $msg = array(
            'message' => 'Product Successfully saved', 
            'alert-type' => 'success' );
        }
        else{
            $msg = array(
            'message' => 'Something went wrong', 
            'alert-type' => 'danger'
        );
        }
    	return redirect(url('business/product/'))->with($msg);
    }
    public function edit($id){
    	$product=Product::find($id);
    	$category=Product_category::orderBy("id","desc")->where("status","0")->get();
    	$subcategory=Product_subcategory::orderBy("id","desc")->where("status","0")->get();
    	return view("business.product.edit",compact("category","subcategory","product"));
    }
    public function update(Request $request){
          if($request->hasFile('an_img')){
           $an_imgs=$_FILES["an_img"]["tmp_name"];
        for($i=0;$i<count($an_imgs);$i++){
           $imgName= $_FILES["an_img"]["name"][$i];
           $imgUrl= "storage/productimg/".$_FILES["an_img"]["name"][$i];
           Storage::putFileAs('public/productimg/', $_FILES["an_img"]["tmp_name"][$i], $imgName);
           $save=DB::table("productimages")->insert(['product_id' => $request->id, 'image' => $imgUrl]);
          }            
        }

        if($request->file('image')!=null){
        $imgName=$request->file('image')->getClientOriginalName();
        $imgUrl= "storage/products/".$imgName;
        Storage::putFileAs('public/products/', $request->file('image'), $imgName);

        $product=Product::find($request->id);
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->price=$request->price;
        $product->is_sale=$request->is_sale;
        $product->sale_price=$request->sale_price;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->image=$imgUrl;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->additional_information=$request->additional_information;
        $product->shipping_return=$request->shipping_return;
        $product->meta_title=$request->meta_title;
        $product->meta_description=$request->meta_description;
        $product->meta_keyword=$request->meta_keyword;
        $save=$product->save();
        if($save){
            $msg = array(
            'message' => 'Product Successfully saved', 
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
        
        $product=Product::find($request->id);
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->price=$request->price;
        $product->is_sale=$request->is_sale;
        $product->sale_price=$request->sale_price;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->additional_information=$request->additional_information;
        $product->shipping_return=$request->shipping_return;
        $product->meta_title=$request->meta_title;
        $product->meta_description=$request->meta_description;
        $product->meta_keyword=$request->meta_keyword;
        $save=$product->save();
        if($save){
            $msg = array(
            'message' => 'Product Successfully saved', 
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
    	return redirect(url('business/product/'))->with($msg);
    }
    public function delete($id){
    	$delete=Product::destroy($id);
    	if($delete){
    		$msg = array(
    		'message' => 'Product Successfully deleted', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url('business/product/'))->with($msg);
    }
}
