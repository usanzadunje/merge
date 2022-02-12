<?php

namespace Usanzadunje\Support;

class DotEnv
{
    /**
     * Reads .env file and writes its content into $_ENV superglobal so values
     * from the file are accessible through getenv function
     *
     * @return void
     */
    public static function initialize(): void
    {
        $envPath = base_path() . '/.env';

        if (!is_readable($envPath)) {
            throw new \RuntimeException(sprintf('%s file is not readable', $envPath));
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
            }
        }
    }
}