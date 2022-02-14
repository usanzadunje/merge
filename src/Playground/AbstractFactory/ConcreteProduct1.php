<?php

namespace Usanzadunje\Playground\AbstractFactory;

class ConcreteProduct1 implements AbstractProduct1
{

    public function __construct(public string $name) {}

    public function doSomething1()
    {
        echo 'Echoing : ' . $this->name;
    }
}