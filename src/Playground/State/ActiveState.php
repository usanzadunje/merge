<?php

namespace Usanzadunje\Playground\State;

class ActiveState extends State
{

    public function clickSideButton()
    {
        echo "Lock the phone";

        $this->context->changeState(new LockedState());
    }

    public function clickScreen()
    {
        echo "Perform display action.";
    }
}