<?php

namespace Usanzadunje\Playground\Bridge;

class JsonRenderer implements Renderer
{

    private string $renderResult = "";

    public function prepareHeader(): Renderer
    {
        $this->renderResult = "{ <br/> &nbsp;&nbsp;&nbsp; header: HEADER CONTENT, <br/>";

        return $this;
    }

    public function renderTitle(string $title): Renderer
    {
        $this->renderResult .= "&nbsp;&nbsp;&nbsp; title: $title, <br/>";

        return $this;
    }

    public function renderContent(string $content): Renderer
    {
        $this->renderResult .= "&nbsp;&nbsp;&nbsp; content: $content, <br/>";

        return $this;
    }

    public function prepareFooter(): string
    {
        $this->renderResult .= "&nbsp;&nbsp;&nbsp; footer: FOOTER CONTENT <br/> }";

        return $this->renderResult;
    }
}