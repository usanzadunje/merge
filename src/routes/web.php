<?php

use Usanzadunje\app\Controllers\ProductController;

return [
    '/products' => [ProductController::class, 'index'],
    '/products/{id}' => [ProductController::class, 'show'],
    '/products/{id}/edit/{dd}' => [ProductController::class, 'edit'],
];