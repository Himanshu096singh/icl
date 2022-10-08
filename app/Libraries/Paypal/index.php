<?php
require 'vendor/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    'AXALlBtBqOJ512agSd2uunNsWQQjL03GPIPdVwDk6V0WrHP0cowpL3ni-aefhHCpy6A9145RfQJMAYG3',
    'EHXLumppOEXSbhe6BfrMNigOjl_oTKAfiVFt3zoQwNqueb848UVuOGkukuf1fyXaL45FjPBP68vzi7o2'
  )
);


// require bootstrap.php;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


$orderid="ORD".rand(1111,9999);

// Create new payer and method
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Set redirect urls
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost/www/paypalcheckout/process.php')
  ->setCancelUrl('http://localhost/www/paypalcheckout/cancel.php');

// Set item list
$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
  ->setCurrency('INR')
  ->setQuantity(1)
  ->setPrice(7.5);
  
$item2 = new Item();
$item2->setName('Granola bars')
  ->setCurrency('INR')
  ->setQuantity(5)
  ->setPrice(2);

$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));

// Set payment details
$details = new Details();
$details->setShipping(1.2)
  ->setTax(1.3)
  ->setSubtotal(17.50);

// Set payment amount
$amount = new Amount();
$amount->setCurrency("INR")
  ->setTotal(20)
  ->setDetails($details);

// Set transaction object
$transaction = new Transaction();
$transaction->setAmount($amount)
  ->setItemList($itemList)
  ->setDescription("Payment description")
  ->setInvoiceNumber($orderid);

// Create the full payment object
$payment = new Payment();
$payment->setIntent("order")
  ->setPayer($payer)
  ->setRedirectUrls($redirectUrls)
  ->setTransactions(array($transaction));


// Create payment with valid API context
try {
  $payment->create($apiContext);

  // Get paypal redirect URL and redirect user
  $approvalUrl = $payment->getApprovalLink();
header('location:' . $payment->getApprovalLink());
exit(1);
  // REDIRECT USER TO $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}