<?php

namespace Usanzadunje\Playground\TemplateMethod;

class Twitter extends SocialNetwork
{

    public function beforeLoginHook()
    {
        echo "Before login I check something Twitter \n\n";
    }

    public function logIn(string $username, string $password)
    {
        echo "Logging in user : $username \n\n";

        return true;
    }

    public function sendData(string $message)
    {
        echo "Twitter: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function afterLogoutHook()
    {
        echo "After logout I do something Twitter \n\n";
    }
}