<?php

namespace Usanzadunje\Playground\Proxy;

interface Downloader
{
    public function download(string $url);
}