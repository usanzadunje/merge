<?php

namespace Usanzadunje\Playground\TemplateMethod;

abstract class SocialNetwork
{
    public function __construct(public string $username, public string $password) {}

    public function post(string $message)
    {
        $this->beforeLoginHook();
        if ($this->logIn($this->username, $this->password)) {
            $result = $this->sendData($message);

            $this->logOut();
            $this->afterLogoutHook();

            return $result;
        }

        return false;
    }

    abstract public function beforeLoginHook();

    abstract public function logIn(string $username, string $password);

    abstract public function sendData(string $message);

    public function logOut()
    {
        echo "Logging out user : $this->username ... \n";
    }

    public function afterLogoutHook(){

    }
}