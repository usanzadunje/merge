<?php

use Usanzadunje\Playground\Proxy\ThirdPartyDownloader;

require '../../vendor/autoload.php';

function execute(ThirdPartyDownloader $downloader)
{
    $downloader->download('https://example.com');

    $downloader->download('https://example.com');
}

execute(new ThirdPartyDownloader());