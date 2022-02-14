<?php


use Usanzadunje\Playground\Composite\Box;
use Usanzadunje\Playground\Composite\Product;

require '../../vendor/autoload.php';


$bigBox = new Box();
$smallBox1 = new Box();
$product1SmallBox1 = new Product('Prod1SMB1', 50);
$product2SmallBox2 = new Product('Prod2SMB2', 51);
$smallBox1->add($product1SmallBox1);
$smallBox1->add($product2SmallBox2);
$smallBox2 = new Box();
$product1SmallBox2 = new Product('ProdSMB2', 333);
$smallBox2->add($product1SmallBox2);

$productSolo = new Product('Solo', 100);


$bigBox->add($smallBox1);
$bigBox->add($smallBox2);
$bigBox->add($productSolo);

echo $smallBox1->calculatePrice();