<?php

namespace Usanzadunje\Playground\State;

class Mobile
{
    private State $state;

    public function __construct(State $state)
    {
        $this->changeState($state);
    }

    public function changeState(State $state)
    {
        $this->state = $state;
        $this->state->setContext($this);
    }

    public function clickSideButton()
    {
        $this->state->clickSideButton();
    }

    public function clickScreen()
    {
        $this->state->clickScreen();
    }

}