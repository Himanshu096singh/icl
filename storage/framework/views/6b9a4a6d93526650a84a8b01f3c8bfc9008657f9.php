<!DOCTYPE html>
<html>
   <head>
      <title>INV<?php echo e(sprintf("%08d", $invoice->id)); ?>.pdf</title>
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
               <img src="<?php echo e(url('public')); ?>/<?php echo e($settings->store_logo); ?>" style="height: 50px;">
               <h3></h3>
            </div>
            <div class="col-sm-6 text-right" style="float: right;">
               Date :- <?php echo e($invoice->updated_at); ?>

            </div>
         </div>
         <div>
            <table style="width: 100%;margin-top: 20px;" border="0">
               <tr>
                  <td style="width: 33.33%;padding:5px;">
                     From<br/>
                     <b><?php echo e(config('app.name')); ?></b> <br/>
                     <?php echo e($settings->store_address); ?><br/>
                     Phone: <?php echo e($settings->store_phone); ?><br/>
                     Email: <?php echo e($settings->store_email); ?><br/>
                  </td>
                  <td style="width: 33.33%;padding:0px;">
                     To<br/>
                     <strong><?php echo e($user->name); ?></strong><br>
                     <?php echo e($billing->address1); ?>, <?php echo e($billing->address2); ?><br>
                     <?php echo e($billing->city); ?>, <?php echo e($billing->state); ?> <?php echo e($user->zip_code); ?><br>
                     Phone: <?php echo e($user->phone); ?><br>
                     Email: <?php echo e($user->email); ?>

                  </td>
                  <td style="width: 33.33%;padding:5px; ">
                     <b>Invoice: <?php echo e(sprintf("%08d", $invoice->id)); ?></b><br>
                     <br>
                     <b>Order ID:</b> <?php echo e($invoice->order_id); ?><br>
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
                     <td><?php echo e($count++); ?></td>
                     <td><?php echo e($crt->product_name); ?> <br/><small><b>Size : <?php echo e(json_decode($crt->attributes,true)['size']); ?></b></small></td>
                     <td><?php echo e($crt->qty); ?></td>
                     <td style="text-align: right;">Rs <?php echo e($crt->price); ?></td>
                  </tr>
                  <?php
                     }
                     }
                     ?> 
                  <tr>
                     <th style="border-left: 1px #fff solid;border-bottom:  1px #fff solid;" colspan="2" rowspan="3"></th>
                     <th style="text-align: right;" colspan="1">Subtotal:</th>
                     <td style="text-align: right;">Rs <?php echo e($g_total); ?>.00</td>
                  </tr>
                  <tr>
                     <th style="text-align: right;" colspan="1">Shipping:</th>
                     <td style="text-align: right;">Rs <?php echo e($order->shipping_charge); ?></td>
                  </tr>
                  <tr>
                     <th style="text-align: right;" colspan="1">Total:</th>
                     <td style="text-align: right;">Rs <?php echo e($order->total_price); ?></td>
                  </tr>
               </table>
            </section>
         </div>
      </div>
   </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/myPDF.blade.php ENDPATH**/ ?>