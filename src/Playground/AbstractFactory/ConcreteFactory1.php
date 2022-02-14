<?php

namespace Usanzadunje\Playground\AbstractFactory;

class ConcreteFactory1 implements AbstractFactory
{

    public function createConcreteProduct1(): AbstractProduct1
    {
        return new ConcreteProduct1('product 1');
    }

    public function createConcreteProduct2(): AbstractProduct2
    {
        return new ConcreteProduct2('product 2');
    }
}