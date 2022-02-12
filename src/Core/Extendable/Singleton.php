<?php

namespace Usanzadunje\Core\Extendable;

class Singleton
{
    protected static Singleton $instance;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance(): static
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;

            static::$instance->afterInstantiation();
        }

        return static::$instance;
    }

    protected function afterInstantiation() {}
}