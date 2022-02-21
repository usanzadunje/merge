<?php

namespace Usanzadunje\Playground\State;

abstract class State
{
    protected Mobile $context;

    public function setContext(Mobile $context)
    {
        $this->context = $context;
    }

    abstract public function clickSideButton();

    abstract public function clickScreen();
}