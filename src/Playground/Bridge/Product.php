<?php

namespace Usanzadunje\Playground\Bridge;

class Product
{
    public function __construct(
        private string $title,
        private string $price,
        private string $description
    ) {}

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }
}