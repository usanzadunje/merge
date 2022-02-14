<?php


use Usanzadunje\Playground\Bridge\HTMLRenderer;
use Usanzadunje\Playground\Bridge\JsonRenderer;
use Usanzadunje\Playground\Bridge\Page;
use Usanzadunje\Playground\Bridge\Product;
use Usanzadunje\Playground\Bridge\ProductPage;
use Usanzadunje\Playground\Bridge\SimplePage;

require '../../vendor/autoload.php';


function execute(Page $page)
{
    echo $page->view();
}
