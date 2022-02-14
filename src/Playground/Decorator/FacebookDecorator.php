<?php

namespace Usanzadunje\Playground\Decorator;

class FacebookDecorator extends NotifierDecorator
{
    public function send(string $message)
    {
        echo 'Loggin in Facebook';
        parent::send($message);
        echo 'Closing Facebook chat';
    }
}