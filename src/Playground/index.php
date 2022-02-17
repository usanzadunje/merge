<?php


use Usanzadunje\Playground\Iterator\WordCollection;

require '../../vendor/autoload.php';

$collection = new WordCollection();
$collection->addItem('Jedan');
$collection->addItem('Dva');
$collection->addItem('Tri');

foreach($collection->getReverseIterator() as $item){
    echo "$item <br/>";
}