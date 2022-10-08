<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Blogfaq;
use App\Models\Admin\Blogcategory;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use DB;
 
class BlogController extends Controller
{
    use ImageTrait;
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	$blog=Blog::orderBy("id","DESC")->get();
    	return view("admin.blog.list")->with("blog",$blog);
    }
    public function create(){
        $category=Blogcategory::orderBy("id","DESC")->get();
        $products = Product::select(['id','name'])->latest()->get();
    	return view("admin.blog.create",compact('category','products'));
    }
    public function store(Request $request){
        $inputs = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug'  => 'required|string|max:255|unique:blogs,slug',
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

        $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/post');

    	$blog= new Blog;
    	$blog->title           = $request->title;
        $blog->metatitle       = $request->metatitle;
        $blog->metadescription = $request->metadescription;
        $blog->metakeywords    = $request->metakeywords;
        $blog->slug            = Str::slug($inputs['slug']);
    	$blog->image           = $imgUrl;
    	$blog->alt             = $request->alt;
        $blog->products        = json_encode($request->products);
    	$blog->description     = $request->description;
    	$save = $blog->save();

    	if($save){
    		$msg = array(
    		'message' => 'Blog Successfully added', 
    		'alert-type' => 'success'
    	);
    	}
    	else{
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url("admin/blog/"))->with($msg);
    }
    public function edit($id){
    	$blog=Blog::with('faq')->find($id);
        $products = Product::select(['id','name'])->latest()->get();
    	return view("admin.blog.edit",compact('blog','products'));
    }
    public function update(Request $request){

        $inputs = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug'  => 'required|string|max:255|unique:blogs,slug,'.$request->id,
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
        
        if ($request->file('image') != null) {
            if(File::exists(public_path($request->oldimage))) {
                unlink(public_path($request->oldimage));
            }
            $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/post');
        } else {
            $imgUrl = $request->oldimage;
        }

        $blog=Blog::find($request->id);
        $blog->title        =   $request->title;
        $blog->metatitle    =   $request->metatitle;
        $blog->metadescription =$request->metadescription;
        $blog->metakeywords =   $request->metakeywords;
        $blog->alt          =   $request->alt;
        $blog->slug         =   Str::slug($inputs['slug']);
        $blog->image        =   $imgUrl;
        $blog->category     =   $request->category;
        $blog->products     =  json_encode($request->products);
        $blog->description  =   $request->description;
        $blog->save();
    	
        $msg = array(
    		'message' => 'Blog Successfully updated', 
    		'alert-type' => 'success'
    	);
    	return redirect()->back()->with($msg);
    }
     public function savefaq(Request $req){
        $q = $req->question;
        $a = $req->answer;
        $pid = $req->proid;
        $check = Blogfaq::where('blog_id',$pid)->count();
        if($check > 0){
            Blogfaq::where('blog_id',$pid)->delete();
        }
        if(!empty($q)){
            $len = count($q);
            for($i=0;$i<$len;$i++){
                if(!empty($q[$i])){
                    Blogfaq::insert([
                    'question' => $q[$i],
                    'answer' => $a[$i],
                    'blog_id' => $pid
                    ]);    
                }
            }
            return redirect()->back()->with('message','Faq Added Successfully');
        }
        return redirect()->back();
    }
    public function delete($id){
        $post = Blog::with('faq')->findorFail($id);
        if($post->image){
        $image_path = public_path().'/'. $post->image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        } 
        $post->faq()->delete();
    	$delete=Blog::destroy($id);

    	if($delete){
    		$msg = array(
    		  'message' => 'Blog Successfully deleted', 
    		  'alert-type' => 'success'
    	   );
    	}  else {
    		$msg = array(
    		'message' => 'Something went wrong', 
    		'alert-type' => 'danger'
    	);
    	}
    	return redirect(url("admin/blog/"))->with($msg);
    }

}
