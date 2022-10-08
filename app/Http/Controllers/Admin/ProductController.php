<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\Imageposition;
use App\Models\Productpage;
use App\Models\Import;
use App\Models\Fabric;
use DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __Construct()
    {
        $this->middleware("admin");
    }
    public function index()
    {
        $product = Product::with(['collection', 'category'])->orderBy("id", "desc")->where("business_id", null)->get();
        $trash = Product::onlyTrashed()->where("business_id", null)->get();
        return view("admin.product.list", compact("product", "trash"));
    }
    public function product_restore($id)
    {
        $restore = Product::withTrashed()->where("id", $id)->restore();
        if ($restore) {
            $msg = [
                'message' => 'Product Successfully Restored',
                'alert-type' => 'success'
            ];
        } else {
            $msg = [
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            ];
        }
        return redirect()->back()->with($msg);
    }
    public function product_force_delete($id)
    {
        $delete = Product::where("id", $id)->forceDelete();
        if ($delete) {
            $msg = [
                'message' => 'Product is Permanently Deleted',
                'alert-type' => 'success'
            ];
        } else {
            $msg = [
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            ];
        }
        return redirect()->back()->with($msg);
    }
    public function update_image_order(Request $request)
    {
        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));

            foreach ($arr as $sortOrder => $id) {
                // $menu = Menu::find($id);
                // $menu->sort_id = $sortOrder;
                // $menu->save();
                $save = DB::table("productimages")->where('id', $id)->update(['sort_id' => $sortOrder]);
            }
            return ['success' => true, 'message' => 'Updated'];
        }
    }
    public function get_subcategory(Request $request)
    {
        $subcategory = Product_subcategory::where("category_id", $_GET['category_id'])->where("status", "0")->get();
        return view("admin.product.subcategory_list")->with("subcategory", $subcategory);
    }
    #---------------------------STARt-IMPORT-------------------------#
    public function add_import()
    {
        return view('admin.product.import');
    }
    public function save_import(Request $request)
    {
        $file_name = $request->file('product_list')->getClientOriginalName();
        $extension = $request->file('product_list')->getClientOriginalExtension();
        if ($extension == 'csv') {
            if ($request->hasFile('image')) {
                $an_imgs = $_FILES["image"]["tmp_name"];
                for ($i = 0; $i < count($an_imgs); $i++) {
                    $imgName = $_FILES["image"]["name"][$i];
                    $imgUrl = "storage/productimg/" . $_FILES["image"]["name"][$i];
                    Storage::putFileAs('public/products/', $_FILES["image"]["tmp_name"][$i], $imgName);
                }
            }


            $fileName = $request->file('product_list')->getClientOriginalName();
            $fileUrl = 'storage/app/public/products/csv/' . $fileName;
            Storage::putFileAs('public/products/csv/', $request->file('product_list'), $fileName);

            $import = new Import;
            $import->type = 'product_import';
            $import->url = $fileUrl;
            $import->save();
            $url_id = $import->id;

            $file = Import::find($url_id);
            $file_path = base_path($file->url);


            $customerArr = $this->csvToArray($file_path);
            echo "<pre>";
            $modified = array();
            for ($i = 0; $i < count($customerArr); $i++) {
                try {
                    if (!empty($customerArr[$i]['category_id']) && !empty($customerArr[$i]['subcategory_id']) && !empty($customerArr[$i]['brand_id']) && !empty($customerArr[$i]['fabric_id'])) {
                        $cat_id =  Product_category::where('name', 'like', '%' . $customerArr[$i]['category_id'] . '%')->first();
                        $subcat_id = Product_subcategory::where('name', 'like', '%' . $customerArr[$i]['subcategory_id'] . '%')->first();
                        $collection = Brand::where('name', 'like', '%' . $customerArr[$i]['brand_id'] . '%')->first();
                        $fabric = Fabric::where('name', 'like', '%' . $customerArr[$i]['fabric_id'] . '%')->first();
                        $modified[$i] = [
                            "category_id" => $cat_id->id,
                            "subcategory_id" => $subcat_id->id,
                            "brand_id" => $collection->id,
                            "fabric_id" => $fabric->id,
                        ];
                    } else {
                        $modified[$i] = [
                            "category_id" => 0,
                            "subcategory_id" => 0,
                            "brand_id" => 0,
                            "fabric_id" => 0,
                        ];
                        $msg = [
                            'message' => 'Please Fill all the columns of CSV file.',
                            'alert-type' => 'danger'
                        ];
                        return redirect()->back()->with($msg);
                    }


                    if ($customerArr[$i]['sale_price'] == 'NULL' || $customerArr[$i]['sale_price'] == NULL ||   $customerArr[$i]['sale_price'] == 0) {
                        $customerArr[$i]['sale_price'] = 0;
                        $customerArr[$i]['is_sale'] = '0';
                    } else {
                        $customerArr[$i]['is_sale'] = '1';
                    }

                    $customerArr[$i]['category_id'] = $modified[$i]['category_id'];
                    $customerArr[$i]['subcategory_id'] = $modified[$i]['subcategory_id'];
                    $customerArr[$i]['brand_id'] = $modified[$i]['brand_id'];
                    $customerArr[$i]['fabric_id'] = $modified[$i]['fabric_id'];
                    $customerArr[$i]['slug'] = Str::slug($customerArr[$i]['name'], '-');

                    if (!empty($customerArr[$i]['size'])) {
                        $customerArr[$i]['size'] = json_encode(explode(',', $customerArr[$i]['size']));
                    } else {
                        $customerArr[$i]['size'] = Null;
                    }

                    if (empty($customerArr[$i]['dupatta_length'])) {
                        $customerArr[$i]['dupatta_length'] = Null;
                    }
                    $customerArr[$i]['image'] = "storage/products/" . $customerArr[$i]['image'];

                    Product::Create($customerArr[$i]);
                    $msg = array(
                        'message' => 'Products Successfully imported',
                        'alert-type' => 'success'
                    );
                } catch (\Exception $e) {
                    $msg = array(
                        'message' => $e->getMessage(),
                        'alert-type' => 'danger'
                    );
                }
            }
            // dd($modified);
            // dd($customerArr);
        } else {
            $msg = array(
                'message' => 'Selected file should be CSV Type',
                'alert-type' => 'warning'
            );
        }
        return redirect('admin/product')->with($msg);
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

            // print_r($customerArr[$i]);
            Product::firstOrCreate($customerArr[$i]);
            // die;
            // User::firstOrCreate($customerArr[$i]);
        }
    }
    #---------------------------END-IMPORT-------------------------#
    public function import_list()
    {
        $imports = Import::orderBy('id', 'DESC')->get();
        return view("admin.product.import_list", compact("imports"));
    }



    public function create()
    {
        $color = Color::all();
        $size = Size::all();
        $fabrics = Fabric::all();
        $brand = Brand::orderBy("id", "desc")->where("status", "active")->get();
        $category = Product_category::orderBy("id", "desc")->where("status", "0")->get();
        $subcategory = Product_subcategory::orderBy("id", "desc")->where("status", "0")->get();
        return view("admin.product.create", compact("category", "subcategory", "color", "size", "brand", "fabrics"));
    }
    public function store(Request $request)
    {   
        $checksku = Product::where('sku',$request->sku)->count();
        if($checksku > 0)
        {
            $msg = array(
                'message' => 'This Sku Already Exits',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($msg);
        }
        
        $checkslug = Product::where('slug',$this->slugify($request->slug))->count();
        if($checkslug > 0)
        {
            $msg = array(
                'message' => 'This Slug Already Exits. Try Another Slug',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($msg);
        }
        
        
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $img_name = Str::random(25) . "." . $img->extension();
            $img_url = "storage/products/" . $img_name;
            Storage::putFileAs('public/products/', $img, $img_name);
        }
        
        $product = new Product;
        $product->name = $request->name;
        $product->slug = $this->slugify($request->slug);
        $product->stock = $request->stock;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->is_sale = $request->is_sale;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->fabric_id = $request->fabric_id;
        $product->brand_id = $request->brand_id;
        $product->image = $img_url;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->additional_information = $request->additional_information;
        // $product->shipping_return=$request->shipping_return;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->dupatta_length = $request->dupatta_length;
        $product->size = $request->size;
        $product->alt = $request->image_alt;
        $save = $product->save();
        $product_id = $product->id;
    
        if ($save) {
            if ($request->hasFile('an_img')) {
                $an_imgs = $_FILES["an_img"]["tmp_name"];
                for ($i = 0; $i < count($an_imgs); $i++) {
                    $imgName = uniqid() . '' . $_FILES["an_img"]["name"][$i];
                    $imgUrl = "storage/productimg/" . $imgName;
                    Storage::putFileAs('public/productimg/', $_FILES["an_img"]["tmp_name"][$i], $imgName);

                    $save = DB::table("productimages")->insert(['product_id' => $product_id, 'image' => $imgUrl]);
                }
            }
            $msg = array(
                'message' => 'Product Successfully saved',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('admin/product/'))->with($msg);
    }
    public function edit($id)
    {
        $color = Color::all();
        $size = Size::all();
        $fabrics = Fabric::all();
        $product = Product::find($id);
        $brand = Brand::orderBy("id", "desc")->where("status", "active")->get();
        $category = Product_category::orderBy("id", "desc")->where("status", "0")->get();
        $subcategory = Product_subcategory::orderBy("id", "desc")->where("status", "0")->get();
        $faq = DB::table('productfaqs')->where('product_id',$id)->get();
        return view("admin.product.edit", compact("category", "subcategory", "product", "color", "size", "brand", "fabrics",'faq'));
    }
    public function update(Request $request)
    {
        
        $checksku = Product::where('id', '!=' , $request->id)->where('sku', $request->sku)->count();
        if($checksku > 0)
        {
            $msg = array(
                'message' => 'This Sku Is Exists in other Record, Please Entered Another Sku',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($msg);
        }
        
      
        if ($request->hasFile('an_img')) {
            $an_imgs = $_FILES["an_img"]["tmp_name"];
            for ($i = 0; $i < count($an_imgs); $i++) {
                $imgName = uniqid() . '' . $_FILES["an_img"]["name"][$i];
                $imgUrl = "storage/productimg/" . $imgName;
                Storage::putFileAs('public/productimg/', $_FILES["an_img"]["tmp_name"][$i], $imgName);
                $save = DB::table("productimages")->insert(['product_id' => $request->id, 'image' => $imgUrl]);
            }
        }

        if ($request->file('image') != null) {

            $imgName = $request->file('image')->getClientOriginalName();
            $file = pathinfo($imgName, PATHINFO_FILENAME);
            $ext = pathinfo($imgName, PATHINFO_EXTENSION);
            $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
            $imgName = $slugimg . '.' . $ext;

            $imgUrl = "storage/products/" . strtolower($imgName);
            Storage::putFileAs('public/products/', $request->file('image'), $imgName);


            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->slug = $this->slugify($request->slug);
            $product->stock = $request->stock;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->is_sale = $request->is_sale;
            $product->sale_price = $request->sale_price;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->fabric_id = $request->fabric_id;
            $product->image = $imgUrl;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->additional_information = $request->additional_information;
            $product->shipping_return = $request->shipping_return;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keyword = $request->meta_keyword;
            $product->dupatta_length = $request->dupatta_length;
            $product->alt = $request->image_alt;
            if ($request->size != null) {
                $product->size = $request->size;
            }
            $save = $product->save();
            if ($save) {
                $msg = array(
                    'message' => 'Product Successfully saved',
                    'alert-type' => 'success'
                );
            } else {
                $msg = array(
                    'message' => 'Something went wrong',
                    'alert-type' => 'danger'
                );
            }
        } else {
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->slug = $this->slugify($request->slug);
            $product->stock = $request->stock;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->is_sale = $request->is_sale;
            $product->sale_price = $request->sale_price;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->fabric_id = $request->fabric_id;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->additional_information = $request->additional_information;
            $product->shipping_return = $request->shipping_return;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keyword = $request->meta_keyword;
            $product->dupatta_length = $request->dupatta_length;
            $product->alt = $request->image_alt;
            if ($request->size != null) {
                $product->size = $request->size;
            }
            $save = $product->save();
            if ($save) {
                $msg = array(
                    'message' => 'Product Successfully saved',
                    'alert-type' => 'success'
                );
            } else {
                $msg = array(
                    'message' => 'Something went wrong',
                    'alert-type' => 'danger'
                );
            }
        }
        return redirect()->back()->with($msg);
    }
    public function savefaq(Request $req){
        $q = $req->question;
        $a = $req->answer;
        $pid = $req->proid;
        $check = DB::table('productfaqs')->where('product_id',$pid)->count();
        if($check > 0){
            DB::table('productfaqs')->where('product_id',$pid)->delete();
        }
        if(!empty($q)){
            $len = count($q);
            for($i=0;$i<$len;$i++){
                if(!empty($q[$i])){
                    DB::table('productfaqs')->insert([
                    'question' => $q[$i],
                    'answer' => $a[$i],
                    'product_id' => $pid
                    ]);    
                }
            }
            return redirect()->back()->with('message','Faq Added Successfully');
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $delete = Product::destroy($id);
        if ($delete) {
            $msg = array(
                'message' => 'Product is Move to Trash',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('admin/product/'))->with($msg);
    }
    public function delete_img($id)
    {
        DB::table('productimages')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'Image Succefully Deleted');
    }

    public function image()
    {
        $position = Imageposition::all();
        $image = Productpage::orderBy('id', 'ASC')->get();
        return view("admin.product.image", compact('position', 'image'));
    }
    public function image_edit($id)
    {
        $position = Imageposition::all();
        $image = Productpage::find($id);
        return view("admin.product.image_edit", compact('position', 'image'));
    }
    public function image_save(Request $request)
    {
        $imgName = $request->file('image')->getClientOriginalName();
        $imgUrl = "storage/products/page/" . $imgName;
        Storage::putFileAs('public/products/page/', $request->file('image'), $imgName);

        $image = new Productpage;
        $image->category_id = $request->category_id;
        $image->heading = $request->heading;
        $image->url = $request->url;
        $image->description = $request->description;
        $image->image = $imgUrl;
        $image->position = $request->position;
        $image->save();

        $msg = array(
            'message' => 'Image Successfully uploaded',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($msg);
    }
    public function image_update(Request $request)
    {

        if ($request->file('image') != null) {

            $imgName = $request->file('image')->getClientOriginalName();
            $imgUrl = "storage/products/page/" . $imgName;
            Storage::putFileAs('public/products/page/', $request->file('image'), $imgName);

            $image = Productpage::find($request->id);
            $image->category_id = $request->category_id;
            $image->heading = $request->heading;
            $image->url = $request->url;
            $image->description = $request->description;
            $image->image = $imgUrl;
            $image->position = $request->position;
            $image->save();

            $msg = array(
                'message' => 'Image Successfully uploaded',
                'alert-type' => 'success'
            );
        } else {
            $image = Productpage::find($request->id);
            $image->category_id = $request->category_id;
            $image->heading = $request->heading;
            $image->url = $request->url;
            $image->description = $request->description;
            $image->position = $request->position;
            $image->save();

            $msg = array(
                'message' => 'Image Successfully uploaded',
                'alert-type' => 'success'
            );
        }
        return redirect(url('admin/product/image'))->with($msg);
    }
    public function image_delete($id)
    {
        $delete = Productpage::destroy($id);
        if ($delete) {
            $msg = array(
                'message' => 'Image Successfully uploaded',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('admin/product/image'))->with($msg);
    }
    public function slugify($text)
    {
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
    public function update_status(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $save = $product->save();
        if ($save) {
            $msg = [
                'message' => 'Product Status Successfully updated',
                'alert-type' => 'success'
            ];
        } else {
            $msg = [
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            ];
        }
        return redirect()->back()->with($msg);
    }
    public function get_category()
    {
        $categories = Product_category::where('brand_id', $_GET['brand_id'])->get();
        return view("admin.product.load_category")->with("categories", $categories);
    }
}
