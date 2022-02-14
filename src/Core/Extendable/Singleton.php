<?php

namespace Usanzadunje\Core\Extendable;

class Singleton
{
    protected static array $instances = [];

    protected function __construct() {}

    private function __clone() {}

    /**
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception("Object is not unserializable");
    }

    public static function getInstance(): static
    {
        $classIdentified = static::class;
        if (!isset(static::$instances[$classIdentified])) {
            self::$instances[$classIdentified] = new static();
        }

        return self::$instances[$classIdentified];
    }
}