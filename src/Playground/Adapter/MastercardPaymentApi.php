<?php

namespace Usanzadunje\Playground\Adapter;

class MastercardPaymentApi
{
    public function __construct(public string $currency) {}

    public function differentCharge($amount)
    {
        if ($this->currency !== 'EUR') {
            echo 'Exchanging ' . $this->currency . ' to EUR';
        }

        echo 'Charged : ' . $amount;
    }
}