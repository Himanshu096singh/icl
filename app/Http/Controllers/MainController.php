<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoContent;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactDetails;
use App\Models\Brand;
use App\Models\Review;
use App\Models\Product_category;
use App\Models\Admin\Product;
use App\Models\Admin\Blog;
use App\Models\Admin\Page;
use App\Models\Admin\Blogfaq;
use DB;
use View;
class MainController extends Controller
{
    public function __construct(){
        $fpage = Page::get();
        View::share(compact('fpage'));
    }
    public function index()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description,
                'type' => 'index'
            ];
        } else {
            $meta = [];
        }
        $collections = Brand::limit(2)->latest()->get();
        $latest_products = Product::with(['collection', 'category'])->latest()->limit(5)->get();
        $popular_products = Product::with(['collection', 'category'])->inRandomOrder()->limit(5)->get();
        $categories = Product_category::limit(6)->get();
        return view('home', compact('meta', 'collections', 'latest_products', 'popular_products','categories'));
    }
    public function collection()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description
            ];
        } else {
            $meta = [];
        }
        $collections = Brand::orderby('id', 'DESC')->get();
        return view('collection', compact('meta', 'collections'));
    }
    public function collection_detail($slug)
    {
        $collection = Brand::where('slug', $slug)->first();
        if($collection){
            $products = Product::where('brand_id',$collection->id)->where("deleted_at",null)->get();
                $meta = [
                    'title' => $collection->meta_title,
                    'keyword' => $collection->meta_keyword,
                    'description' => $collection->meta_description
                ];
                return view('collection_detail', compact('meta', 'collection','products'));
        } else {
            $category = Product_category::where('slug', $slug)->first();
            if($category){
                return $products = Product::where('category_id',$category->id)->where("deleted_at",null)->get();
                return view('collection_detail', compact('meta', 'collection','products'));
            } else {
                $page = Page::where('slug',$slug)->first();
                if($page){
                    return view('page',compact('page'));
                } else {
                    abort(404);     
                }
            }
        }
    }
    public function blogs()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description
            ];
        } else {
            $meta = [];
        }
        $blogs = Blog::latest()->get();
        return view('blog', compact('meta', 'blogs'));
    }
    public function blog_detail($slug)
    {
        $blog = Blog::with('faq')->where('slug', $slug)->first();
        if ($blog) {
            $meta = [
                'title' => $blog->meta_title,
                'keyword' => $blog->meta_keyword,
                'description' => $blog->meta_description,
                'type' => 'article'
            ];
            $latest = Blog::limit(5)->latest()->get();

            if($blog->products){
                $productlist = json_decode($blog->products);
                $product = Product::with(['collection','category'])->whereIn('id',$productlist)->get();
                return view('blog_detail', compact('meta','blog','latest','product'));
            } else {
                return view('blog_detail', compact('meta','blog','latest'));
            }
        } else {
            abort(404);
        }
    }
    public function about()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description,
                'type' => 'page'
            ];
        } else {
            $meta = [];
        }
        return view('about', compact('meta'));
    }
    public function noori()
    {
        $meta = [
                'title' => 'noori',
                'keyword' => 'noori',
                'description' => 'noori',
            ];
        return view('noori', compact('meta'));
    }
    public function faq()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description
            ];
        } else {
            $meta = [];
        }
        return view('faq', compact('meta'));
    }
    public function privacy_policy()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description
            ];
        } else {
            $meta = [];
        }
        return view('privacy_policy', compact('meta'));
    }
    public function terms_conditions()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description
            ];
        } else {
            $meta = [];
        }
        return view('terms_conditions', compact('meta'));
    }

    public function sitemap()
    {
        $collections = Brand::latest()->where('status','active')->get();
        $products = Product::with(['collection','category'])->get();
        $blogs = Blog::latest()->get();
        // return $productcategory = Product_category::with('brand')->orderby('id','desc')->get();
        // $category = Product_category::all();
        return response()->view('sitemap', compact('collections','products','blogs'))->header('Content-Type', 'xml');
    }

    public function imagesitemap(){

        $collections = Brand::with('product')->latest()->where('status','active')->get();
        $products = Product::with(['collection','category','images'])->get();
        $blogs = Blog::latest()->get();
        return response()->view('imagesitemap', compact('collections','products','blogs'))->header('Content-Type', 'xml');
    }
    

    public function contact()
    {
         
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        $contactinfo = DB::table('settings')->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description,
                'type' => 'page'
            ];
        } else {
            $meta = [];
        }
        return view('contact', compact('meta','contactinfo'));
    }
    
   
    
    public function contact_save(Request $request)
    {   
        
        try {
        $request->validate([
                'g-recaptcha-response' => 'required|recaptcha'
            ],
            [
                'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
                'g-recaptcha-response.required' => 'Please complete the captcha'
        ]);    


        $input = $request->all();
            
            Contact::Create($request->all());
            $data = array(
                "name" => $request->name,
                "subject" => $request->subject,
                "email" => $request->email,
                "phone" => $request->phone,
                "message" => $request->message,
            );
            Mail::to('himanshu01eglobalsoft@gmail.com')->bcc(["info@ikshitachoudhary.com"])->queue(new ContactDetails($data));
            // Mail::to('info@ikshitachoudhary.com')->bcc(["egsswork3@gmail.com","egsswork6@gmail.com"])->queue(new ContactDetails($data));
            $msg = [
                'message' => 'Thanks for your details. We will Contact you soon.',
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

    public function savereview(Request $request){

        $review = new Review;
        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->message = $request->message;
        $review->rating = $request->rating;
        $save = $review->save();

        if($save){
            $msg = array(
            'message' => 'Thanks for your Review.', 
            'alert-type' => 'success'
        );
        }
        else{
            $msg = array(
            'message' => 'Something went wrong', 
            'alert-type' => 'danger'
        );
        }
        return redirect()->back()->with($msg);
    }
}
