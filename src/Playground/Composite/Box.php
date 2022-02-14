<?php

namespace Usanzadunje\Playground\Composite;

class Box extends ProductElement
{
    private array $elements;

    public function add(ProductElement $el)
    {
        $this->elements[] = $el;
    }

    public function remove(ProductElement $el)
    {
        $this->elements = array_filter(
            $this->elements,
            fn($arrEl) => $arrEl !== $el
        );
    }

    public function isBox(): bool
    {
        return true;
    }

    public function calculatePrice(): int
    {
        $price = 0;
        foreach ($this->elements as $product) {
            $price += $product->calculatePrice();
        }

        return $price;
    }
}