<?php

namespace Usanzadunje\Playground\Strategy;

class AdditionStrategy implements Strategy
{

    public function execute(int $firstNumber, int $secondNumber)
    {
        return $firstNumber + $secondNumber;
    }
}