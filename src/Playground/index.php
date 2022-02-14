<?php

use Usanzadunje\Playground\Adapter\MastercardPaymentAdapter;
use Usanzadunje\Playground\Adapter\MastercardPaymentApi;
use Usanzadunje\Playground\Adapter\Payment;
use Usanzadunje\Playground\Adapter\PayPalPayment;

require '../../vendor/autoload.php';


function execute(Payment $payment)
{
    $payment->charge(999);
}

$paypal = new PayPalPayment('admin', 'password');
$mca = new MastercardPaymentApi('USD');
$mastercard = new MastercardPaymentAdapter($mca);

execute($mastercard);
