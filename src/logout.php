<?php

require __DIR__ . '/../vendor/autoload.php';

auth()->logout();

dd(auth()->user());
