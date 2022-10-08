<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Coupon;
use App\Models\Admin\Page;
use Cart;
use DB;
use View;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $fpage = Page::get();
        View::share(compact('fpage'));
    }
    public function index()
    {
        $content = Cart::getContent();
        return view('cart')->with('content', $content);
    }
    public function show_cart()
    {
        $content = Cart::getContent();
        return view('pages.cart.load_cart')->with('content', $content);
    }
    public function cart_count()
    {
        return count(Cart::getContent());
    }
    public function cart_clear()
    {
        $delete = Cart::clear();
        if ($delete) {
            $msg = [
                'message' => 'Cart Successfully Cleared',
                'alert-type' => 'success'
            ];
        } else {
            $msg = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'danger'
            ];
        }
        return redirect()->back()->with($msg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
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
            if (isset($request->size)) {
                $size = $request->size;
            } else {
                $size = '';
            }
            $product = Product::find($request->product_id);
            $data = array(
                'id' => $request->product_id . "_" . $size,
                'name' => $product->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => ['size' => $size],
                'associatedModel' => $product
            );            
            \Cart::add($data);
            $msg = [
                'quantity' => Cart::getTotalQuantity(),
                'total' => Cart::getTotal(),
                'message' => 'Product added to Cart',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $msg = [
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            ];
        }
        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        \Cart::update($id, ['quantity' => ['relative' => false, 'value' => $request->quantity]]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Cart::remove($id);
        if ($delete) {
            $msg = [
                'message' => 'Product Successfully Deleted from Cart',
                'alert-type' => 'success'
            ];
        } else {
            $msg = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'danger'
            ];
        }
        return redirect()->back()->with($msg);
    }
    public function discount(Request $request)
    {
        // return $condition = Cart::getConditions();
        $coupon_c = Coupon::where('name', $request->name)->count();
        if ($coupon_c > 0) {
            $coupon = Coupon::where('name', $request->name)->first();
            if ($coupon->type == '1') {
                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => $request->name,
                    'type' => 'discount',
                    'target' => 'total',
                    'value' => '-' . $coupon->coupon_value,
                    'order' => 1
                ));
                Cart::condition($condition);
                $msg = [
                    'message' => 'Coupon Successfully Applied',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($msg);
            } else if ($coupon->type == '0') {
                $gtotal = Cart::getTotal();
                $discount_price = $gtotal * ($coupon->coupon_value / 100);

                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => $request->name,
                    'type' => 'discount',
                    'target' => 'total',
                    'value' => '-' . $discount_price,
                    'order' => 1
                ));
                Cart::condition($condition);
                $msg = [
                    'message' => 'Coupon Successfully Applied',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($msg);
            } else {
                $msg = [
                    'message' => 'Something went wrong',
                    'alert-type' => 'danger'
                ];
                return redirect()->back()->with($msg);
            }
        } else {
            return redirect()->back()->with('message', 'Invalid Coupon');
        }
    }
    public function remove_discount(Request $request)
    {
        Cart::removeCartCondition($request->name);
        return redirect()->back()->with('message', 'Discount has been Removed');
    }
}
