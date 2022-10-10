<!DOCTYPE html>
<html>
   <head>
      <title>ddd</title>
   </head>
   <body>
      <table width="100%" cellpadding="0" cellspacing="0" border="0"  style="border-collapse:collapse;padding:0;margin:0 auto;font-size:12px">
         <tbody>
            <tr>
               <td valign="top" align="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%">
                  <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;padding:0;margin:0 auto;width:600px;border:1px solid #B52A6B;background-color:#fff">
                     <tbody>
                        <tr>
                           <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                              <table cellpadding="0" cellspacing="0" border="0" style="width:100%!important;border-collapse:collapse;padding:0;margin:0">
                                 <tbody>
                                    <tr>
                                       <td align="center" style="text-align:center;width:100%;padding-top:5px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 0px 10px 0px;margin:0">                                     <a href="https://priyachaudhary.com/" style="float:none!important;text-align:center;color:#333333!important;display:block" rel="noreferrer noopener" target="_blank" data-saferedirecturl="#">                                         <img width="45%" src="https://priyachaudhary.com/public/front/assets/img/logo.png" border="0" style="outline:none;text-decoration:none" class="CToWUd"></a>                                 </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td valign="top" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 20px;margin:0;border:0px solid #ebebeb">
                              <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0;width:100%">
                                 <tbody>
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 20px 15px;margin:0;line-height:18px;text-align:center">
                                          <p style="color:#e63583;text-align:center;font-family:Verdana,Arial;font-weight:normal">Welcome to the world of Ethnic Simplicity<br>At PCL, the only thing that matters to us is YOU!</p>
                                          <div class="a6S" dir="ltr" style="opacity: 0.01; left: 891.5px; top: 542px;">
                                             <div  class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download">
                                                <div class="akn">
                                                   <div class="aSK J-J5-Ji aYr"></div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- <img src="unnamed.png" height="40px" style="margin-top:10px" class="CToWUd"> -->
                                          <p style="border-bottom:0px!important;font-family:Verdana,Arial;font-weight:normal;text-align:center;margin:10px 15% 0px 15%;color:#333;font-size:16px;padding-bottom:10px"><span style="text-transform:capitalize">Dear, 
                                        <?php if(isset($data['name'])): ?>
                                           <?php echo e($data['name']); ?> 
                                        <?php endif; ?>
                                        </span></p>
                                          <p style="font-family:Verdana,Arial;font-weight:normal">You’re the reason for a smile.</p>
                                          <br>
                                          <p style="margin:0px 10% 0px 10%;text-align:center;font-family:Verdana,Arial;font-weight:normal">Your order <?php if(isset($data['order_id'])): ?> <?php echo e($data['order_id']); ?> <?php endif; ?> is confirmed. We're glad to have you as part of our journey as we celebrate India’s rich artisanal flair. Your purchase has made a 
                                             difference in someone’s life.
                                          </p>
                                          <p style="font-family:Verdana,Arial;font-weight:normal"> On behalf of our artisans, we thank you sincerely.</p>
                                          <p style="font-family:Verdana,Arial;font-weight:normal">We are working around the clock to ensure your order(s) reach you at the earliest.</p>
                                          <p style="color:#e8428b;font-size:15px;font-family:Verdana,Arial;font-weight:normal">IMPORTANT: In the current circumstances, delays will be experienced. Orders will be dispatched within 7-15 days.</p>
                                          <br> 
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:8px;margin:0;text-transform:uppercase;background-color:#B52A6B;text-align:center">
                                          <h3 style="font-family:Verdana,Arial;font-weight:normal;margin:0;color:#fff">YOUR PCL ORDER SUMMARY</h3>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;text-align:center">
                                          <h3 style="font-family:Verdana,Arial;font-weight:bold;margin-bottom:0px;margin-top:0px">ORDER <span>
                                          <?php if(isset($data['order_id'])): ?>
                                           <?php echo e($data['order_id']); ?> 
                                           <?php endif; ?>
                                      </span> </h3>
                                          <p style="font-family:Verdana,Arial;font-weight:normal;font-size:11px;margin:1em 0 0px">
                                          	<?php if(isset($data['time'])): ?> 
                                          	<?php echo e(date('M d, Y h:i:s a',strtotime($data['time']))); ?>

                                          	<?php endif; ?>
                                          </p>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px 0;margin:0;padding-top:10px;text-align:center">
                                          <h3 style="font-family:Verdana,Arial;font-weight:bold;margin-bottom:0px;margin-top:0px">SHIPPING ADDRESS</h3>
                                          <p style="font-family:Verdana,Arial;font-weight:normal;font-size:12px;line-height:18px;margin-bottom:0px;margin-top:10px">
                                          	<?php if(isset($data['address'])): ?>
                                            
                                           
                                          	<span>
                                        <?php if(isset($data['name'])): ?>
                                           <?php echo e($data['name']); ?> 
                                        <?php endif; ?>
                                        <br>  <?php echo e($data['address']->address1); ?> <?php echo e($data['address']->address2); ?>

                                        <br>    <?php echo e($data['address']->city); ?>,  <?php echo e($data['address']->state); ?>, <?php echo e($data['address']->zip_code); ?>

                                        <br> <?php echo e($data['address']->country); ?>

                                        <br> T: <?php echo e($data['address']->phone); ?> 
                                    </span>
                                    <?php endif; ?>
                                </p>

                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px 0;margin:0;text-align:center;padding-bottom:10px">
                                          <h3 style="font-family:Verdana,Arial;font-weight:bold;margin-bottom:0px;margin-top:0px">PAYMENT METHOD</h3>
                                          <p style="font-family:Verdana,Arial;font-weight:normal;font-size:12px;margin-top:10px;margin-bottom:10px;line-height:18px;padding:0"><strong style="font-family:Verdana,Arial;font-weight:normal">
                                          <?php if(isset($data['payment_method'])): ?>
                                           <?php echo e($data['payment_method']); ?> 
                                           <?php endif; ?>
                                      </strong></p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse;padding:0;margin:0">

                                 <tbody>
<?php
 

 $cart_id = $data['cart_ids'];
 $arr=explode(",",$cart_id);
 $g_total=0;
 for($j=0;$j<count($arr);$j++){
  $cartId=$arr[$j]; 
  $cart_detail=DB::table("carts")->where("id",$cartId)->get();
  foreach($cart_detail as $crt){    
    $sub_total=0;
    $sub_total+=$crt->price*$crt->qty;
    $g_total+=$sub_total;    
    $pro_d=DB::table("products")->where("id",$crt->product_id)->get();
    foreach($pro_d as $p){
      $pr_img=$p->image;
    }
    ?>
<tr>
<td style="width:93px;padding-bottom:10px!important;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
<div style="border:1px solid #B52A6B;border-right:none">
	<img src="<?php echo e(url('public')); ?>/<?php echo e($pr_img); ?>" style="max-width:91px;display:block;border:0px solid #B52A6B" class="CToWUd"></div>
</td>
<td style="padding-bottom:10px!important;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
<div style="min-height:75px;padding:8px;text-align:center;border:1px solid #B52A6B;border-left:none">
<p style="text-transform:uppercase;font-family:Verdana,Arial;font-weight:normal;margin:0 0 14px 0;color:#333;font-style:normal;line-height:1.4;font-size:14px"><?php echo e($crt->product_name); ?></p>
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse;padding:0;margin:0">
<tbody>
<tr style="text-align:center">
<td width="35%" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">Size : <?=json_decode($crt->attributes, true)['size']?></td>
<td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">Qty: <?php echo e($crt->qty); ?></td>
<td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">       
<span style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif"> Rs <?php echo e($crt->price); ?> x <?php echo e($crt->qty); ?> = Rs <?php echo e($sub_total); ?></span>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
    <?php
  }
 }

 ?>

                                 </tbody>
                                 
                              </table>
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse;padding:0;margin:0;border-top:1px solid #ddd;border-bottom:1px solid #ddd">
                                 <tbody>
                                    <!-- <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"></td>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"></td>
                                       <td colspan="3" align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                          Subtotal                    </td>
                                       <td align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                          <span style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">₹4,100.00</span>               
                                       </td>
                                    </tr> -->
                                    <!-- <tr>
                                       <td colspan="5" align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                     Tax (Included)            </td>
                                       <td align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"><span style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">₹439.29</span></td>
                                    </tr>
                                    <tr style="padding-bottom:5px">
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"></td>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"></td>
                                       <td colspan="3" align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                          Shipping &amp; Handling                    </td>
                                       <td align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                          <span style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">₹100.00</span>                    </td>
                                    </tr> -->
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"></td>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"></td>
                                       <td colspan="3" align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                          <strong style="font-family:Verdana,Arial;font-weight:normal">Grand Total</strong>                      </td>
                                       <td align="right" style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0">                          <strong style="font-family:Verdana,Arial;font-weight:normal"><span style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">Rs 
                                       	<?php if(isset($data['total_amount'])): ?>
                                           <?php echo e($data['total_amount']); ?> 
                                           <?php endif; ?></span></strong> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;margin-top:10px;border-collapse:collapse;padding:0;margin:0">
                                 <tbody>
                                    <tr>         </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0;width:100%">
                     <tbody>
                        <tr style="text-align:center;color:#B52A6B">
                           <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                              <p style="font-family:Verdana,Arial;font-weight:normal">Each garment is made with the same amount of love and passion.<br>Hope you enjoy wearing it as much as we loved making it!</p>
                              <p style="font-family:Verdana,Arial;font-weight:normal">Team PCL</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <p style="color:#ffffff;font-family:Verdana,Arial;font-weight:normal">                                              </p>
               </td>
            </tr>
            <tr>
               <td align="center" valign="top"  width="100%" bgcolor="#B52A6B" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;background:#B52A6B;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:20px;padding-bottom:0px;width:600px">
                  <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;padding:0;margin:0">
                     <tbody>
                        <tr>
                           <td valign="top" width="50%" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:50%">
                              <table border="0" cellpadding="0" cellspacing="0" align="center" style="width:100%;border-collapse:collapse;padding:0;margin:0;min-height:52px;color:#f1e6d3;border-right:1px solid white">
                                 <tbody>
                                    <tr>
                                       <td valign="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 56px 5px 56px;margin:0;text-align:center;font-size: 44px;  word-spacing: 30px;letter-spacing: 8px;color: #fff;">FOLLOW US </td>
                                    </tr>
                                    <tr>
                                       <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;padding:0;margin: 17px auto;">
                                             <tbody>
                                                <tr>
                                                   <td valign="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;text-align:center">                                                      <a href="https://www.facebook.com/Priya-Chaudhary-Label-491436704638885/" style="color:#333333!important" rel="noreferrer noopener" target="_blank" data-saferedirecturl="#">                                                         <img alt="Facebook" src="<?php echo e(url('public/front/assets/img/facebook.png')); ?>" style="width:100%" class="CToWUd"></a>                                                   </td>
                                                   <td valign="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;text-align:center">                                 
                                                      <a href="#" style="color:#333333!important" rel="noreferrer noopener" target="_blank" data-saferedirecturl="#"><img alt="Pintrest" src="<?php echo e(url('public/front/assets/img/footer02.png')); ?>" style="width:100%" class="CToWUd"></a>                                                   
                                                   </td>
                                                   <td valign="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;text-align:center"> 
                                                      <a href="https://instagram.com/priyachaudharylabel?igshid=vkm07ds3t41y" style="color:#333333!important" rel="noreferrer noopener" target="_blank" data-saferedirecturl="#"><img alt="instagram" src="<?php echo e(url('public/front/assets/img/footer03.png')); ?>" style="width:100%" class="CToWUd"></a>                                                   
                                                   </td>
                                                   <td valign="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;text-align:center">                                                      <a href="#" style="color:#333333!important" rel="noreferrer noopener" target="_blank" data-saferedirecturl="#"><img alt="twitter" src="<?php echo e(url('public/front/assets/img/footer04.png')); ?>" style="width:100%" class="CToWUd"></a>                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td valign="top" width="50%" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:50%">
                              <table border="0" cellpadding="0" cellspacing="0" align="center" style="width:100%;border-collapse:collapse;padding:0;margin:0">
                                 <tbody>
                                    <tr>
                                       <td valign="bottom" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 25px;margin:0;text-align:center">     
                                          <a href="mailto:Support@priyachaudhary.com" style="color:#fff!important; font-size:34px;text-decoration:none" rel="noreferrer noopener" target="_blank">                                                 Support@priyachaudhary.com</a>                                          
                                       </td>
                                    </tr>
                                    <tr >
                                       <td valign="bottom" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 25px 0px 25px;margin:0;text-align:center;padding-top: 32px;">                                             <a href="telto:01145622642" style="color:#fff!important; font-size:33px;text-decoration:none" rel="noreferrer noopener" target="_blank">011 45622642</a>                                          </td>
                                    </tr>
                                    <tr>
                                       <!-- <td valign="bottom" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 77px 0px 80px;margin:0;text-align:center;font-size:49px;">                                      Support@PriyaChaudhary.com </td>  -->                                                                  
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%" style="border-collapse:collapse;padding:0;margin:0">
                     <tbody>
                        <tr>
                           <td valign="top" align="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0px 24px 0px 23px;margin:0;text-align:center">
                              <p style="font-family:Verdana,Arial;font-weight:normal;margin:0px;color: #fff!important;
                                 font-size: 32px; padding: 10px 0;">                                    © 2021 Priya Chaudhary</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/emails/order_confirm.blade.php ENDPATH**/ ?>