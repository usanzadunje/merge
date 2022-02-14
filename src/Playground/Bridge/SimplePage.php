<?php

namespace Usanzadunje\Playground\Bridge;

class SimplePage extends Page
{

    public function __construct(Renderer $renderer, protected string $title, protected string $content)
    {
        parent::__construct($renderer);
    }

    public function view(): string
    {
        return $this->renderer
            ->prepareHeader()
            ->renderTitle($this->title)
            ->renderContent($this->content)
            ->prepareFooter();
    }
}