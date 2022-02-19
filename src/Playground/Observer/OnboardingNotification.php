<?php

namespace Usanzadunje\Playground\Observer;

use SplSubject;

class OnboardingNotification implements \SplObserver
{

    public function update(\SplSubject $subject, string $event = null, $data = null): void
    {
        echo "Event occured : $event";
        echo "<br/> with data :";
        var_dump($data);
    }
}