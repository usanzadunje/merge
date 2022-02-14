<?php

namespace Usanzadunje\Playground\AbstractFactory;

class ConcreteProduct2 implements AbstractProduct2
{
    public function __construct(public string $name) {}

    public function doSomething2()
    {
        echo 'Echoing : ' . $this->name;
    }
}