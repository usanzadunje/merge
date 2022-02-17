<?php

use Usanzadunje\Playground\CoR\UserExists;
use Usanzadunje\Playground\CoR\UserHasRole;

require '../../vendor/autoload.php';

$middleware = new UserExists();

$middleware->setNext(new UserHasRole());

$middleware->check('exists@live.com', 'role');