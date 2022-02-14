<?php

namespace Usanzadunje\Playground\Factory;

class GmailSender extends MailSender
{

    public function __construct(public string $address) {}

    public function getMailDriver(): GmailDriver
    {
        return new GmailDriver($this->address);
    }
}