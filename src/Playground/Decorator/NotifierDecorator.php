<?php

namespace Usanzadunje\Playground\Decorator;

class NotifierDecorator implements Notifier
{
    public function __construct(public Notifier $notifier) {}

    public function send(string $message)
    {
        $this->notifier->send($message);
    }
}