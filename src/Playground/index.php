<?php

use Usanzadunje\Playground\Decorator\FacebookDecorator;
use Usanzadunje\Playground\Decorator\Notifier;
use Usanzadunje\Playground\Decorator\NotifierDecorator;
use Usanzadunje\Playground\Decorator\SimpleNotifier;
use Usanzadunje\Playground\Decorator\SlackDecorator;

require '../../vendor/autoload.php';

function execute(Notifier $notifier)
{
    $notifier->send('slack');
}

$sn = new SimpleNotifier();
$slack = new SlackDecorator($sn);
$fb = new FacebookDecorator($slack);

execute($fb);