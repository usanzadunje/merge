<?php

use Usanzadunje\Playground\Facade\YoutubeDownloader;

require '../../vendor/autoload.php';

$facade = new YoutubeDownloader('xxx-xxx-xxx');

$facade->download('https://www.youtube.com/123f4sdefad');