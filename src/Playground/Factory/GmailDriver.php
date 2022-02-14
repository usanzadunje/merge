<?php

namespace Usanzadunje\Playground\Factory;

class GmailDriver implements MailDriver
{

    public function __construct(public string $address) {}

    public function prepareHeaders($headers)
    {
        echo 'PREPAREING HEADERS SANITIZE ' . $headers;
    }

    public function sendMail($content)
    {
        echo 'SENDING EMAIL CONTENT ' . $content . ' ...... ' . $this->address;
    }
}