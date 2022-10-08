<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin");
    }
    public function index()
    {
        $contact = Contact::orderBy("id", "DESC")->get();
        $total_revenue = Order::where("status", "2")->sum("total_price");
        $total_sale = Order::where("status", "2")->sum("total_price");
        $this_month_sale = Order::where("status", "2")->whereMonth('created_at', date('m'))->sum("total_price");
        $today_sale = Order::where("status", "2")->whereMonth('created_at', date('m'))->whereDay('created_at', date('d'))->sum("total_price");
        return view("admin.dashboard", compact("contact", "total_revenue", "total_sale", "this_month_sale", "today_sale"));
    }
    #----------------------------Start-Sales-Analytics-Data--------------------------------------------------#
    public function get_data()
    {
        if (isset($_GET['year']) && isset($_GET['month'])) {
            if (isset($_GET['year'])) {
                $is_year = $_GET['year'];
            } else {
                $is_year = date("Y");
            }
            if (isset($_GET['month']) && $_GET['month'] != "") {
                $sales = array();
                for ($i = 1; $i <= 31; $i++) {
                    $orders = Order::where("status", "2")->get();
                    $gtotal = 0;
                    foreach ($orders as $item) {
                        $day = date("d", strtotime($item->created_at));
                        $month = date("m", strtotime($item->created_at));
                        $year = date("Y", strtotime($item->created_at));
                        if ($year == $_GET['year'] && $month == $_GET['month'] && $day == $i) {
                            $gtotal += $item->total_price;
                        }
                    }
                    $sales[] = $gtotal;
                }
                return json_encode($sales);
            } else {
                return $this->year_wise($is_year);
            }
        } else {
            return $this->year_wise(date("Y"));
        }
    }

    private function year_wise($is_year)
    {
        $sales = array();
        for ($i = 1; $i <= 12; $i++) {
            $orders = Order::where("status", "2")->get();
            $gtotal = 0;
            foreach ($orders as $item) {
                $day = date("d", strtotime($item->created_at));
                $month = date("m", strtotime($item->created_at));
                $year = date("Y", strtotime($item->created_at));
                if ($year == $is_year && $month == $i) {
                    $gtotal += $item->total_price;
                }
            }
            $sales[] = $gtotal;
        }
        return json_encode($sales);
    }
    #----------------------------End-Sales-Analytics-Data--------------------------------------------#
    public function custom_range()
    {
        if ($_GET['filter_by'] == 1) {
            $today = date("d");
            $rd = 30 - $today;
            $range_month = date("m") - 1;
            $range_year = date("Y");
            $last_mdays = cal_days_in_month(CAL_GREGORIAN, $range_month, date("Y"));
            if ($last_mdays == 31) {
                $from_day = $last_mdays - $rd + 1;
            } else if ($last_mdays == 30) {
                $from_day = $last_mdays - $rd;
            }

            // echo $from_day+1; die;
            $first_m = array();
            for ($h = $from_day; $h <= $last_mdays; $h++) {
                $first_m[] = sprintf("%02d", $h) . "-" . $range_month . "-" . date("Y");
            }
            $current_m = array();
            for ($k = 1; $k <= $today; $k++) {
                $current_m[] = sprintf("%02d", $k) . "-" . date("m") . "-" . date("Y");
            }
            $final_range = array_merge($first_m, $current_m);
            // echo "<pre>";
            // print_r($final_range); die;           
            $sales = array();
            for ($i = 0; $i <= 29; $i++) {
                // echo $final_range[$i]."<br/>";
                $gtotal = 0;
                $orders = Order::where("status", "2")->get();
                foreach ($orders as $item) {
                    $day = date("d", strtotime($item->created_at));
                    $month = date("m", strtotime($item->created_at));
                    $year = date("Y", strtotime($item->created_at));
                    $full_date = date("d-m-Y", strtotime($item->created_at));
                    // if( $full_date==$final_range[$i]){
                    if ($month == date("m") && $full_date == $final_range[$i]) {
                        $gtotal += $item->total_price;
                        // echo  $full_date."<br/>";    
                    }
                }
                $sales[] = $gtotal;
            }
            $data = array(
                "days" => $final_range,
                "sales" => $sales
            );
            return json_encode($data);
        } else if ($_GET['filter_by'] == 0) {
            $today = date("d");
            if ($today > 7) {
                $rd = $today - 7;
                $current_m = array();
                for ($k = $rd + 1; $k <= $today; $k++) {
                    $current_m[] = sprintf("%02d", $k) . "-" . date("m") . "-" . date("Y");
                }
                // echo "<pre>";
                // print_r($current_m); die;
                $final_range = $current_m;
            } else if ($today < 7) {
                $rd = 7 - $today;
                $range_month = date("m") - 1;
                $range_year = date("Y");
                $last_mdays = cal_days_in_month(CAL_GREGORIAN, $range_month, date("Y"));
                if ($last_mdays == 31) {
                    $from_day = $last_mdays - $rd + 1;
                } else if ($last_mdays == 30) {
                    $from_day = $last_mdays - $rd;
                }
                $first_m = array();
                for ($h = $from_day; $h <= $last_mdays; $h++) {
                    $first_m[] = sprintf("%02d", $h) . "-" . $range_month . "-" . date("Y");
                }
                $current_m = array();
                for ($k = 1; $k <= $today; $k++) {
                    $current_m[] = sprintf("%02d", $k) . "-" . date("m") . "-" . date("Y");
                }
                $final_range = array_merge($first_m, $current_m);
            }
            $sales = array();
            for ($i = 0; $i <= 6; $i++) {
                $gtotal = 0;
                $orders = Order::where("status", "2")->get();
                foreach ($orders as $item) {
                    $day = date("d", strtotime($item->created_at));
                    $month = date("m", strtotime($item->created_at));
                    $year = date("Y", strtotime($item->created_at));
                    $full_date = date("d-m-Y", strtotime($item->created_at));
                    if ($month == date("m") && $full_date == $final_range[$i]) {
                        $gtotal += $item->total_price;
                    }
                }
                $sales[] = $gtotal;
            }
            $data = array(
                "days" => $final_range,
                "sales" => $sales
            );
            return json_encode($data);
        }
    }
    public function day_wise()
    {
        $sales = array();
        for ($i = 1; $i <= 31; $i++) {
            $orders = Order::where("status", "2")->get();
            $gtotal = 0;
            foreach ($orders as $item) {
                $day = date("d", strtotime($item->created_at));
                $month = date("m", strtotime($item->created_at));
                $year = date("Y", strtotime($item->created_at));
                if ($year == date("Y") && $month == date("m") && $day == $i) {
                    $gtotal += $item->total_price;
                }
            }
            $sales[] = $gtotal;
        }
        return json_encode($sales);
    }
    public function hour_wise()
    {
        $is_day = date("d");
        $sales = array();
        for ($i = 1; $i <= 24; $i++) {
            $orders = Order::where("status", "2")->get();
            $gtotal = 0;
            foreach ($orders as $item) {
                $hour = date("h", strtotime($item->created_at));
                $day = date("d", strtotime($item->created_at));
                $month = date("m", strtotime($item->created_at));
                $year = date("Y", strtotime($item->created_at));
                if ($year == date("Y") && $month == date("m") && $day == $is_day && $hour == $i) {
                    $gtotal += $item->total_price;
                }
            }
            $sales[] = $gtotal;
        }
        return json_encode($sales);
    }
    public function order_an()
    {
    }
    public function contact_view($id)
    {
        $con_id = base64_decode($id);
        $contact = Contact::find($con_id);
        return view("admin.contact_view")->with("contact", $contact);
    }
    public function contact_delete($id)
    {
        $con_id = base64_decode($id);
        $delete = Contact::destroy($con_id);
        if ($delete) {
            $msg = array(
                'message' => 'Contact Successfully deleted',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url("superadmin"))->with($msg);
    }
    public function contact_delete_all(Request $request)
    {
        $delete = Contact::whereIn('id', $request->ids)->delete();
        if ($delete) {
            $msg = array(
                'message' => 'Contact Successfully deleted',
                'alert-type' => 'success'
            );
        } else {
            $msg = array(
                'message' => 'Something went wrong',
                'alert-type' => 'danger'
            );
        }
        return redirect(url("superadmin"))->with($msg);
    }
    public function dashboard()
    {
    }
}
