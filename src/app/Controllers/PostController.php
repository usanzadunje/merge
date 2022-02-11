<?php

namespace Usanzadunje\app\Controllers;

use Usanzadunje\Models\Product;

class PostController
{
    public static function index()
    {
        $products = (new Product())->get();

        require resource_path('views/products/index.php');
    }

    public static function show($id)
    {
        $product = (new Product())->where('id', $id)->first();

        require resource_path('views/products/show.php');
    }
}