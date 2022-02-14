<?php

namespace Usanzadunje\Playground\Bridge;

abstract class Page
{
    public function __construct(protected Renderer $renderer) {}

    public function changeRenderer(Renderer $renderer): void
    {
        $this->renderer = $renderer;
    }

    abstract public function view(): string;
}