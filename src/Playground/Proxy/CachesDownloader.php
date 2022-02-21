<?php

namespace Usanzadunje\Playground\Proxy;

class CachesDownloader implements Downloader
{
    private array $cache = [];

    public function __construct(private Downloader $downloader) {}

    public function download(string $url)
    {
        if (!isset($this->cache[$url])) {
            echo "Caching \n";
            $result = $this->downloader->download($url);

            $this->cache[$url] = $result;
        }else {
            echo "Retrieving from cache \n";
        }

        return $this->cache[$url];
    }
}