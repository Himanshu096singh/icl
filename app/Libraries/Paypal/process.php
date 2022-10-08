<?php

require 'vendor/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    'AXALlBtBqOJ512agSd2uunNsWQQjL03GPIPdVwDk6V0WrHP0cowpL3ni-aefhHCpy6A9145RfQJMAYG3',
    'EHXLumppOEXSbhe6BfrMNigOjl_oTKAfiVFt3zoQwNqueb848UVuOGkukuf1fyXaL45FjPBP68vzi7o2'
  )
);

// require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

// Get payment object by passing paymentId
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$payerId = $_GET['PayerID'];

// Execute payment with payer ID
$execution = new PaymentExecution();
$execution->setPayerId($payerId);

try {
  // Execute payment
  $result = $payment->execute($execution, $apiContext);
  // var_dump($result);

  print_r($result);
   $payment = Payment::get($paymentId, $apiContext);
     $data = [
        'transaction_id' => $payment->getId(),
        'payment_amount' => $payment->transactions[0]->amount->total,
        'payment_status' => $payment->getState(),
        'invoice_id' => $payment->transactions[0]->invoice_number,
        'created_at' => date()
    ];
    echo "<br/>";
    print_r($data);

    

} catch (PayPal\Exception\PayPalConnectionException $ex) {
  // echo $ex->getCode();
  // echo $ex->getData();

  die($ex);
} 
catch (Exception $ex) {
  die($ex);
}