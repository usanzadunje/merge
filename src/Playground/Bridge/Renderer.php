<?php

namespace Usanzadunje\Playground\Bridge;

interface Renderer
{
    public function prepareHeader() : Renderer;

    public function renderTitle(string $title) : Renderer;

    public function renderContent(string $content) : Renderer;

    public function prepareFooter() : string;
}