<?php


use Usanzadunje\Playground\State\LockedState;
use Usanzadunje\Playground\State\Mobile;

require '../../vendor/autoload.php';

$mobile = new Mobile(new LockedState());

$mobile->clickScreen();
$mobile->clickSideButton();

$mobile->clickScreen();
$mobile->clickSideButton();
