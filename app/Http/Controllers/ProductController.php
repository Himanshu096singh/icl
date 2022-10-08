<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Laravelmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Imageposition;
use App\Models\Categoryimage;
use App\Models\Categorypage;

class ProductController extends Controller
{
  public function __Construct()
  {
    $this->middleware("admin");
  }
  public function index()
  {
    return view("admin.product.list");
  }
  public function upload_images_cate(Request $request)
  {

    $imgName = $request->file('image')->getClientOriginalName();
    $imgUrl = "storage/maincategory/images/" . $imgName;
    Storage::putFileAs('public/maincategory/images/', $request->file('image'), $imgName);

    $img = new Categorypage;
    $img->heading = $request->heading;
    $img->url = $request->url;
    $img->description = $request->description;
    $img->image = $imgUrl;
    $img->position = $request->position;
    $img->save();


    $msg = array(
      'message' => 'Image Succefully Uploaded',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($msg);
  }
  public function edit_image_cate($id)
  {
    $img = Categorypage::find($id);
    $position = Imageposition::all();
    return view("admin.product.productcategory_imgedit", compact('img', 'position'));
  }
  public function update_images_cate(Request $request)
  {
    if ($request->file('image') != null) {
      $imgName = $request->file('image')->getClientOriginalName();
      $imgUrl = "storage/maincategory/images/" . $imgName;
      Storage::putFileAs('public/maincategory/images/', $request->file('image'), $imgName);
      $img = Categorypage::find($request->id);
      $img->heading = $request->heading;
      $img->url = $request->url;
      $img->description = $request->description;
      $img->image = $imgUrl;
      $img->position = $request->position;
      $img->save();
    } else {
      $img = Categorypage::find($request->id);
      $img->heading = $request->heading;
      $img->description = $request->description;
      $img->url = $request->url;
      $img->position = $request->position;
      $img->save();
    }
    $msg = array(
      'message' => 'Image Succefully Uploaded',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($msg);
  }
  public function delete_image_cate($id)
  {
    $delete = Categorypage::destroy($id);
    if ($delete) {
      $msg = array(
        'message' => 'Image Succefully Deleted',
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


  public function upload_images(Request $request)
  {
    // return count($_FILES['image']['tmp_name']);
    // $an_imgs=$_FILES["image"]["tmp_name"];
    // for($i=0;$i<count($an_imgs);$i++){
    //    $imgName= $_FILES["image"]["name"][$i];
    //    $imgUrl= "storage/category/images/".$_FILES["image"]["name"][$i];
    //    Storage::putFileAs('public/category/images/', $_FILES["image"]["tmp_name"][$i], $imgName);
    //    $save=DB::table("categoryimages")->insert(['category_id' => $request->category_id,'heading'=>$_POST['heading'][$i],'description'=>$_POST['description'][$i], 'image' => $imgUrl,'position'=>$request->position]);
    //   }
    $imgName = $request->file('image')->getClientOriginalName();
    $imgUrl = "storage/category/images/" . $imgName;
    Storage::putFileAs('public/category/images/', $request->file('image'), $imgName);

    $img = new Categoryimage;
    $img->category_id = $request->category_id;
    $img->heading = $request->heading;
    $img->url = $request->url;
    $img->description = $request->description;
    $img->image = $imgUrl;
    $img->position = $request->position;
    $img->save();


    $msg = array(
      'message' => 'Image Succefully Uploaded',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($msg);
  }
  public function edit_image($id)
  {
    $img = Categoryimage::find($id);
    $position = Imageposition::all();
    return view("admin.product.productsubcategory_imgedit", compact('img', 'position'));
  }
  public function update_images(Request $request)
  {
    if ($request->file('image') != null) {
      $imgName = $request->file('image')->getClientOriginalName();
      $imgUrl = "storage/category/images/" . $imgName;
      Storage::putFileAs('public/category/images/', $request->file('image'), $imgName);

      $img = Categoryimage::find($request->id);
      $img->heading = $request->heading;
      $img->url = $request->url;
      $img->description = $request->description;
      $img->image = $imgUrl;
      $img->position = $request->position;
      $img->save();
    } else {
      $img = Categoryimage::find($request->id);
      $img->heading = $request->heading;
      $img->url = $request->url;
      $img->description = $request->description;
      $img->position = $request->position;
      $img->save();
    }
    $msg = array(
      'message' => 'Image Succefully Updated',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($msg);
  }
  public function delete_image($id)
  {
    $delete = Categoryimage::destroy($id);
    if ($delete) {
      $msg = array(
        'message' => 'Image Succefully Deleted',
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
  public function main_category()
  {
    return view("admin.product.allcategory");
  }

  public function add_product_subcategory(Request $req)
  {
    $id     = $req->id;
    $name   = $req->name;
    $slugs  = preg_replace('~^[^a-zA-Z0-9]+|[^a-zA-Z0-9]+$~', '', $name);
    $finalslug  = strtolower(preg_replace('~[^a-zA-Z0-9]+~', '-', $slugs));
    $w = Product_subcategory::insert([
      'category_id' =>    $id,
      'name'        =>    $name,
      'slug'        =>    $finalslug,
      // 'status'   =>    'active' 
    ]);
    return redirect()->back()->withInput()->with('message', 'Succefully Insert Sub Category.');
  }

  public function delete_product_subcategory($id)
  {
    $del = Product_subcategory::destroy($id);
    return redirect()->back()->withInput()->with('message', 'Succefully Delete.');
  }
  public function category_status(Request $request)
  {
    $category = Product_category::find($request->id);
    $category->status = $request->status;
    $category->save();
    return 1;
  }
  public function category_status_sub(Request $request)
  {
    $category = Product_subcategory::find($request->id);
    $category->status = $request->status;
    $category->save();
    return 1;
  }
  public function subcategory_status(Request $request)
  {
  }
  public function productsubcategory()
  {


    return view('admin/product/product_subcategory');
  }
  public function view_productlist()
  {
    return view('admin/product/view_productlist');
  }
  public function add_product()
  {
    $category = Product_category::orderby('id', 'desc')->get();
    return view('admin/product/add_product')->with('category', $category);
  }
  public function change_popular(Request $request)
  {
    $category = Product_category::find($request->id);
    $category->is_popular = $request->status;
    $category->save();
    return 1;
  }
  public function editsubcategory(Request $request)
  {
    $category = Product_subcategory::find($request->id);
    $data = array(
      'id' => $category->id,
      'name' => $category->name,
      'name' => $category->name,
      'meta_title' => $category->meta_title,
      'meta_keyword' => $category->meta_keyword,
      'meta_description' => $category->meta_description,
    );
    return json_encode($data);
  }
  public function updatesubcategory(Request $req)
  {

    $subcategory = Product_subcategory::find($req->id);
    $slugs  = preg_replace('~^[^a-zA-Z0-9]+|[^a-zA-Z0-9]+$~', '', $req->name);
    $finalslug  = strtolower(preg_replace('~[^a-zA-Z0-9]+~', '-', $slugs));
    $subcategory->name = $req->name;
    $subcategory->slug = $finalslug;
    $subcategory->meta_title = $req->meta_title;
    $subcategory->meta_keyword = $req->meta_keyword;
    $subcategory->meta_description = $req->meta_description;
    $subcategory->save();


    return redirect()->back()->withInput()->with('message', 'Sub Category Succefully updated.');
  }





  public function mail()
  {
    $name = 'Himanshu';
    $message = 'Hello';
    Mail::to('himanshu01eglobalsoft@gmail.com')->send(new laravelmail($name));

    return 'Email sent Successfully';
  }
}
