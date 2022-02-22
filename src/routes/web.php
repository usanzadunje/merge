<?php

use Usanzadunje\app\Http\Controllers\ProductController;

return [
    '/products' => [ProductController::class, 'index'],
    '/products/{product}' => [ProductController::class, 'show'],
    '/products/{id}/edit' => [ProductController::class, 'edit'],
];