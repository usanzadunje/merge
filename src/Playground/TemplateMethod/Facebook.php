<?php

namespace Usanzadunje\Playground\TemplateMethod;

class Facebook extends SocialNetwork
{

    public function beforeLoginHook()
    {
        echo "Before login I check something \n\n";
    }

    public function logIn(string $username, string $password)
    {
        echo "Logging in user : $username \n\n";

        return true;
    }

    public function sendData(string $message)
    {
        echo "Facebook: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }
}