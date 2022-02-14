<?php

namespace Usanzadunje\Playground\Factory;

abstract class MailSender
{
    abstract public function getMailDriver() : MailDriver;

    public function send($headers, $content)
    {
        $driver = $this->getMailDriver();

        $driver->prepareHeaders($headers);
        $driver->sendMail($content);
    }
}