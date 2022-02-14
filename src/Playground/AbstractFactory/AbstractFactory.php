<?php

namespace Usanzadunje\Playground\AbstractFactory;

interface AbstractFactory
{
    public function createConcreteProduct1() : AbstractProduct1;

    public function createConcreteProduct2(): AbstractProduct2;
}