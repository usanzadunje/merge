<?php

namespace Usanzadunje\Playground\Strategy;

class Context
{
    private Strategy $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function doWork(int $firstNumber, int $secondNumber)
    {
        return $this->strategy->execute($firstNumber, $secondNumber);
    }
}