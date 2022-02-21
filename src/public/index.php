<?php

use Usanzadunje\Core\Container;
use Usanzadunje\Models\Product;

// Require autoloader file from composer
require '../../vendor/autoload.php';

// Initialize application
//App::initialize();

$container = new Container();
$prod = $container->get(Product::class);

var_dump($prod);

