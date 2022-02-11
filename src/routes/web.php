<?php

use Usanzadunje\app\Controllers\PostController;

return [
    '/posts' => [PostController::class, 'index'],
    '/posts/{id}' => [PostController::class, 'show'],
];