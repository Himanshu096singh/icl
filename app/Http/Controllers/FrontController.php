<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Product;
use App\Mail\ContactDetails;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Brand;
use DB;
use Mail;


class FrontController extends Controller
{
	public function index(){
		$meta = [
    		'title' => 'Latest Designer & Ethnic Ladies Kurtis Online by PCL India',
    		'keyword' => 'designer kurtis, cotton kurtis, kurti online',
    		'description' => 'Priya Chaudhary Label is online designer clothing store to buy Kurti/Kurta, tops, shirts, dresses, pants, palazzos, dupattas, pajama, kaftans & mask for Women'
    	];
        $collections = Brand::orderBy('name','ASC')->get();
        $blog = Blog::limit(3)->orderBy('id','Desc')->get();
    	return view('pages.home',compact('meta','blog','collections'));
	}
	public function blog(){
		$meta = [
    		'title' => 'Trending Updates & News About Latest Fashion Trends 2021',
    		'keyword' => 'latest updates, fashion trends, ethnic suits',
    		'description' => 'Get the latest updates & news from our trendings blogs on the fashion trends & best ethnic suits to buy online from websites like Amazon, Flipkart & Shien'
    	];
    	$blog = Blog::orderBy('id','DESC')->get();
    	return view('pages.blog',compact('meta','blog'));
	}

	public function about(){
		$meta = [
	    		'title' => "Best Women Fashion Designer in India | Priya Chaudhary Label",
	    		'keyword' => "Best fashion designer near me, ethnic wear, online store",
	    		'description' => "PCL India, an online store, is one of the best women fashion designers for ethnic wear to buy, offering Kurti of chanderi, chikankari, cotton & bandhani designs"
		  ];
    	return view('pages.about',compact('meta'));
	}


    public function cancellationsandreturns(){
        $meta = [
                'title' => "Cancellations & Returns",
                'keyword' => "Cancellations & Returns ",
                'description' => "Cancellations & Returns"
          ];
        return view('pages.cancellationsandreturns',compact('meta'));
    }
    public function terms(){
        $meta = [
                'title' => "Terms & Conditions",
                'keyword' => "Terms & Conditions",
                'description' => "Terms & Conditions"
          ];
        return view('pages.terms',compact('meta'));
    }

    public function exchangepolicy(){
        $meta = [
                'title' => "exchangepolicy",
                'keyword' => "exchangepolicy",
                'description' => "exchangepolicy"
          ];
        return view('pages.exchangepolicy',compact('meta'));
    }
    public function internationalordersbypcl(){
        $meta = [
                'title' => "International Orders by PCL | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.internationalordersbypcl',compact('meta'));
    }
    public function shippingpolicy(){
        $meta = [
                'title' => "Shipping Policy | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.shippingpolicy',compact('meta'));
    }
    public function paymentoptions(){
        $meta = [
                'title' => "Payment Options | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.paymentoptions',compact('meta'));
    }
    public function careers(){
        $meta = [
                'title' => "careers | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.careers',compact('meta'));
    }
    public function bulkorder(){
        $meta = [
                'title' => "Bulkorder | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.bulkorder',compact('meta'));
    }
    public function sellwithus(){
        $meta = [
                'title' => "Sellwithus | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.sellwithus',compact('meta'));
    }
    public function privacy_policy(){
        $meta = [
                'title' => "Privacy Policy | Priya Chaudhary",
                'keyword' => "Fashion, fruition, artisans, makeover ",
                'description' => "At Priya Chaudhary, we believe in giving fashion a new makeover every day. In essence, this would not have come to fruition had it not been for our artisan's ceaseless efforts."
          ];
        return view('pages.privacy_policy',compact('meta'));
    }


	public function contact(){
		$meta = [
	    		'title' => "Kurtis by PCL India | 9900553344, priyachaudharylabel@gmail.com",
	    		'keyword' => "best suits, women tops online, designer kurti",
	    		'description' => "Buy the best suits, Kurtis & leggings for women from PCL online store in Delhi. Contact: 9900553344, priyachaudharylabel@gmail.com for safe home delivery"
		  ];
    	return view('pages.contact',compact('meta'));
	}
	// public function shop(){
	// 	$meta = [
	//     		'title' => "Shop | Priya Chaudhary",
	//     		'keyword' => "Priya Chaudhary",
	//     		'description' => "Priya Chaudhary"
	// 	  ];
 //    	return view('pages.shop',compact('meta'));
	// }

	public function blogdetail($slug){
    	$blog = Blog::where('slug',$slug)->first();
        if($blog){
            $meta= [
                'title'=>$blog->metatitle,
                'description'=>$blog->metadescription,
                'keyword'=>$blog->metakeywords,
                ];
             return view('pages.blogdetail',compact('blog','meta'));
            }
        else {
            return abort(404);
        }
    }	

    public function contactsubmit(Request $request){
    	$data=array(
            "name" 		=>	$request->name,
            "subject" 	=>	$request->subject,
            "email" 	=>	$request->email,
            "message" 	=>	$request->message,
        );
        Mail::to('himanshu01eglobalsoft@gmail.com')->bcc(['akashe2globalsoft@gmail.com','ajayegss@gmail.com'])->queue(new ContactDetails($data));
   
        $contact=Contact::Create($request->all());
        if($contact){
           return "Thanks For Submit";
        }
        else {
         return "Something Went Wrong";
        }
    }

    public function submit_email(Request $request){
        $email = $request->email;
        $count = DB::table('subscribers')->where('email',$email)->count();
        if($count>0){
            $msg = array(
                'message' => 'This Email Already Submit', 
                'alert-type' => 'Warning'
             );
            return redirect()->back()->with($msg);
        }
        else {
            DB::table('subscribers')->insert([
                'email' => $email
            ]);
            $msg = array(
                'message' => 'Thanks for Subscribing us',
                 'alert-type' => 'success'
             );
            return redirect()->back()->with($msg);
        }
    }

    public function shop(){
        $meta = [
                'title' => "Shop | Priya Chaudhary",
                'keyword' => "Priya Chaudhary",
                'description' => "Priya Chaudhary"
          ];    
        $category_list=Product_category::where("status","0")->get();
        $max_price = DB::table('products')->max('price');
        // if(isset($_GET['color'])){
        //     $attr_c=DB::table("attributes")->where("color_id",$_GET['color'])->distinct("color_id")->count();
        //     if($attr_c>0){
        //     $attr=DB::table("attributes")->where("color_id",$_GET['color'])->distinct("color_id")->get();
        //     foreach ($attr as $item) {
        //         $prd=$item->product_id;
        //     }
        //     }else{
        //         $prd=0;
        //     }
        //     $products=Product::orderBy("id","DESC")->where("business_id",null)->where("id",$prd)->paginate(16);
        // }
        // else if(isset($_GET['size'])){
        //     $attr_c=DB::table("attributes")->where("size_id",$_GET['size'])->distinct("product_id")->count();
        //     if($attr_c>0){
        //     $attr=DB::table("attributes")->where("size_id",$_GET['size'])->distinct("product_id")->get();
        //      foreach ($attr as $item) {
        //         $prd=$item->product_id;
        //     }
        //     }else{
        //         $prd=0;
        //     }
        //     $products=Product::orderBy("id","DESC")->where("business_id",null)->where("id",$prd)->paginate(16);
        // }
        
        if(isset($_GET['category'])){
         $products=Product::orderBy("id","DESC")->where("business_id",null)->where("category_id",$_GET['category'])->paginate(16);   
        }
        else if(isset($_GET['price_range'])){
         $products=Product::orderBy("id","DESC")->where("business_id",null)->where("price","<=",$_GET['price_range'])->paginate(16);   
        }
        else if(isset($_GET['search'])){ // Search Code Start
        $subcategory=Product_subcategory::Where('name', 'like', '%'.$_GET['search'].'%')->where("status","0")->get();
        $subcats=array();
        foreach($subcategory as $subresults){
            $subcats[]=$subresults->id;            
        }
        $category=Product_category::Where('name', 'like', '%'.$_GET['search'].'%')->where("status","0")->get();
        $cats=array();
        foreach($category as $results){
            $cats[]=$results->id;
        }
        // echo count($subcats)."<br/>";
        // echo count($cats);
        // die;
        if(count($subcats)>0){
        $products=Product::orderBy("id","DESC")->where("business_id",null)->where('name', 'like', '%'.$_GET['search'].'%')->orWhereIn("subcategory_id",$subcats)->paginate(20);
          }
          else if(count($cats)>0){
         $products=Product::orderBy("id","DESC")->where("business_id",null)->whereIn("category_id",$cats)->paginate(20);
          }else{
            $products=Product::orderBy("id","DESC")->where("business_id",null)->where('name', 'like', '%'.$_GET['search'].'%')->paginate(20);
          }
        
        } 
         // Search Code End
        else{
            // $products=Product::orderBy("id","DESC")->where("business_id",null)->get();

// $products_list=Product::orderBy("id","DESC")->where("business_id",null)->get();
//             foreach ($products_list as $pr_cate) {
//                 $get_c=DB::table
//                 $pr_cate->category_id
//             }
            
          $products=Product::orderBy("id","DESC")->paginate(16);
            // $products=DB::table("products")->where("business_id",null)->paginate(2);
        }
        return view("pages.shop",compact("meta","products","category_list","max_price"));
    }


    public function product_details($slug){
        // $pro_id=base64_decode($id);
        $check_products=Product::where("slug",$slug)->count();
        
        if($check_products>0){
        $check_productsget=Product::where("slug",$slug)->first();
        $product_images = DB::table('productimages')->where('product_id',$check_productsget->id)->get();
        $meta = [
            'title'=>$check_productsget->meta_title,
            'description'=>$check_productsget->meta_description,
            'keyword'=>$check_productsget->meta_keyword,
        ];
        $product=Product::find($check_productsget->id);
        $title=$product->name;
        return view("pages.product_detail",compact("meta","product","title","product_images"));
        }else{
            return redirect(url('/'));
        }
    }
    public function set_session(Request $request)
    {
        Session::put('check_session','default');
        return Session::get('check_session');
    }
    public function sitemap()
    {
        $category = Product_category::all();
        return response()->view('sitemap',compact('category'))->header('Content-Type', 'xml');
    }




}
