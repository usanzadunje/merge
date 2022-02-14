<?php

namespace Usanzadunje\Playground\Adapter;

interface Payment
{
    public function charge($amount);
}