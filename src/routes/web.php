<?php

use Usanzadunje\app\Http\Controllers\ProductController;

return [
    '/products' => [ProductController::class, 'index'],
    '/products/{product}' => [ProductController::class, 'show'],
    '/products/create' => [ProductController::class, 'create'],
    '/products/store' => [ProductController::class, 'store'],
    '/products/{product}/edit' => [ProductController::class, 'edit'],
    '/products/{product}/update' => [ProductController::class, 'update'],
    '/products/{product}/destroy' => [ProductController::class, 'destroy'],
    '/test' => [ProductController::class, 'test'],
];