<?php

namespace Usanzadunje\Playground\Facade;

class YoutubeDownloader
{
    protected Youtube $youtube;

    protected FFMpeg $ffmpeg;

    public function __construct($ytApiKey)
    {
        $this->youtube = new Youtube($ytApiKey);
        $this->ffmpeg = new FFMpeg();
    }

    public function download(string $url)
    {
        echo 'Getting data from YT';
        $this->youtube->getData();
        echo 'Processing through ffmpeg';
        $this->ffmpeg->process();

        echo 'Downloaded file : ' . $url;
    }

}