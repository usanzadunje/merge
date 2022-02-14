<?php

namespace Usanzadunje\Playground\Decorator;

class SimpleNotifier implements Notifier
{
    public function send(string $message)
    {
        echo 'Simple message sent: ' . $message;
    }
}