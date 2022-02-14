<?php

namespace Usanzadunje\Playground\Bridge;

class ProductPage extends Page
{

    public function __construct(Renderer $renderer, private Product $product)
    {
        parent::__construct($renderer);
    }

    public function view(): string
    {
        return $this->renderer
            ->prepareHeader()
            ->renderTitle($this->product->getTitle() . ' Product')
            ->renderContent(
                $this->product->getDescription() .
                '<br> Price: ' . $this->product->getPrice()
            )
            ->prepareFooter();
    }
}