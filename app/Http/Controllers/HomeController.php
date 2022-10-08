<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use App\Models\Product_subcategory;
use App\Models\Product_category;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Size;
use App\Models\Contact;
use App\Models\Admin\Product;
use App\Models\Admin\Blog;
use App\Models\Admin\Blogcategory;
use App\Models\Offerbannerone;
use App\Models\Businessuser;
use App\Models\Businesscategory;
use App\Models\Categoryimage;
use App\Models\Newsletter;
use App\Mail\NewsletterSubscribe;
use App\Mail\OrderConfirm;
use App\Mail\Categorypage;
use App\Mail\ContactDetails;
use App\Models\Invoice;
use App\Models\Billing;
use App\Models\Admin\Setting;
use App\User;
use PDF;
use App\Classes\PriceClass;
use App\Libraries\Paypal\Paypal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $offerbanner = Offerbannerone::orderBy("id", "DESC")->get();
        $banner = DB::table("banner")->orderBy("id", "DESC")->get();
        $popular_category = Product_category::where("status", "0")->where("is_popular", "1")->orderBy("id", "DESC")->get();
        $category_list = Product_category::where("status", "0")->orderBy("id", "DESC")->get();
        $new_arrivals = Product::where("business_id", null)->orderBy("id", "DESC")->limit(10)->get();
        return view('home', compact("banner", "popular_category", "new_arrivals", "offerbanner", "category_list"));
    }
    public function about()
    {
        return view("about");
    }
    public function donation()
    {
        return view("donation");
    }
    public function career()
    {
        return view("career");
    }
    public function sitemap()
    {
        $category = Product_category::orderBy('id', 'DESC')->where("status", "0")->get();
        return view("sitemap")->with('category', $category);
    }
    public function privacy_policy()
    {
        return view("privacy_policy");
    }

    public function shop()
    {
        $color = Color::all();
        $size = Size::all();
        $category_list = Product_category::where("status", "0")->get();
        $max_price = DB::table('products')->max('price');
        if (isset($_GET['color'])) {
            $attr_c = DB::table("attributes")->where("color_id", $_GET['color'])->distinct("color_id")->count();
            if ($attr_c > 0) {
                $attr = DB::table("attributes")->where("color_id", $_GET['color'])->distinct("color_id")->get();
                foreach ($attr as $item) {
                    $prd = $item->product_id;
                }
            } else {
                $prd = 0;
            }
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("id", $prd)->paginate(16);
        } else if (isset($_GET['size'])) {
            $attr_c = DB::table("attributes")->where("size_id", $_GET['size'])->distinct("product_id")->count();
            if ($attr_c > 0) {
                $attr = DB::table("attributes")->where("size_id", $_GET['size'])->distinct("product_id")->get();
                foreach ($attr as $item) {
                    $prd = $item->product_id;
                }
            } else {
                $prd = 0;
            }
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("id", $prd)->paginate(16);
        } else if (isset($_GET['category'])) {
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("category_id", $_GET['category'])->paginate(16);
        } else if (isset($_GET['price_range'])) {
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("price", "<=", $_GET['price_range'])->paginate(16);
        } else if (isset($_GET['search'])) { // Search Code Start
            $subcategory = Product_subcategory::Where('name', 'like', '%' . $_GET['search'] . '%')->where("status", "0")->get();
            $subcats = array();
            foreach ($subcategory as $subresults) {
                $subcats[] = $subresults->id;
            }
            $category = Product_category::Where('name', 'like', '%' . $_GET['search'] . '%')->where("status", "0")->get();
            $cats = array();
            foreach ($category as $results) {
                $cats[] = $results->id;
            }
            // echo count($subcats)."<br/>";
            // echo count($cats);
            // die;
            if (count($subcats) > 0) {
                $products = Product::orderBy("id", "DESC")->where("business_id", null)->where('name', 'like', '%' . $_GET['search'] . '%')->orWhereIn("subcategory_id", $subcats)->paginate(20);
            } else if (count($cats) > 0) {
                $products = Product::orderBy("id", "DESC")->where("business_id", null)->whereIn("category_id", $cats)->paginate(20);
            } else {
                $products = Product::orderBy("id", "DESC")->where("business_id", null)->where('name', 'like', '%' . $_GET['search'] . '%')->paginate(20);
            }
        }
        // Search Code End
        else {
            // $products=Product::orderBy("id","DESC")->where("business_id",null)->get();

            // $products_list=Product::orderBy("id","DESC")->where("business_id",null)->get();
            //             foreach ($products_list as $pr_cate) {
            //                 $get_c=DB::table
            //                 $pr_cate->category_id
            //             }

            $products = Product::orderBy("id", "DESC")->where("business_id", null)->paginate(16);
            // $products=DB::table("products")->where("business_id",null)->paginate(2);
        }
        return view("product_shop", compact("products", "category_list", "size", "color", "max_price"));
    }
    public function products_list()
    {
        $products = Product::orderBy("id", "DESC")->where("business_id", null)->get();
        return view("product")->with("products", $products);
    }
    public function get_sizelist(Request $request)
    {
        $color_id = $request->color;
        $attr = Attribute::where("color_id", $color_id)->get();
        return view("attr_size")->with("attr", $attr);
    }

    public function products_list_filtered($cat, $sub)
    {
        $color = Color::all();
        $size = Size::all();
        $category_list = Product_category::where("status", "0")->get();
        $category = Product_category::where("slug", $cat)->first();
        $subcategory = Product_subcategory::where("slug", $sub)->first();

        if (isset($_GET['color'])) {
            $attr_c = DB::table("attributes")->where("color_id", $_GET['color'])->distinct("color_id")->count();
            if ($attr_c > 0) {
                $attr = DB::table("attributes")->where("color_id", $_GET['color'])->distinct("color_id")->get();
                foreach ($attr as $item) {
                    $prd = $item->product_id;
                }
            } else {
                $prd = 0;
            }
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("id", $prd)->get();
        } else if (isset($_GET['size'])) {
            $attr_c = DB::table("attributes")->where("size_id", $_GET['size'])->distinct("product_id")->count();
            if ($attr_c > 0) {
                $attr = DB::table("attributes")->where("size_id", $_GET['size'])->distinct("product_id")->get();
                foreach ($attr as $item) {
                    $prd = $item->product_id;
                }
            } else {
                $prd = 0;
            }
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("id", $prd)->get();
        } else if (isset($_GET['category'])) {
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("category_id", $_GET['category'])->where("subcategory_id", $subcategory->id)->get();
        } else if (isset($_GET['price_range'])) {
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("category_id", $category->id)->where("subcategory_id", $subcategory->id)->where("price", "<=", $_GET['price_range'])->get();
        } else {
            $products = Product::orderBy("id", "DESC")->where("business_id", null)->where("category_id", $category->id)->where("subcategory_id", $subcategory->id)->get();
        }
        $max_price = DB::table('products')->max('price');
        $title = $category->name . " > " . $subcategory->name;
        return view("product", compact("products", "category", "subcategory", "category_list", "size", "color", "max_price", "title"));
    }

    public function product_details($slug, $id)
    {
        $pro_id = base64_decode($id);
        $check_products = Product::where("id", $pro_id)->where("business_id", null)->count();
        if ($check_products > 0) {
            $product = Product::find($pro_id);
            $title = $product->name;
            return view("product_detail", compact("product", "title"));
        } else {
            return redirect(url('/'));
        }
    }
    public function category_list()
    {
        // $product_list=Product
        $category = Product_category::where("status", "0")->orderBy("id", "desc")->get();
        return view("category")->with("category", $category);
    }
    public function subcategory_list($slug, $id)
    {
        $cat_id = base64_decode($id);
        $subcategory = Product_subcategory::where("category_id", $cat_id)->where("status", "0")->orderBy("id", "desc")->get();
        $category = Product_category::find($cat_id);
        $title = $category->name;
        return view("subcategory", compact("subcategory", "category", "cat_id", "title"));
    }


    public function multi_dim()
    {
        return $this->slugify('The 5 Days Trip to Havana On Exclusive Package');
        $data = [array(

            'Red' => ['M', 'L', 'XL', 'XXL'],
            'Black' => ['L', 'XL', 'XXL'],
            'White' => ['S', 'M', 'XXL'],
            'Green' => ['S', 'M', 'L']
        )];

        $data = array(
            'order_id' => "ORD" . rand(1111, 9999),
            'total_qty' => 1,
            'sub_total' => 7.50,
            'shipping' => 1.2,
            'tax' => 1.3,
            'total' => 10
        );

        $paypal = new Paypal();
        // return $paypal->payNow($data);

        $json = array('order_id' => '132456', 'created_at' => '2020-12-05 10:11:00 am');
        echo "<pre>";
        print_r($json);
    }
    public function customer_login()
    {
        $meta = [
            'title' => "Shop | Priya Chaudhary",
            'keyword' => "Priya Chaudhary",
            'description' => "Priya Chaudhary"
        ];
        return view("customerlogin")->with('meta', $meta);
    }
    public function customer_frogotpassword()
    {
        $meta = [
            'title' => "Shop | Priya Chaudhary",
            'keyword' => "Priya Chaudhary",
            'description' => "Priya Chaudhary"
        ];
        return view("customerfrogotpassword")->with('meta', $meta);
    }
    public function customer_signup()
    {
        $meta = [
            'title' => "Shop | Priya Chaudhary",
            'keyword' => "Priya Chaudhary",
            'description' => "Priya Chaudhary"
        ];
        return view("customersignup")->with('meta', $meta);
    }
    public function business_login()
    {
        return view("business_login");
    }
    public function business_frogotpassword()
    {
        return view("business_frogotpassword");
    }
    public function business_signup()
    {
        $business_types = Businesscategory::all();
        return view("business_signup")->with("business_types", $business_types);
    }
    public function blogs()
    {
        $blogcategory = Blogcategory::orderBy("id", "DESC")->get();
        $blogs = Blog::orderBy("id", "DESC")->get();
        return view("blog", compact("blogs", "blogcategory"));
    }
    public function blog_detail($slug)
    {
        $blogcategory = Blogcategory::orderBy("id", "DESC")->get();
        $blog = Blog::where("slug", $slug)->first();
        $title = $blog->title;
        $blogs = Blog::orderBy("id", "DESC")->get();
        return view("blog_detail", compact("blogs", "blog", "blogcategory", "title"));
    }
    public function contact()
    {
        return view("contact");
    }
    public function contact_save(Request $request)
    {
        $data = array(
            "name" => $request->name,
            "subject" => $request->subject,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
        );
        Mail::to("info@shopunity.com")
            ->bcc(['egsswork6@gmail.com', 'egsswork3@gmail.com'])
            ->queue(new ContactDetails($data));

        $contact = Contact::Create($request->all());
        if ($contact) {
            $msg = array(
                'message' => 'Contact Successfully saved',
                'alert-type' => 'success'
            );
        }
        return redirect(url('contact'))->with($msg);
    }
    public function product_preview(Request $request)
    {
        $product = Product::find($request->product_id);
        $product_images = DB::table('productimages')->where('product_id', $product->id)->get();
        $data = array(
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->price,
            'description' => $product->short_description,
            'sizes' => $product->size,
            'images' => $product_images
        );
        return json_encode($data);
    }
    public function business_register(Request $request)
    {
        $save = DB::table("users")->insert(['name' => $request->name, 'business_name' => $request->business_name, 'phone' => $request->phone, 'email' => $request->business_email, 'password' => Hash::make($request->password), 'role' => 2]);
        $user_id = DB::getPdo()->lastInsertId();
        $businessuser = new Businessuser;
        $businessuser->user_id = $user_id;
        $businessuser->name = $request->name;
        $businessuser->business_email = $request->business_email;
        $businessuser->business_name = $request->business_name;
        $businessuser->business_type = $request->business_type;
        $businessuser->phone = $request->phone;
        $businessuser->password = Hash::make($request->password);
        $businessuser->address1 = $request->address1;
        $businessuser->address2 = $request->address2;
        $businessuser->city = $request->city;
        $businessuser->state = $request->state;
        $businessuser->zip_code = $request->zip_code;
        $businessuser->country = $request->country;
        $register = $businessuser->save();
        if ($register) {
            $msg = array(
                'message' => 'Your Business Successfully regsiter to us',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('/'))->with($msg);
    }
    public function save_newsletter(Request $request)
    {
        $save = Newsletter::Create($request->all());
        $msg = array(
            'message' => 'Thanks for Subscribe',
            'alert-type' => 'success'
        );
        // Mail::to('eglobalstarters@gmail.com')->send(new OrderConfirm($name));
        Mail::to($request->email)->send(new NewsletterSubscribe());
        return redirect()->back()->with($msg);
    }
    public function validate_businessname(Request $request)
    {
        return $check = Businessuser::where("business_name", $request->business_name)->count();
    }















    public function get_subcategory(Request $request)
    {
        $subcategory = Product_subcategory::where("category_id", $_GET['category_id'])->where("status", "0")->get();
        return view("admin.product.subcategory_list")->with("subcategory", $subcategory);
    }
    public function cart_page()
    {
        return view("product");
    }
    public function get_cart()
    {
        $value = Cookie::get('name');
        return $value;
    }
    public function emailtest()
    {
        $name = "John Wick";
        Mail::to('eglobalstarters@gmail.com')->send(new OrderConfirm($name));
        return 'Email Sent Successfully';
    }
    public function view_invoice($id)
    {
        $order_id = base64_decode($id);
        $check_invoice = Invoice::where("order_id", $order_id)->count();
        if ($check_invoice > 0) {
            $invoice = Invoice::where("order_id", $order_id)->first();
            $order = Order::where("order_id", $order_id)->first();
            $settings = Setting::first();
            $user = User::find($invoice->user_id);
            $billing = Billing::where("order_id", $order_id)->first();
            $pdf = PDF::loadView('myPDF', compact("invoice", "settings", "user", "billing", "order"));
            // return $pdf->download("INV".sprintf("%08d", $invoice->id).'.pdf');
            return $pdf->output();
        } else {
            return redirect()->back();
        }
    }
    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
    public function importCsv()
    {
        $file = public_path('csv_files/products.csv');
        $customerArr = $this->csvToArray($file);
        echo "<pre>";
        for ($i = 0; $i < count($customerArr); $i++) {
            $cat_id = $get_category = Product_category::where('name', $customerArr[$i]['category_id'])->first();
            $subcat_id = $get_category = Product_subcategory::where('name', $customerArr[$i]['subcategory_id'])->first();
            $modified = array("category_id" => $cat_id->id, "subcategory_id" => $subcat_id->id);
            // print_r($modified);
            if ($customerArr[$i]['business_id'] == 'NULL' || $customerArr[$i]['business_id'] == NULL) {
                $customerArr[$i]['business_id'] = NULL;
            }
            if ($customerArr[$i]['commission_price'] == 'NULL' || $customerArr[$i]['commission_price'] == NULL) {
                $customerArr[$i]['commission_price'] = 0;
            }
            if ($customerArr[$i]['deleted_at'] == 'NULL' || $customerArr[$i]['deleted_at'] == NULL) {
                $customerArr[$i]['deleted_at'] = NULL;
            }

            $customerArr[$i]['category_id'] = $modified['category_id'];
            $customerArr[$i]['subcategory_id'] = $modified['subcategory_id'];
            $customerArr[$i]['created_at'] = date('Y-m-d h:i:s', strtotime($customerArr[$i]['created_at']));
            $customerArr[$i]['updated_at'] = date('Y-m-d h:i:s', strtotime($customerArr[$i]['updated_at']));

            print_r($customerArr[$i]);
            Product::firstOrCreate($customerArr[$i]);
            die;
            // User::firstOrCreate($customerArr[$i]);
        }
    }
    public function slugify($text)
    {
        // $text="PICKING THE RIGHT LOCATION FOR YOUR COMMERCIAL CONSTRUCTION";
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
