<?php

use Usanzadunje\app\Controllers\ProductController;

return [
    '/products' => [ProductController::class, 'index'],
    '/products/{product}/nesto' => [ProductController::class, 'show'],
    '/products/{id}/edit/{dd}' => [ProductController::class, 'edit'],
];