<?php

namespace Usanzadunje\Playground\State;

class LockedState extends State
{

    public function clickSideButton()
    {
        echo "Unlock the phone";

        $this->context->changeState(new ActiveState());
    }

    public function clickScreen()
    {
        echo "Show lock screen.";
    }
}