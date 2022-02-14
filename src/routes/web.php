<?php

use Usanzadunje\app\Controllers\PostController;

return [
    '/products' => [PostController::class, 'index'],
    '/products/{id}' => [PostController::class, 'show'],
    '/products/{id}/edit/{dd}' => [PostController::class, 'edit'],
];