<?php

namespace Usanzadunje\Playground\Strategy;

class SubstractStrategy implements Strategy
{
    public function execute(int $firstNumber, int $secondNumber)
    {
        return $firstNumber - $secondNumber;
    }
}