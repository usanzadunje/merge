<?php

namespace Usanzadunje\app\Http\Controllers;

use Usanzadunje\app\Models\Product;
use Usanzadunje\Core\Http\Request;

class ProductController
{
    public static function index(Request $request)
    {
        $products = (new Product())->get();

        require resource_path('views/products/index.php');
    }

    public static function show(Request $request, Product $product)
    {
        require resource_path('views/products/show.php');
    }


}