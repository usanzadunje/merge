<?php

namespace Usanzadunje\Playground\Bridge;

class HTMLRenderer implements Renderer
{

    private string $renderResult = "";

    public function prepareHeader(): Renderer
    {
        $this->renderResult = '<div class="header">' . 'HEADER CONTENT' . '</div>';

        return $this;
    }

    public function renderTitle(string $title): Renderer
    {
        $this->renderResult .= "<h1>" . $title . "</h1>";

        return $this;
    }

    public function renderContent(string $content): Renderer
    {
        $this->renderResult .= '<div class"content">' . $content . "</div>";

        return $this;
    }

    public function prepareFooter(): string
    {
        $this->renderResult .= '<div class="footer">' . 'FOOTER CONTENT' . '</div>';

        return $this->renderResult;
    }
}