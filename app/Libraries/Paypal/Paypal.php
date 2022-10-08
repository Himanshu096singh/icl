<?php
namespace App\Libraries\Paypal;

require 'vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class Paypal{
	public function payNow($data){
		// return $data['total_qty'];
		$apiContext = new \PayPal\Rest\ApiContext(
		  new \PayPal\Auth\OAuthTokenCredential(
		    'AXALlBtBqOJ512agSd2uunNsWQQjL03GPIPdVwDk6V0WrHP0cowpL3ni-aefhHCpy6A9145RfQJMAYG3',
		    'EHXLumppOEXSbhe6BfrMNigOjl_oTKAfiVFt3zoQwNqueb848UVuOGkukuf1fyXaL45FjPBP68vzi7o2'
		)
		);		

		$payer = new Payer();
		$payer->setPaymentMethod("paypal");
		
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl('http://localhost/www/paypalcheckout/process.php')->setCancelUrl('http://localhost/www/paypalcheckout/cancel.php');

		$item1 = new Item();
		$item1->setName('Shopping Item')->setCurrency('INR')->setQuantity($data['total_qty'])->setPrice($data['sub_total']);

		$itemList = new ItemList();
		$itemList->setItems(array($item1));

		$details = new Details();
		$details->setShipping($data['shipping'])->setTax($data['tax'])->setSubtotal($data['sub_total']);

		$amount = new Amount();
		$amount->setCurrency("INR")->setTotal($data['total'])->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)->setItemList($itemList)->setDescription("Payment description")->setInvoiceNumber($data['order_id']);

		$payment = new Payment();
		$payment->setIntent("order")->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions(array($transaction));

		try{
			$payment->create($apiContext);
			// Get paypal redirect URL and redirect user
			$approvalUrl = $payment->getApprovalLink();
			header('location:' . $payment->getApprovalLink());
			return exit(1);
			// REDIRECT USER TO $approvalUrl
		} catch (PayPal\Exception\PayPalConnectionException $ex) {
		    echo $ex->getCode();
		    echo $ex->getData();
		    return die($ex);
		} catch (Exception $ex) {
		 return die($ex);
		}
	}
}