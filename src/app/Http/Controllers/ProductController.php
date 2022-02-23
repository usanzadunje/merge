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

    public static function show(Product $product)
    {
        require resource_path('views/products/show.php');
    }

    public static function create()
    {
        require resource_path('views/products/create.php');
    }

    public static function store(Request $request)
    {
        (new Product())->insert($request->all());

        $request->redirect('/products');
    }

    public static function edit(Product $product)
    {
        require resource_path('views/products/edit.php');
    }

    public static function update(Request $request, Product $product)
    {
        $product->update($request->all());

        $request->redirect('/products/' . $product->getId());
    }

    public static function destroy(Request $request, Product $product)
    {
        $product->delete();

        $request->redirect('/products');
    }

    public static function test()
    {
        $title = 'Naslov';
        $name = 'Ime i prezime';
        $description = 'Deskripcija';

        echo view('products/test.hemp', ['title' => $title, 'name' => $name, 'description' => $description])->render();
    }
}