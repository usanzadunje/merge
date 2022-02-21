<?php

use Usanzadunje\Playground\Strategy\AdditionStrategy;
use Usanzadunje\Playground\Strategy\Context;
use Usanzadunje\Playground\Strategy\MultiplicationStrategy;

require '../../vendor/autoload.php';

$additionStrategy = new AdditionStrategy();

$context = new Context($additionStrategy);

$context->setStrategy(new MultiplicationStrategy());

echo $context->doWork(10, 5);