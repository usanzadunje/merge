<?php

namespace Usanzadunje\Playground\Adapter;

class PayPalPayment implements Payment
{

    public function __construct(public string $username, public string $password) {}

    public function authenticate()
    {
        echo 'Authenticating in: ' . $this->username . ' with : ' . $this->password;
    }

    public function charge($amount)
    {
        $this->authenticate();

        echo 'Charged : ' . $amount;
    }
}