<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Business_Order;
use App\Models\Payout;
use App\Models\Admin\Product;
use DB;
use App\Models\Invoice;
use App\Models\Billing;
use App\Models\StoredCart;
use App\User;
use App\Models\Admin\Setting;
use App\Mail\OrderInvoice;
use Mail;
use PDF;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin");
    }
    public function index()
    {
        $order = Order::with('user')->orderBy("id", "DESC")->get();
        return view("admin.order.list")->with("order", $order);
    }
    public function bulk_action(Request $request)
    {
        $ord_id = $request->orderids;
        $ord_status = $request->status;

        if ($request->status == '4') {
            try {
                Order::whereIn('order_id', $ord_id)->delete();
                $msg = [
                    'message' => 'Orders Successfully Deleted',
                    'alert-type' => 'success'
                ];
            } catch (\Exception $e) {
                $msg = [
                    'message' => $e->getMessage(),
                    'alert-type' => 'warning'
                ];
            }
        }

        $orders = Order::whereIn('order_id', $ord_id)->get();
        foreach ($orders as $order) {
            $user_details = User::find($order->user_id);
            $inv_details = Invoice::where("order_id", $ord_id)->first();
            try {
                $status_p = DB::table("orders")->where("order_id", $order->order_id)->update(['status' => $request->status]);

                if ($request->status == 2) {
                    try {
                        $payment = Order::where('order_id', $order->order_id)->first();
                        $payment->payment_status = 1;
                        $payment->save();

                        DB::table("invoices")->where("order_id", $request->order_id)->update(['status' => '1']);

                        $invoice_data = array(
                            "order_id" => $request->order_id,
                            "invoice_id" => sprintf("%08d", $inv_details->id)
                        );

                        $pdf = $this->genrate_pdf(base64_encode($request->order_id));
                        $data = [
                            'details' => 'To download updated invoice click here'
                        ];
                        $u_details = array(
                            'email' => $user_details->email,
                            'invoice_id' => $inv_details->id
                        );
                        // Mail::send('emails.order_invoice', $data, function ($message) use ($u_details,$pdf) {
                        //    $message->subject('Order Invoice');
                        //    $message->from('info@priyachaudhary.com');
                        //    $message->to($u_details['email']);
                        //    $message->attachData($pdf, sprintf("%08d",$u_details['invoice_id'] ).'.pdf', [
                        //        'mime' => 'application/pdf',
                        //    ]);
                        // });
                        $cart_id = $order->cart_ids;
                        $arr = explode(",", $cart_id);
                        $g_total = 0;
                        for ($j = 0; $j < count($arr); $j++) {
                            $cartId = $arr[$j];
                            $cart_detail = DB::table("carts")->where("id", $cartId)->get();
                            foreach ($cart_detail as $crt) {
                                $pro_id = $crt->product_id;
                                $pro_d = Product::find($pro_id);
                                $ordered_qty = $crt->qty;
                                $stock_qty = $pro_d->stock;
                                $left_qty = $stock_qty - $ordered_qty;
                                $update_qty = DB::table("products")->where("id", $pro_id)->update(['stock' => $left_qty]);
                            }
                        }
                    } catch (\Exception $e) {
                        $msg = array(
                            'message' => $e->getMessage(),
                            'alert-type' => 'warning'
                        );
                    }
                }
                $msg = array(
                    'message' => 'Order Status Successfully Changed',
                    'alert-type' => 'success'
                );
            } catch (\Exception $e) {
                $msg = array(
                    'message' => $e->getMessage(),
                    'alert-type' => 'warning'
                );
            }
        }
        return redirect()->back()->with($msg);
    }
    public function business_orders()
    {
        $order = DB::table("orders")->orderBy("id", "DESC")->get();
        return view("admin.order.list")->with("order", $order);
    }
    public function payouts()
    {
        $payout = Payout::orderBy("id", "DESC")->get();
        return view("admin.payouts.list")->with("payout", $payout);
    }
    public function payouts_edit($id)
    {
        $payout = Payout::find($id);
        return view("admin.payouts.edit")->with("payout", $payout);
    }
    public function payouts_update(Request $request)
    {
        $imgName = $request->file('image')->getClientOriginalName();
        $imgUrl = "storage/business/payout/" . $imgName;
        Storage::putFileAs('public/business/payout/', $request->file('image'), $imgName);

        $payout = Payout::find($request->id);
        $payout->paid_amount = $request->amount;
        $payout->invoice_id = $request->invoice_id;
        $payout->attachment = $imgUrl;
        $payout->status = '1';
        $save = $payout->save();
        if ($save) {
            $msg = array(
                'message' => 'Payout Successfully Done',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('admin/business/payouts'))->with($msg);
    }
    public function details($id)
    {
        $order_id = base64_decode($id);
        $order = Order::with('user')->where("order_id", $order_id)->get();
        return view("admin.order.details")->with("order", $order);
    }
    public function delete($id)
    {
        $order_id = base64_decode($id);
        $order = Order::destroy($order_id);
        if ($order) {
            $msg = array(
                'message' => 'Order Successfully Deleted',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url('admin/order'))->with($msg);
    }
    public function update_order_status(Request $request)
    {
        $order = Order::find($request->id);
        $user_details = User::find($order->user_id);
        $inv_details = Invoice::where("order_id", $request->order_id)->first();

        if ($order) {

            $status_p = Order::where("order_id", $request->order_id)->update(['status' => $request->status]);
            if ($status_p) {
                if ($request->status == 2) {
                    try {
                        $payment = Order::find($request->id);
                        $payment->payment_status = 1;
                        $payment->save();

                        $arr = $order->cart_ids;
                        for ($j = 0; $j < count($arr); $j++) {
                            $cart_detail = StoredCart::where("id", $arr[$j])->first();
                            if ($cart_detail) {
                                $product = Product::find($cart_detail->product_id);
                                $left_qty = $product->stock - $cart_detail->qty;
                                $product->stock = $left_qty;
                                $product->save();
                            }
                        }
                        Invoice::where("order_id", $request->order_id)->update(['status' => '1']);

                        $pdf = $this->genrate_pdf(base64_encode($request->order_id));
                        $data = [
                            'details' => 'To download updated invoice click here'
                        ];
                        $u_details = array(
                            'email' => $user_details->email,
                            'invoice_id' => $inv_details->id
                        );
                        Mail::send('emails.order_invoice', $data, function ($message) use ($u_details, $pdf) {
                            $message->subject('Order Invoice');
                            $message->from(env('MAIL_FROM_ADDRESS'));
                            $message->to($u_details['email']);
                            $message->attachData($pdf, sprintf("%08d", $u_details['invoice_id']) . '.pdf', [
                                'mime' => 'application/pdf',
                            ]);
                        });
                    } catch (\Exception $e) {
                        $msg = array(
                            'message' => $e->getMessage(),
                            'alert-type' => 'danger'
                        );
                    }
                }
                $msg = array(
                    'message' => 'Order Status Successfully Changed',
                    'alert-type' => 'success'
                );
            } else {
                $msg = array(
                    'message' => 'Something went wrong',
                    'alert-type' => 'danger'
                );
            }
        }
        return redirect(url('admin/order/details/' . base64_encode($order->order_id)))->with($msg);
    }
    public static function get_details()
    {
        return "HElLo";
    }
    public function invoice($id)
    {
        $order_id = base64_decode($id);
        $check_invoice = Invoice::where("order_id", $order_id)->count();
        if ($check_invoice > 0) {
            $invoice = Invoice::where("order_id", $order_id)->first();
            $order = Order::where("order_id", $order_id)->first();
            $settings = Setting::first();
            $user = User::find($invoice->user_id);
            $billing = Billing::where("order_id", $order_id)->first();
            return view("admin.order.invoice", compact("invoice", "settings", "user", "billing", "order"));
        } else {
            $msg = array(
                'message' => 'Invoice does not exists',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($msg);
        }
    }
    public function invoice_pdf()
    {
    }
    public function genrate_pdf($id)
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
            return $pdf->stream();
        } else {
            $msg = array(
                'message' => 'Invoice does not exists',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($msg);
        }
    }
}
