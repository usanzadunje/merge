<?php

namespace Usanzadunje\Playground\Adapter;

class MastercardPaymentAdapter implements Payment
{
    public function __construct(private MastercardPaymentApi $mastercard) {}

    public function charge($amount)
    {
        $this->mastercard->differentCharge($amount);
    }
}