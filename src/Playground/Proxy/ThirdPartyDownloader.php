<?php

namespace Usanzadunje\Playground\Proxy;

class ThirdPartyDownloader implements Downloader
{

    private string $result = "
        Line 1,
        Line 2,
    ";

    public function download(string $url)
    {
        echo "Downlaoding file: " . rand(100, 1000) . " bytes \n";

        return $this->result;
    }
}