<?php

namespace Usanzadunje\Playground\Factory;

interface MailDriver
{
    public function prepareHeaders($headers);

    public function sendMail($content);
}