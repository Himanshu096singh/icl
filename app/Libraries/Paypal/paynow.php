<?php
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

// Create new payer and method
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Set redirect URLs
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost:3000/process.php')
  ->setCancelUrl('http://localhost:3000/cancel.php');

// Set payment amount
$amount = new Amount();
$amount->setCurrency("INR")
  ->setTotal(10);

// Set transaction object
$transaction = new Transaction();
$transaction->setAmount($amount)
  ->setDescription("Payment description");

// Create the full payment object
$payment = new Payment();
$payment->setIntent('sale')
  ->setPayer($payer)
  ->setRedirectUrls($redirectUrls)
  ->setTransactions(array($transaction));

  // Create payment with valid API context
try {
  $payment->create($apiContext);

  // Get PayPal redirect URL and redirect the customer
  $approvalUrl = $payment->getApprovalLink();

  // Redirect the customer to $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}// Create payment with valid API context
try {
  $payment->create($apiContext);

  // Get PayPal redirect URL and redirect the customer
  $approvalUrl = $payment->getApprovalLink();

  // Redirect the customer to $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}