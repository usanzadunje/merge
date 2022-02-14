<?php

namespace Usanzadunje\Playground\Composite;

class Product extends ProductElement
{
    public function __construct(private string $name, private int $price) {}

    public function getName()
    {
        return $this->name;
    }

    public function calculatePrice(): int
    {
        return $this->price;
    }
}