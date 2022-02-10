<?php

return [
    'connection' => getenv('DB_CONNECTION') ?? 'mysql',
    'host' => getenv('DB_HOST') ?? 'localhost',
    'port' => getenv('DB_PORT') ?? 3306,
    'database' => getenv('DB_DATABASE') ?? 'test',
    'username' => getenv('DB_USERNAME') ?? 'root',
    'password' => getenv('DB_PASSWORD') ?? '',
];