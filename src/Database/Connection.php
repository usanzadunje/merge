<?php

namespace Usanzadunje\Database;

use PDO;

class Connection
{
    private static PDO $pdoInstance;

    private function __construct() {}

    private function __clone() {}

    /**
     * Returns PDO instance or instantiates new one if it has not been instantiated before.
     *
     * @return PDO
     */
    public static function get(): PDO
    {
        if (!isset(static::$pdoInstance)) {
            static::$pdoInstance = Connector::createConnection(array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ));
        }

        return static::$pdoInstance;
    }
}