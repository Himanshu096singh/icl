<!DOCTYPE html>
<html>
   <head>
      <title>INV{{sprintf("%08d", $invoice->id)}}.pdf</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <style type="text/css">
         th,td{
         padding:10px 10px;
         }
      </style>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
               <img src="{{url('public')}}/{{$settings->store_logo}}" style="height: 50px;">
               <h3></h3>
            </div>
            <div class="col-sm-6 text-right" style="float: right;">
               Date :- {{$invoice->updated_at}}
            </div>
         </div>
         <div>
            <table style="width: 100%;margin-top: 20px;" border="0">
               <tr>
                  <td style="width: 33.33%;padding:5px;">
                     From<br/>
                     <b>{{config('app.name')}}</b> <br/>
                     {{$settings->store_address}}<br/>
                     Phone: {{$settings->store_phone}}<br/>
                     Email: {{$settings->store_email}}<br/>
                  </td>
                  <td style="width: 33.33%;padding:0px;">
                     To<br/>
                     <strong>{{$user->name}}</strong><br>
                     {{$billing->address1}}, {{$billing->address2}}<br>
                     {{$billing->city}}, {{$billing->state}} {{$user->zip_code}}<br>
                     Phone: {{$user->phone}}<br>
                     Email: {{$user->email}}
                  </td>
                  <td style="width: 33.33%;padding:5px; ">
                     <b>Invoice: {{sprintf("%08d", $invoice->id)}}</b><br>
                     <br>
                     <b>Order ID:</b> {{$invoice->order_id}}<br>
                     <b>Payment Status:
                     <?php
                        if($invoice->status==0){
                          echo "<label class='badge badge-danger'>Unpaid</label>";
                        }
                        else if($invoice->status==1){
                          echo "<label class='badge badge-success'>Paid</label>";
                        }
                        else{
                          echo "On Hold";
                        }
                        ?></b>
                  </td>
               </tr>
            </table>
         </div>
         <div>
            <section>
               <table border="1" style="width: 100%;margin-top: 20px;">
                  <tr>
                     <th style="width:10%;">#</th>
                     <th style="width:60%;">Product Description</th>
                     <th style="width:10%;">Qty</th>
                     <th style="width:20%;">Subtotal</th>
                  </tr>
                  <?php
                     $arr=$order->cart_ids;
                     // $arr=explode(",",$cart_id);
                     $g_total=0;
                     $count=1;
                     for($j=0;$j<count($arr);$j++){
                     $cartId=$arr[$j]; 
                     $cart_detail=DB::table("carts")->where("id",$cartId)->get();
                     foreach($cart_detail as $crt){
                     $sub_total=0;
                     $sub_total+=$crt->price*$crt->qty;
                     $g_total+=$sub_total;        
                     ?>
                  <tr>
                     <td>{{$count++}}</td>
                     <td>{{$crt->product_name}} <br/><small><b>Size : {{json_decode($crt->attributes,true)['size']}}</b></small></td>
                     <td>{{$crt->qty}}</td>
                     <td style="text-align: right;">Rs {{$crt->price}}</td>
                  </tr>
                  <?php
                     }
                     }
                     ?> 
                  <tr>
                     <th style="border-left: 1px #fff solid;border-bottom:  1px #fff solid;" colspan="2" rowspan="3"></th>
                     <th style="text-align: right;" colspan="1">Subtotal:</th>
                     <td style="text-align: right;">Rs {{$g_total}}.00</td>
                  </tr>
                  <tr>
                     <th style="text-align: right;" colspan="1">Shipping:</th>
                     <td style="text-align: right;">Rs {{$order->shipping_charge}}</td>
                  </tr>
                  <tr>
                     <th style="text-align: right;" colspan="1">Total:</th>
                     <td style="text-align: right;">Rs {{$order->total_price}}</td>
                  </tr>
               </table>
            </section>
         </div>
      </div>
   </body>
</html>