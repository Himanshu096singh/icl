<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Page;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use DB;
use View;
class ShopController extends Controller
{
    public function __construct(){
        $fpage = Page::get();
        View::share(compact('fpage'));
    }
    public function index($slug1, $slug2)
    {
        $category = Product_category::where('slug', $slug1)->first();
        if ($category) {
              $subcategory = Product_subcategory::where('slug', $slug2)->first();
            if ($subcategory) {
                if (isset($_GET['size'])) {
                    $products = Product::where('size', 'like', '%"' . $_GET['size'] . '"%')->where('category_id', $category->id)->get();
                } else if (isset($_GET['price_range'])) {
                    $products = Product::where('price', '<=', $_GET['price_range'])
                        ->where('category_id', $category->id)
                        ->get();
                } else if (isset($_GET['sort_by']) && $_GET['sort_by'] != null) {
                    if ($_GET['sort_by'] == 'high_to_low') {
                        $sort = 'DESC';
                    } elseif ($_GET['sort_by'] == 'low_to_high') {
                        $sort = 'ASC';
                    } else {
                        $sort = 'ASC';
                    }
                    $products = Product::orderBy('price', $sort)
                        ->where('category_id', $category->id)
                        ->get();
                } else {
                   $products = Product::where('category_id',$category->id)->where('subcategory_id', $subcategory->id)->latest()->get();
                }
                $colors = Color::all();
                $max_price = Product::max('price');
                $sizes = Size::all();
                $category_list = Product_category::orderBy('name', 'ASC')->get();
                $collections = Brand::orderBy('id', 'DESC')->get();
                $meta = [
                    'title' => $category->meta_title,
                    'keyword' => $category->meta_keyword,
                    'description' => $category->meta_description
                ];
                return view('shop', compact('products', 'colors', 'category_list', 'sizes', 'max_price', 'collections', 'meta', 'category', 'subcategory'));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }
    public function category($category)
    {
        $collection = Brand::where('slug', $category)->first();
        if($collection){
            $products = Product::where('brand_id',$collection->id)->where("deleted_at",null)->latest()->get();
                $meta = [
                    'title' => $collection->meta_title,
                    'keyword' => $collection->meta_keyword,
                    'description' => $collection->meta_description
                ];
                return view('collection_detail', compact('meta', 'collection','products'));
        } else {

            $category = Product_category::where('slug', $category)->first();
        if ($category) {
            if (isset($_GET['size'])) {
                $products_c = Product::where('size', 'like', '%"' . $_GET['size'] . '"%')
                    ->where('category_id', $category->id)
                    ->count();

                $products = Product::where('size', 'like', '%"' . $_GET['size'] . '"%')
                    ->where('category_id', $category->id)->latest()
                    ->get();
            } else if (isset($_GET['price_range'])) {
                $products_c = Product::where('price', '<=', $_GET['price_range'])
                    ->where('category_id', $category->id)
                    ->count();

                $products = Product::where('price', '<=', $_GET['price_range'])
                    ->where('category_id', $category->id)->latest()
                    ->get();
            } else {
                $products_c = Product::where('category_id', $category->id)
                    ->count();

                $products = Product::where('category_id', $category->id)->latest()
                    ->get();
            }
            $max_price = Product::max('price');
            $sizes = Size::all();
            $colors = Color::all();
            $subcategory_list = Product_subcategory::orderBy('name', 'ASC')->where('category_id', $category->id)->get();
            $collections = Brand::orderBy('id', 'DESC')->get();
            $meta = [
                'title' => 'Buy Kurta, Tops, Dresses, Palazzo, Dupatta & Pants for Women',
                'keyword' => 'shop',
                'description' => 'We are the best online designer clothing store in Delhi NCR to buy Kurti, tops, shirts, dresses, pants, palazzos, dupattas, pajama, kaftans & mask for Women'
            ];
            // return view('pages.category', compact('products', 'products_c', 'subcategory_list', 'sizes', 'max_price', 'collections', 'colors', 'meta'));
            return view('shop', compact('products', 'products_c', 'subcategory_list', 'sizes', 'max_price', 'collections', 'colors', 'meta'));

        } else {
            return redirect()->back();
        }

        }

        
    }
    public function shop()
    {
        if (isset($_GET['size'])) {            
            $products = Product::with(['collection','category'])->where('size', 'like', '%"' . $_GET['size'] . '"%')->get();
        } else if (isset($_GET['price_range'])) {            
            $products = Product::with(['collection','category'])->where('price', '<=', $_GET['price_range'])->get();
        } else if (isset($_GET['collection'])) {
            $collection = Brand::where('slug', $_GET['collection'])->first();            
            $products = Product::with(['collection','category'])->where('brand_id', $collection->id)->get();       
        } else if (isset($_GET['category'])) {
            $category = Product_category::where('slug', $_GET['category'])->first();            
            $products = Product::with(['collection','category'])->where('category_id', $category->id)->get();
        } else if (isset($_GET['search'])) {            
            $products = Product::with(['collection','category'])->where('name', 'like', '%' . $_GET['search'] . '%')->get();
        } else if (isset($_GET['sort_by']) && $_GET['sort_by'] != null) {
            if ($_GET['sort_by'] == 'high_to_low') {
                $sort = 'DESC';
            } elseif ($_GET['sort_by'] == 'low_to_high') {
                $sort = 'ASC';
            } else {
                $sort = 'ASC';
            }
            $products = Product::with(['collection','category'])->orderBy('price', $sort)->get();
        } else {      
             
            $products = Product::latest()->get();
        }
        $max_price = Product::max('price');
        $sizes = Size::all();
        $colors = Color::all();
        $subcategory_list = Product_subcategory::orderBy('name', 'ASC')->get();
        $collections = Brand::orderBy('id', 'DESC')->get();
        $meta = [
            'title' => 'Buy Kurta, Tops, Dresses, Palazzo, Dupatta & Pants for Women',
            'keyword' => 'shop',
            'description' => 'We are the best online designer clothing store in Delhi NCR to buy Kurti, tops, shirts, dresses, pants, palazzos, dupattas, pajama, kaftans & mask for Women',
            'type' => 'page'
        ];        
        return view('shop', compact('products', 'subcategory_list', 'sizes', 'max_price', 'collections', 'colors', 'meta'));
    }
    
    public function sale()
    {
        if (isset($_GET['size'])) {            
            return $products = Product::with(['collection','category'])->where('size', 'like', '%"' . $_GET['size'] . '"%')->get();
        } else if (isset($_GET['price_range'])) {            
            $products = Product::with(['collection','category'])->where('price', '<=', $_GET['price_range'])->get();
        } else if (isset($_GET['collection'])) {
            $collection = Brand::where('slug', $_GET['collection'])->first();            
            $products = Product::with(['collection','category'])->where('brand_id', $collection->id)->get();        
        } else if (isset($_GET['category'])) {
            $category = Product_category::where('slug', $_GET['category'])->first();            
            $products = Product::with(['collection','category'])->where('category_id', $category->id)->get();
        } else if (isset($_GET['search'])) {            
            $products = Product::with(['collection','category'])->where('name', 'like', '%' . $_GET['search'] . '%')->get();
        } else if (isset($_GET['sort_by']) && $_GET['sort_by'] != null) {
            if ($_GET['sort_by'] == 'high_to_low') {
                $sort = 'DESC';
            } elseif ($_GET['sort_by'] == 'low_to_high') {
                $sort = 'ASC';
            } else {
                $sort = 'ASC';
            }
            $products = Product::with(['collection','category'])->orderBy('price', $sort)->where('is_sale','1')->get();
        } else {            
            $products = Product::with(['collection', 'category'])->orderBy('id', 'DESC')->where('is_sale','1')->paginate(15);
        }
        $max_price = Product::max('price');
        $sizes = Size::all();
        $colors = Color::all();
        $subcategory_list = Product_subcategory::orderBy('name', 'ASC')->get();
        $collections = Brand::orderBy('id', 'DESC')->get();
        $meta = [
            'title' => 'Buy Kurta, Tops, Dresses, Palazzo, Dupatta & Pants for Women',
            'keyword' => 'shop',
            'description' => 'We are the best online designer clothing store in Delhi NCR to buy Kurti, tops, shirts, dresses, pants, palazzos, dupattas, pajama, kaftans & mask for Women',
            'type' => 'page'
        ];        
        return view('sale', compact('products', 'subcategory_list', 'sizes', 'max_price', 'collections', 'colors', 'meta'));
    }
    
    public function product_filter(Request $request)
    {
        if (isset($request->category)) {
            $category = Product_category::where('slug', $request->category)->first();
            #----------------------------start-collection-filter----------------------------#
            if ($request->collection != null) {
                $products_c = Product::whereIn('brand_id', $request->collection)
                    ->where('category_id', $category->id)->count();
                $products = Product::whereIn('brand_id', $request->collection)
                    ->where('category_id', $category->id)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------end-collection-filter----------------------------#
            else if ($request->color != null) {
                $whereColor = '';
                for ($i = 0; $i < count($request->color); $i++) {
                    $ss = '%' . $request->color[$i] . '%';
                    $whereColor .= "`name` like '" . $ss . "' OR ";
                }
                $whereColor = substr($whereColor, 0, -3);
                $products_c = Product::where('category_id', $category->id)->whereRaw($whereColor)->count();
                $products = Product::where('category_id', $category->id)->whereRaw($whereColor)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------start-size-filter----------------------------#
            else if ($request->size != null) {
                $wherSize = '';
                for ($i = 0; $i < count($request->size); $i++) {
                    $ss = '%"' . $request->size[$i] . '"%';
                    $wherSize .= "`size` like '" . $ss . "' OR ";
                }
                $wherSize = substr($wherSize, 0, -3);
                $products_c = Product::where('category_id', $category->id)->whereRaw($wherSize)->count();
                $products = Product::where('category_id', $category->id)->whereRaw($wherSize)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------end-size-filter----------------------------#

            #----------------------------start-size-and-collection-filter----------------------------#
            else if ($request->size != null && $request->collection != null && $request->color != null) {

                $whereColor = '';
                for ($i = 0; $i < count($request->color); $i++) {
                    $ss = '%' . $request->color[$i] . '%';
                    $whereColor .= "`name` like '" . $ss . "' OR ";
                }
                $whereColor = substr($whereColor, 0, -3);

                $wherSize = '';
                for ($i = 0; $i < count($request->size); $i++) {
                    $ss = '%"' . $request->size[$i] . '"%';
                    $wherSize .= "`size` like '" . $ss . "' OR ";
                }
                $wherSize = substr($wherSize, 0, -3);
                $products_c = Product::where('category_id', $category->id)->orWhereIn('brand_id', $request->collection)->whereRaw($wherSize)->whereRaw($whereColor)->count();

                return $products = Product::where('category_id', $category->id)->orWhereIn('brand_id', $request->collection)->whereRaw($wherSize)->whereRaw($whereColor)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            } else if ($request->collection != null && $request->color != null) {

                $whereColor = '';
                for ($i = 0; $i < count($request->color); $i++) {
                    $ss = '%' . $request->color[$i] . '%';
                    $whereColor .= "`name` like '" . $ss . "' OR ";
                }
                $whereColor = substr($whereColor, 0, -3);

                $products_c = Product::where('category_id', $category->id)->orWhereIn('brand_id', $request->collection)->whereRaw($whereColor)->count();

                $products = Product::where('category_id', $category->id)->orWhereIn('brand_id', $request->collection)->whereRaw($whereColor)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            } else if ($request->size != null && $request->collection != null) {

                $wherSize = '';
                for ($i = 0; $i < count($request->size); $i++) {
                    $ss = '%"' . $request->size[$i] . '"%';
                    $wherSize .= "`size` like '" . $ss . "' OR ";
                }
                $wherSize = substr($wherSize, 0, -3);
                $products_c = Product::where('category_id', $category->id)->orWhereIn('brand_id', $request->collection)->whereRaw($wherSize)->count();

                $products = Product::where('category_id', $category->id)->orWhereIn('brand_id', $request->collection)->whereRaw($wherSize)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------end-size-and-collection-filter----------------------------#
            else {
                $products_c = Product::where('category_id', $category->id)->count();
                $products = Product::where('category_id', $category->id)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
        }
        #-----------------------------------------------------------------------------------------------------#
        #-----------------------------------------------------------------------------------------------------#
        #-----------------------------------------------------------------------------------------------------#
        #----------------------------------start-without-category-filter--------------------------------------#
        #-----------------------------------------------------------------------------------------------------#
        #-----------------------------------------------------------------------------------------------------#
        #-----------------------------------------------------------------------------------------------------#


        else {

            #----------------------------start-collection-filter----------------------------#
            if ($request->collection != null) {
                $products_c = Product::whereIn('brand_id', $request->collection)->count();
                $products = Product::whereIn('brand_id', $request->collection)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------end-collection-filter----------------------------#
            else if ($request->color != null) {
                $whereColor = '';
                for ($i = 0; $i < count($request->color); $i++) {
                    $ss = '%' . $request->color[$i] . '%';
                    $whereColor .= "`name` like '" . $ss . "' OR ";
                }
                $whereColor = substr($whereColor, 0, -3);
                $products_c = Product::whereRaw($whereColor)->count();
                $products = Product::whereRaw($whereColor)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------start-size-filter----------------------------#
            else if ($request->size != null) {
                $wherSize = '';
                for ($i = 0; $i < count($request->size); $i++) {
                    $ss = '%"' . $request->size[$i] . '"%';
                    $wherSize .= "`size` like '" . $ss . "' OR ";
                }
                $wherSize = substr($wherSize, 0, -3);
                $products_c = Product::whereRaw($wherSize)->count();
                $products = Product::whereRaw($wherSize)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------end-size-filter----------------------------#

            #----------------------------start-size-and-collection-filter----------------------------#
            else if ($request->size != null && $request->collection != null && $request->color != null) {

                $whereColor = '';
                for ($i = 0; $i < count($request->color); $i++) {
                    $ss = '%' . $request->color[$i] . '%';
                    $whereColor .= "`name` like '" . $ss . "' OR ";
                }
                $whereColor = substr($whereColor, 0, -3);

                $wherSize = '';
                for ($i = 0; $i < count($request->size); $i++) {
                    $ss = '%"' . $request->size[$i] . '"%';
                    $wherSize .= "`size` like '" . $ss . "' OR ";
                }
                $wherSize = substr($wherSize, 0, -3);
                $products_c = Product::whereIn('brand_id', $request->collection)->whereRaw($wherSize)->whereRaw($whereColor)->count();

                return $products = Product::whereIn('brand_id', $request->collection)->whereRaw($wherSize)->whereRaw($whereColor)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            } else if ($request->collection != null && $request->color != null) {

                $whereColor = '';
                for ($i = 0; $i < count($request->color); $i++) {
                    $ss = '%' . $request->color[$i] . '%';
                    $whereColor .= "`name` like '" . $ss . "' OR ";
                }
                $whereColor = substr($whereColor, 0, -3);

                $products_c = Product::whereIn('brand_id', $request->collection)->whereRaw($whereColor)->count();

                $products = Product::whereIn('brand_id', $request->collection)->whereRaw($whereColor)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            } else if ($request->size != null && $request->collection != null) {

                $wherSize = '';
                for ($i = 0; $i < count($request->size); $i++) {
                    $ss = '%"' . $request->size[$i] . '"%';
                    $wherSize .= "`size` like '" . $ss . "' OR ";
                }
                $wherSize = substr($wherSize, 0, -3);
                $products_c = Product::whereIn('brand_id', $request->collection)->whereRaw($wherSize)->count();

                $products = Product::whereIn('brand_id', $request->collection)->whereRaw($wherSize)->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
            #----------------------------end-size-and-collection-filter----------------------------#
            else {
                $products_c = Product::orderBy('id', 'DESC')->count();
                $products = Product::where('id', 'DESC')->get();
                return view('pages.filter_product', compact('products', 'products_c'));
            }
        }
    }
    public function product_detail($category1, $category2, $slug)
    {
        try {
            $cat1 = Product_category::where('slug', $category1)->first();
            if($cat1){
                $cat2 = Product_subcategory::where('slug', $category2)->first();
                if($cat2){
                    $product = Product::with(['reviews'=>function($query){
                        return $query->where('status',1)->latest();}])->with(['collection', 'category','subcategory','faqs','images' => function ($query) { $query->orderBy('sort_id', 'ASC');
                        }])->where('slug', $slug)->withCount(['reviews as reviews_avg' => function($query) {$query->select(DB::raw('avg(rating)'));}])->first();
                    if($product){ 
                        $proid = $product->id;
                        $sizes = Size::all();
                        $arr = explode(' ', trim($product->name));
                        
                        $related = Product::inRandomOrder()->where('id', '!=', $product->id)->limit(5)->get();
                        $meta = [
                            'title' => $product->meta_title,
                            'keyword' => $product->meta_keyword,
                            'description' => $product->meta_description,
                            'type' => 'product'
                        ];
                        return view('product_detail', compact('product', 'sizes', 'related', 'meta', 'cat1', 'cat2'));

                    } else {
                       return redirect(404); 
                    }
                    

                } else {
                    abort(404);
                }

                } else {
                    abort(404);
                }    

            } 
        catch (\Exception $e) {
            return $e->getMessage();
            return abort(404);
        }
    }
    public function quick_view(Request $request)
    {
        $sizes = Size::all();
        $product = Product::find($request->id);
        return view('quick_view', compact('product', 'sizes'));
    }
}
