<?php

namespace Usanzadunje\Playground\Strategy;

class MultiplicationStrategy implements Strategy
{
    public function execute(int $firstNumber, int $secondNumber)
    {
        return $firstNumber * $secondNumber;
    }
}