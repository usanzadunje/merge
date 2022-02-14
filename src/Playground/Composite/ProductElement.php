<?php

namespace Usanzadunje\Playground\Composite;

abstract class ProductElement
{
    abstract public function calculatePrice(): int;

    public function isBox() : bool
    {
        return false;
    }
}