<?php

namespace Usanzadunje\Database;

use PDO;
use PDOException;

class Connector
{
    public static function createConnection($options)
    {
        $connection = config('database.connection');
        $port = config('database.port');
        $dbName = config('database.database');
        $host = config('database.host');
        $username = config('database.username');
        $password = config('database.password');

        $dsn = "$connection:host=$host;port=$port;dbname=$dbName";

        return static::createPdoConnection($dsn, $username, $password, $options);
    }

    protected static function createPdoConnection($dsn, $username, $password, $options = null)
    {
        try {
            return new PDO(
                $dsn,
                $username,
                $password,
                $options
            );
        }catch (PDOException $e) {
            print "Connection error: " . $e->getMessage() . "\n";
            die();
        }
    }
}