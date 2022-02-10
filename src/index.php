<?php

use Usanzadunje\Core\App;

require __DIR__ . '/../vendor/autoload.php';

$app = new App();

auth()->login('soni@soni.com', 'soni');

echo '<br/>';
echo '<a href="logout.php">Logout</a>';
