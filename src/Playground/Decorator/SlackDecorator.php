<?php

namespace Usanzadunje\Playground\Decorator;

class SlackDecorator extends NotifierDecorator
{
    public function send(string $message)
    {
        echo 'Setting Slack channel';
        parent::send($message);
        echo 'Setting Slack footer';
    }
}