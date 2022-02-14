<?php

namespace Usanzadunje\Playground\Facade;

class Youtube
{
    public function __construct(private string $apiKey) {}

    public function getData()
    {
        echo 'YTDATA with api key ' . $this->apiKey;
    }
}