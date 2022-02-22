<?php

namespace Usanzadunje\app\Controllers;

use Usanzadunje\Core\Http\Request;
use Usanzadunje\Models\Product;

class ProductController
{
    public static function index(Request $request)
    {
        $products = (new Product())->get();

        require resource_path('views/products/index.php');
    }

    public static function show($id)
    {
        $product = (new Product())->where('id', $id)->firstOrFail();

        require resource_path('views/products/show.php');
    }
}